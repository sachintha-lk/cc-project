<?php

namespace App\Http\Controllers;

use App\Http\Requests\AIQuizGenerationRequest;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use OpenAI\Laravel\Facades\OpenAI;

class AIQuizGenerationController extends Controller
{
    public function index($moduleId)
    {
        // if OPENAI_API_KEY env variable is not set
        if (!env('OPENAI_API_KEY')) {
            return redirect()->back()->withErrors('Error: OPENAI_API_KEY env variable not set.');
        }
        return view('quiz.create-quiz-with-ai', compact('moduleId'));
    }

    public function store(AIQuizGenerationRequest $request, $moduleId )
    {
        $quizName = request('name');
        $quizDescription = request('description');
        $num_questions = request('num_questions');
        $prompt = request('prompt');
        $startTime = request('start_time');
        $endTime = request('end_time');

//        dd($quizName, $quizDescription, $prompt, $startTime, $endTime);

//        $quizFormatExample = [
//            'questions' => ['Q1?', 'Q2?'],
//            'options' => [['Q1O1', 'Q1O2', 'Q1O3', 'Q1O4'], ['Q2O1', 'Q2O2', 'Q2O3', 'Q2O4']],
//            'correct' => [0, 1]
//        ];

        $quizFormatExampleJson = "['questions' => ['Question?', 'NextQuestion?'],'options' => [['AnswerOne', 'AnswerTwo', 'AnswerThree', 'AnswerFour'], ['AnswerOne', 'AnswerTwo', 'AnswerThree', 'AnswerFour']],'correct' => [0, 1]
                            ]";

        $quizFormatExampleDescribedText = "JSON response with an array of questions, followed by an array of options (4 options per question), and then an array of correct answer indices for each question.";


        $quizFormatExample = $quizFormatExampleDescribedText;
        // send prompt to OpenAI
        $messageContentPrompt = "Generate a quiz with options and correct answers based on the following prompt: $prompt with $num_questions questions. Example response JSON format to follow: " . json_encode($quizFormatExample) . '. Short sentences are better.';

        // Prompt Using Completions
//        $result = OpenAI::completions()->create([
//            'model' => 'text-davinci-003',
//            'prompt' => $messageContentPrompt
//        ]);

//       $result = $result['choices'][0]['text'];

        // Prompt Using Chat
    try {

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $messageContentPrompt,
                ],
            ],
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->withInput($request->all())->withErrors('Error: ' . $e->getMessage());
    }
        // *******************************************************************
        // If you get a CURL error 60
        // download a cacert.pem" and add to php.ini
        // ref: https://stackoverflow.com/questions/21114371/php-curl-error-code-60
        // *******************************************************************

//        $result = $result['choices'][0]['text'];

//        dd($result);


        // Check if the response is successful
        if ($result->object === 'chat.completion') {
            $responseContent = $result->choices[0]->message->content;
//
//                $jsonMockData = '{
//    "questions": [
//        "What is the fetch-execute cycle in a CPU?",
//        "What are the steps involved in the fetch-execute cycle?"
//    ],
//    "options": [
//        [
//            "A process where the CPU retrieves instructions and data from memory, executes them, and stores the results.",
//            "A process where the CPU calculates mathematical operations.",
//            "A process where the CPU interacts with the operating system.",
//            "A process where the CPU handles input/output operations."
//        ],
//        [
//            "Fetch, Decode, Execute, Store",
//            "Read, Write, Update, Delete",
//            "Load, Save, Jump, Branch",
//            "Input, Process, Output, Repeat"
//        ]
//    ],
//    "correct_answers": [0, 0]
//}';
            // Attempt to decode the JSON content
            $data = json_decode($responseContent, true);
//            dd($data);

            // Check if the JSON decoding was successful
            if (json_last_error() === JSON_ERROR_NONE) {
                // Check if the data contains the expected keys

                if (isset($data['questions'], $data['options'], $data['correct_answers'])) {
                    // Extracted data
                    $questions = $data['questions'];
                    $options = $data['options'];
                    $correctAnswers = $data['correct_answers'];

                    // Combine questions with their corresponding answers
                    $quizQuestions = [];
                    foreach ($questions as $index => $question) {
                        $quizQuestions[] = [
                            'question' => $question,
                            'options' => $options[$index],
                            'correctAnswerIndex' => $correctAnswers[$index],
                        ];
                    }

                    // Number of tokens used
                    $tokenUsage = $result->usage->totalTokens;
                    $inputTokens = $result->usage->promptTokens;
                    $outputTokens = $result->usage->completionTokens;

                    // Store or use the combined quiz data as needed
                } else {
                    // Handle the case where the data is missing keys
                    return redirect()->back()->withInput($request->all())->withErrors('Error: Unexpected API response, Data missing keys. Response content:' . $responseContent);
                }
            } else {
                // Handle the case where JSON decoding failed
                return redirect()->back()->withInput($request->all())->withErrors('Error: JSON decoding failed.' . json_last_error_msg(). 'Response Content:'. $responseContent);

            }
        } else {
            // Handle the case where the API response is not as expected
            return redirect()->back()->withInput($request->all())->withErrors('Error: Unexpected API response. Response:' . $result);
        }

//        dd($quizQuestions);

        // Create quiz


        $quizSlug = str::slug($quizName . '-'. Str::random(5));

        $quiz = Quiz::create([
            'name' => $quizName,
            'slug' => $quizSlug,
            'description' => $quizDescription,
            'module_id' => $moduleId,
            'total_marks' => 0,
            'pass_marks' => 0,
            'max_attempts' => 0,
            'is_published' => false,
            'media_url' => null,
            'media_type' => null,
            'duration' => 0,
            'valid_from' => $startTime,
            'valid_upto' => $endTime,
            'time_between_attempts' => 0,
        ]);

        // Create questions

//        $quizQuestions
        foreach ($quizQuestions as $quizQuestionGenerated) {


            $question = Question::create([
                'name' => $quizQuestionGenerated['question'],
                'question_type_id' => 1,  // multiple choice single answer
                'is_active' => true
            ]);

            $quizQuestion = QuizQuestion::create([
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'marks' => 1,
                'order' => 0,
            ]);

            foreach ($quizQuestionGenerated['options'] as $index => $option) {

                $isCorrect = $index === $quizQuestionGenerated['correctAnswerIndex'];
                QuestionOption::create([
                    'question_id' => $question->id,
                    'name' => $option,
                    'is_correct' => $isCorrect,
                ]);
            }
        }

        return redirect()->route('manage-quiz-view', ['moduleId' => $moduleId,  'quizSlug' => $quizSlug])->with('success', 'Quiz created successfully. Please
        review the questions and answers. Total Tokens:' . $tokenUsage . 'Input Tokens: ' . $inputTokens . ' Output Tokens:' . $outputTokens );
    }
}
