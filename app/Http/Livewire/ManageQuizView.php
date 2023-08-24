<?php

namespace App\Http\Livewire;

use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class ManageQuizView extends Component
{
    protected $listeners = ['openAddQuestionModal' => 'openAddQuestionModal'];
    public $quizSlug;

    public $quiz;

    public function mount($quizSlug)
    {
        $this->quizSlug = $quizSlug;

        $this->quiz = Quiz::where('slug', $this->quizSlug)->first();
//        $this->quiz = Quiz::where('slug', 'charles-sanchez')->first();

    }


    public function render()
    {

        return view('livewire.manage-quiz-view', ['quiz' => $this->quiz]);
    }

    public function confirmQuizPublish()
    {
        // TODO add confirm modal later
        $this->publishQuiz();
    }

    public function confirmQuizUnpublish()
    {
        // TODO add confirm modal later
        $this->unpublishQuiz();
    }

    private function publishQuiz()
    {
        $this->quiz->is_published = true;
    }

    private function unpublishQuiz()
    {
        $this->quiz->is_published = false;
    }

    public function openAddQuestionModal()
    {
        $this->dispatchBrowserEvent('openAddQuestionModal');
        

        $this->confirmQuestionAdd = true;

    }

    public function refreshQuestions()
    {
        // Implement logic to refresh the quiz's questions
    }

    public function confirmQuestionAdd()
    {
        $this->confirmQuestionAdd = true;
    }
}
