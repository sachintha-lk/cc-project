<?php

namespace App\Http\Livewire;

use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class EditQuiz extends Component
{

    public $quizSlug;
    public $moduleId;
    public $quiz;

    protected $rules = [
        'quiz.name' => 'required|string|min:5|max:255',
        'quiz.description' => 'nullable|string|min:5|max:255',
//        'quiz.module_id' => 'required|integer|exists:modules,id',
//        'quiz.total_marks' => 'nullable|integer|min:0',
//        'quiz.pass_marks' => 'nullable|integer|min:0|max:quiz.total_marks',
//        'quiz.max_attempts' => 'nullable|integer|min:0',
//        'quiz.is_published' => 'boolean',
//        'quiz.media_url' => 'nullable|string',
//        'quiz.media_type' => 'nullable|string',
//        'quiz.duration' => 'nullable|integer|min:0',
        'quiz.valid_from' => 'required|date',
        'quiz.valid_upto' => 'required|date|after:quiz.valid_from',
        'quiz.time_between_attempts' => 'nullable|integer|min:0',

    ];
    public function mount( $quizSlug) // Make sure the order of parameters matches the Blade view
    {

        $this->quizSlug = $quizSlug;

//        $this->quiz = Quiz::where('slug', $this->quizSlug)->with('questions')->firstOrFail();
        $this->quiz = Quiz::with('questions.question.options')->where('slug', $this->quizSlug)->firstOrFail();


    }
    public function render()
    {
        // get the quiz, questions, and options
        return view('livewire.edit-quiz', [
            'quiz' => $this->quiz
        ]);
    }

    public function saveQuiz()
    {
        $this->validate();

        $this->quiz->save();

        session()->flash('message', 'Quiz successfully updated.');

        return redirect()->route('manage-quiz-view', ['moduleId' => $this->quiz->module_id ,'quizSlug' => $this->quiz->slug]);
    }


}
