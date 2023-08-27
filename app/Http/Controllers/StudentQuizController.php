<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Module;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use http\Client\Curl\User;
use Illuminate\Http\Request;


class StudentQuizController extends Controller
{
    public function index($moduleId, $quizSlug)
    {
        // get the quiz with the slug
        $quiz = Quiz::where('slug', $quizSlug)->where('is_published', true)->firstOrFail();
//        dd($quiz);

        $module = Module::where('id', $moduleId)->firstOrFail();

        // check if student is enrolled in the module by checking if the module's class id and the student's class id match
        $isStudentEnrolledInModule = auth()->user()->class_id === $module->class_id;
        if (!$isStudentEnrolledInModule) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        }

        $carbonStartTime = Carbon::parse($quiz->valid_from);
        $carbonEndTime = Carbon::parse($quiz->valid_to);

        $now = Carbon::now();

        // format the date  and time to be displayed
        $formattedStartTime = $carbonStartTime->format('d M Y H:i:s');
        $formattedEndTime = $carbonEndTime->format('d M Y H:i:s');

        // check if there is a quiz attempt for this quiz by this student
        $quizAttempt = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('participant_id', auth()->user()->id)
            ->where('participant_type', 'student')
            ->first();


        return view('quiz.student.index', compact('quiz', 'quizAttempt', 'module', 'formattedStartTime', 'formattedEndTime'));
    }

    public function attempt($moduleId, $quizSlug)
    {

        $user = auth()->user();

        // if user is not a student, redirect them to the home page
        if ($user->role->name !== 'Student') {
            return redirect()->route('home');
        }

        // get the quiz with the slug and check if it is published, whether this is the right time to attempt the quiz
        $quiz = Quiz::where('slug', $quizSlug)->where('is_published', true)
            ->where('valid_from', '<=', Carbon::now())
            ->where('valid_to', '>=', Carbon::now())
            ->with(['questions.question.options'])
            ->firstOrFail();

        $module = Module::where('id', $moduleId)->firstOrFail();

        // check if student is enrolled in the module by checking if the module's class id and the student's class id match
        $isStudentEnrolledInModule = auth()->user()->class_id === $module->class_id;
        if (!$isStudentEnrolledInModule) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        }

//        'questions.answers' => fn($query) => $query->where('user_id', auth()->user()->id)]

        $quizAttempt = QuizAttempt::where('quiz_id', $quiz->id)->where('participant_id', $user->id)->where('participant_type', 'student')->first();
        if ($quizAttempt) {
            return redirect()->route('student-quiz-view', ['moduleId' => $module->id, 'quizSlug' => $quiz->slug])->with('error', 'You have already attempted this quiz');
        }


        $formattedQuestions = [];
        foreach ($quiz->questions as $quizQuestion) {
            $formattedQuestion = [
                'id' => $quizQuestion->id,
                'question' => $quizQuestion->question->name,
                'marks' => $quizQuestion->marks,
                'order' => $quizQuestion->order,
                'options' => [],
            ];

            foreach ($quizQuestion->question->options as $option) {
                $formattedOption = [
                    'id' => $option->id,
                    'name' => $option->name,
                ];

                $formattedQuestion['options'][] = $formattedOption;
            }

            $formattedQuestions[] = $formattedQuestion;
        }


        return view('quiz.student.attempt', compact('formattedQuestions', 'module', 'quiz'));

    }

    public function submit(Request $request)
    {
        $user = auth()->user();

//        dd(auth()->user());

        // if user is not a student, redirect them to the home page
        if ($user->role->name !== 'Student') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        }

        // Get the quiz slug from the request
        $quizSlug = request()->quizSlug;

        // get the quiz with the slug and check if it is published, whether this is the right time to attempt the quiz
        $quiz = Quiz::where('slug', $quizSlug)->where('is_published', true)
            ->where('valid_from', '<=', Carbon::now())
            ->where('valid_to', '>=', Carbon::now())
            ->with(['questions.question.options'])
            ->firstOrFail();

        $module = Module::where('id', $request->moduleId)->firstOrFail();

        // check if student is enrolled in the module by checking if the module's class id and the student's class id match
        $isStudentEnrolledInModule = auth()->user()->class_id === $module->class_id;

        if (!$isStudentEnrolledInModule) {
            return redirect()->route('dashboard');
        }

        $quizAttempt = QuizAttempt::where('quiz_id', $quiz->id)->where('participant_id', $user->id)->where('participant_type', 'student')->first();
        if ($quizAttempt) {
            return redirect()->route('student-quiz-view', ['moduleId' => $quiz->module->id, 'quizSlug' => $quiz->slug])->with('error', 'You have already attempted this quiz');
        }


        // put all the values of the request->all() except the csrf token to a collection
        $questionAnswerCollection = collect($request->except('_token'));
        // create a quiz attempt
        $quiz_attempt = QuizAttempt::create([
            'quiz_id' => $quiz->id,
            'participant_id' => $user->id,
            'participant_type' => 'student',
        ]);


        // for each question, create an answer
        foreach ($questionAnswerCollection as $question => $answer) {

            QuizAttemptAnswer::create(
                [
                    'quiz_attempt_id' => $quiz_attempt->id,
                    'quiz_question_id' => $question,
                    'question_option_id' => $answer,
                ]
            );
        }
        $score = $quiz_attempt->calculate_score();

        // Store the score in the student_quiz_scores table
        $student_quiz_score = \App\Models\StudentQuizScore::create([
            'student_user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'quiz_attempt_id' => $quiz_attempt->id,
            'score' => $score,
        ]);

        // redirect to the quiz view page with the score
        return redirect()->route('student-quiz-view', ['moduleId' => $module->id, 'quizSlug' => $quiz->slug])->with('success', 'Quiz submitted successfully. Your score is ' . $score);
    }

}
