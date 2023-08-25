<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Module;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use http\Client\Curl\User;


class StudentQuizController extends Controller
{
    public function index($moduleId, $quizSlug)
    {


        // get the quiz with the slug
        $quiz = Quiz::where('slug', $quizSlug)->where('is_published', true)->firstOrFail();
//        dd($quiz);

        $module = Module::where('id', $moduleId)->firstOrFail();

        $carbonStartTime = Carbon::parse($quiz->valid_from);
        $carbonEndTime = Carbon::parse($quiz->valid_to);

        $now = Carbon::now();

        // format the date  and time to be displayed
        $formattedStartTime = $carbonStartTime->format('d M Y H:i:s');
        $formattedEndTime = $carbonEndTime->format('d M Y H:i:s');


        return view('quiz.student.index', compact('quiz', 'module', 'formattedStartTime', 'formattedEndTime'));
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
            ->with(['questions.question.options', 'module'])
            ->firstOrFail();

        // check if student is enrolled in the module by checking if the module's class id and the student's class id match
        $isStudentEnrolledInModule = auth()->user()->class_id === $quiz->module->class_id;

//        'questions.answers' => fn($query) => $query->where('user_id', auth()->user()->id)]
        // TODO if the student has already attempted the quiz, redirect them to the quiz view page
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

        //

//        dd($quiz);


//        $formattedQuestions = [];

//        foreach ($quiz->questions as $quizQuestion) {
//            $formattedQuestion = [
//                'id' => $quizQuestion->id,
//                'question' => $quizQuestion->question->name,
//                'marks' => $quizQuestion->marks,
//                'options' => [],
//                'answers' => $quizQuestion->answers,
//            ];
//
//            foreach ($quizQuestion->question->options as $option) {
//                $formattedOption = [
//                    'id' => $option->id,
//                    'name' => $option->name,
//                    'is_correct' => $option->is_correct,
//                ];
//
//                $formattedQuestion['options'][] = $formattedOption;
//            }
//
//            $formattedQuestions[] = $formattedQuestion;
//        }
//            $quiz_attempt = QuizAttempt::create([
//                'quiz_id' => $quiz->id,
//                'participant_id' => $user->id,
////                'participant_type' => get_class($participant)
//            ]);

        $moduleCode = $quiz->module->Module_code;
        $moduleName = $quiz->module->Module_name;
        $quizName = $quiz->name;


        return view('quiz.student.attempt', compact('formattedQuestions', 'moduleCode', 'moduleName', 'quizName'));

    }

    public function submit($moduleId, $quizSlug)
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
            ->with(['questions.question.options', 'module'])
            ->firstOrFail();

        // check if student is enrolled in the module by checking if the module's class id and the student's class id match
        $isStudentEnrolledInModule = auth()->user()->class_id === $quiz->module->class_id;


    }
}
