<?php

namespace App\Http\Livewire;

use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Livewire\Component;

class AddQuestion extends Component
{
    protected $listeners = ['openAddQuestionModal' => 'openAddQuestionModal'];
    public $quizId;

    public $confirmQuestionAdd = false;
    public $question;
//    public $questionTypeOptions;
    public $quiz_question;
//    public $questionType;

    public $option_a;
    public $option_b;
    public $option_c;
    public $option_d;

    public $correct_answer;

    public $numberOfQuestions;
    
    protected $rules = [
        'question.name' => 'required|string|min:5|max:255',
        'question.question_type_id' => 'required|integer|exists:question_types,id',
        'quiz_question.quiz_id' => 'required|integer|exists:quizzes,id',
        'quiz_question.marks' => 'nullable|integer|min:0',
        'question.is_active' => 'boolean',
        'quiz_question.negative_marks' => 'nullable|integer|min:0',
        'quiz_question.order' => 'nullable|integer|min:0',
//        'is_optional' => 'nullable|boolean|default:false',
    ];

    public function mount($quizId)
    {
        $this->quizId = $quizId;

        $this->numberOfQuestions = QuizQuestion::where('quiz_id', $this->quizId)->count();

//        $this->questionTypeOptions = QuestionType::all();
    }

    public function render()
    {
        return view('livewire.add-question');
    }

    public function saveQuestion()
    {

//        dd($this->quiz_question);

        $this->validate();

        $createdQuestion = Question::create([
            'name' => 'What is an algorithm?',
            'question_type_id' => 1,
            'is_active' => true,
//            'media_url' => 'url',
//            'media_type' => 'image'
        ]);

        $quiz_question = QuizQuestion::create([
            'quiz_id' => $this->quizId,
            'question_id' => $createdQuestion->id,
            'marks' => $this->marks,
            'order' => $this->numberOfQuestions + 1,
//            'negative_marks' => 1,
            'is_optional' => false
        ]);

        $question_option_a = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_a,
            'is_correct' => $this->correct_answer == 'a' ? true : false,
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_b = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_b,
            'is_correct' => $this->correct_answer == 'b' ? true : false,
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_c = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_c,
            'is_correct' => $this->correct_answer == 'c' ? true : false,
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_d = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_d,
            'is_correct' => $this->correct_answer == 'd' ? true : false,
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $this->reset();
        session()->flash('message', 'Question Added Successfully');
    }

    public function confirmQuestionAdd()
    {
        $this->confirmQuestionAdd = true;
    }

    public function cancelQuestionAdd()
    {
        $this->confirmQuestionAdd = false;
    }

    public function openAddQuestionModal()
    {

        $this->confirmQuestionAdd = true;

    }


}
