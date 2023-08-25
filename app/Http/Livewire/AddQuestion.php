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

    public $question_name;
    public $marks;

    public $option_a;
    public $option_b;
    public $option_c;
    public $option_d;

    public $correct_answer;

    public $numberOfQuestions;

    protected $rules = [
        'question_name' => 'required|string|min:5|max:255',
        'marks' => 'required|integer|min:0',
        'option_a' => 'required|string|min:1|max:255',
        'option_b' => 'required|string|min:1|max:255',
        'option_c' => 'required|string|min:1|max:255',
        'option_d' => 'required|string|min:1|max:255',
        // correct answer must be one of the options
        'correct_answer' => 'required|in:a,b,c,d',
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

        $this->validate();

        $createdQuestion = Question::create([
            'name' => $this->question_name,
            'question_type_id' => 1,  // multiple choice single answer
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
            'is_correct' => $this->correct_answer == 'a',
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_b = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_b,
            'is_correct' => $this->correct_answer == 'b',
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_c = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_c,
            'is_correct' => $this->correct_answer == 'c',
//            'media_type' => 'image',
//            'media_url' => 'media url'
        ]);

        $question_option_d = QuestionOption::create([
            'question_id' => $createdQuestion->id,
            'name' => $this->option_d,
            'is_correct' => $this->correct_answer == 'd',
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
        // dispatch event to tell that modal closes
        $this->emit('closeAddQuestionModal');
        $this->confirmQuestionAdd = false;

    }

    public function openAddQuestionModal()
    {
        
        $this->confirmQuestionAdd = true;

    }


}
