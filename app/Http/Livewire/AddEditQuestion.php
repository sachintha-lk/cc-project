<?php

namespace App\Http\Livewire;

use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Livewire\Component;

class AddEditQuestion extends Component
{
    protected $listeners = ['openAddEditQuestionModal' => 'openAddEditQuestionModal'];

    // listen for edit event with question id
    // listen for delete event with question id
    public $quizId;

    public $confirmQuestionAddEdit = false;
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

    public $correct_answer = '';

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

        if (!isset($this->question)) {
            $this->correct_answer = '';
            $this->numberOfQuestions = QuizQuestion::where('quiz_id', $this->quizId)->count();
        }
//        $this->questionTypeOptions = QuestionType::all();
    }

    public function updatedCorrectAnswer()
    {
        if ($this->correct_answer === '') {
            $this->correct_answer = null;
        }
    }


    public function render()
    {
        return view('livewire.add-edit-question');
    }

    public function saveQuestion()
    {

        $this->validate();
        if (isset($this->question)) {
            $this->question->update([
                'name' => $this->question_name,
                'question_type_id' => 1,  // multiple choice single answer
                'is_active' => true,
            ]);

            $this->quiz_question->update([
                'marks' => $this->marks,
            ]);

            // Array of option names and letters
            $optionNames = [$this->option_a, $this->option_b, $this->option_c, $this->option_d];
            $optionLetters = ['a', 'b', 'c', 'd'];

            // Loop through the options and update them
            for ($i = 0; $i < count($optionNames); $i++) {
                $this->question->options[$i]->update([
                    'name' => $optionNames[$i],
                    'is_correct' => $this->correct_answer == $optionLetters[$i],
                ]);
            }
        }
        else {

        $createdQuestion = Question::create([
            'name' => $this->question_name,
            'question_type_id' => 1,  // multiple choice single answer
            'is_active' => true,
        ]);


        $quiz_question = QuizQuestion::create([
            'quiz_id' => $this->quizId,
            'question_id' => $createdQuestion->id,
            'marks' => $this->marks,
            'order' => $this->numberOfQuestions + 1,
            'is_optional' => false
        ]);

            // Define an array of option names and corresponding letters
        $optionData = [
            ['name' => $this->option_a, 'letter' => 'a'],
            ['name' => $this->option_b, 'letter' => 'b'],
            ['name' => $this->option_c, 'letter' => 'c'],
            ['name' => $this->option_d, 'letter' => 'd'],
        ];

        foreach ($optionData as $data) {
            $isCorrect = $this->correct_answer == $data['letter'];

            QuestionOption::create([
                'question_id' => $createdQuestion->id,
                'name' => $data['name'],
                'is_correct' => $isCorrect,
            ]);
        }

        }

        $this->resetExceptQuizId();

        $this->emit('closeAddEditQuestionModal');
        session()->flash('message', 'Question Added Successfully');
    }

    private function resetExceptQuizId()
    {
        $tempValue = $this->quizId;
        $this->reset();
        $this->quizId = $tempValue;
    }

    public function confirmQuestionAddEdit()
    {
        $this->confirmQuestionAddEdit = true;
    }

    public function cancelSaveQuestion()
    {
        // dispatch event to tell that modal closes
        $this->emit('closeAddEditQuestionModal');
        $this->resetExceptQuizId();
        $this->confirmQuestionAddEdit = false;

    }

    public function openAddEditQuestionModal($quizQuestionId = null)
    {
        // reset all fields except quizId
        $this->resetExceptQuizId();

        if ($quizQuestionId) {
            $this->quiz_question = QuizQuestion::findOrFail($quizQuestionId);
            $this->question = $this->quiz_question->question;
            $this->marks = $this->quiz_question->marks;
            $this->question_name = $this->question->name;
            $this->option_a = $this->question->options[0]->name;
            $this->option_b = $this->question->options[1]->name;
            $this->option_c = $this->question->options[2]->name;
            $this->option_d = $this->question->options[3]->name;

            // get the option index of correct answer and assign a,b,c,d for 1,2,3,4
            $correctAnswerIndex = $this->question->options->search(function ($option) {
                return $option->is_correct;
            });

            $this->correct_answer = ['a', 'b', 'c', 'd'][$correctAnswerIndex];
        }
        $this->confirmQuestionAddEdit = true;

    }


}
