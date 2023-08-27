<?php

namespace App\Http\Livewire;

use App\Models\StudentQuizScore;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Livewire\Component;

class ManageQuizView extends Component
{
    protected $listeners = ['openAddQuestionModal' => 'openAddQuestionModal', 'closeAddQuestionModal' => 'handleCloseAddQuestionModal'];
    public $quizSlug;

    public $quiz;
    protected $questions;

    public $confirmQuizDeletion;
    public $questionsWithHighlightedOptions = [];

    public function mount($quizSlug)
    {
        $this->quizSlug = $quizSlug;

        $this->quiz = Quiz::where('slug', $this->quizSlug)->first();
//
//        $this->quiz->load(['questions.question.options']);
//        $this->quiz = Quiz::where('slug', 'charles-sanchez')->first();
//        $questionsWithHighlightedOptions = [];

//        foreach ($this->quiz->questions as $question) {
//            $questionData = [
//                'question' => $question->name,
//                'options' => [],
//            ];
//
//            foreach ($question->options as $option) {
//                $highlight = $option->is_correct ? '[CORRECT] ' : '';
//                $questionData['options'][] = "{$highlight}{$option->name}";
//            }
//
//
//
//            $questionsWithHighlightedOptions[] = $questionData;


    }


    public function render()
    {

        $quiz = Quiz::where('slug', $this->quizSlug)->with(['questions.question.options', 'questions.answers'])->firstOrFail();

        $formattedQuestions = [];

        foreach ($quiz->questions as $quizQuestion) {
            $formattedQuestion = [
                'id' => $quizQuestion->id,
                'question' => $quizQuestion->question->name,
                'marks' => $quizQuestion->marks,
                'options' => [],
                'answers' => $quizQuestion->answers,
            ];

            foreach ($quizQuestion->question->options as $option) {
                $formattedOption = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'is_correct' => $option->is_correct,
                ];

                $formattedQuestion['options'][] = $formattedOption;
            }

            $formattedQuestions[] = $formattedQuestion;
        }

        // get quiz attempt scores
        $quizAttempts = StudentQuizScore::where('quiz_id', $quiz->id)
            ->with(['student', 'quizAttempt'])
            ->paginate(10);

        return view('livewire.manage-quiz-view', ['quiz' => $quiz, 'formattedQuestions' => $formattedQuestions, 'quizAttempts' => $quizAttempts]);
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
        $this->quiz->save();

    }

    private function unpublishQuiz()
    {
        $this->quiz->is_published = false;
        $this->quiz->save();

    }

    public function openAddQuestionModal()
    {
        $this->dispatchBrowserEvent('openAddQuestionModal');

        $this->confirmQuestionAdd = true;

    }

    public function handleCloseAddQuestionModal()
    {
        $this->render();

    }

    public function confirmQuestionAdd()
    {
        $this->confirmQuestionAdd = true;
    }

    public function confirmQuizDeletion()
    {
        $this->confirmQuizDeletion = true;
    }

    public function deleteQuiz()
    {
        $this->quiz->delete();
        return redirect()->route('dashboard');
    }
}
