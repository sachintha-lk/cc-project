<?php

namespace App\Http\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Support\Str;

class CreateQuizForm extends Component
{
    public $quizId = null;
    public $moduleId;
    public $quiz;

    private $isOpenAIKeySet = false;

    protected $rules = [
        'quiz.name' => 'required|string|min:5|max:255',
        'quiz.description' => 'nullable|string|min:5|max:255',
        'quiz.module_id' => 'required|integer|exists:modules,id',
        'quiz.total_marks' => 'nullable|integer|min:0',
        'quiz.pass_marks' => 'nullable|integer|min:0|max:quiz.total_marks',
        'quiz.max_attempts' => 'nullable|integer|min:0',
        'quiz.is_published' => 'boolean',
        'quiz.media_url' => 'nullable|string',
        'quiz.media_type' => 'nullable|string',
        'quiz.duration' => 'nullable|integer|min:0',
        'quiz.valid_from' => 'nullable|date',
        'quiz.valid_upto' => 'nullable|date|after:quiz.valid_from',
        'quiz.time_between_attempts' => 'nullable|integer|min:0',

    ];

    public function render()
    {
        if ($this->quizId) {
            $this->quiz = Quiz::findOrFail($this->quizId);
        }


        // check if OPENAI_API_KEY is set
        if (env('OPENAI_API_KEY')) {
            $this->isOpenAIKeySet = true;
        } else {
            $this->isOpenAIKeySet = false;
        }
        return view('livewire.create-quiz-form', [
            'isOpenAIKeySet' => $this->isOpenAIKeySet
        ]);
    }


    public function saveQuiz()
    {
//        dd(isset($this->quiz['id']));

        if (isset($this->quiz['id'])) {
//             if name changed, generate the slug
            if ($this->quiz->isDirty('name')) {
                $this->quiz['slug'] = str::slug($this->quiz['name']) . '-'.  Str::random(5);
            }
            $this->validate();
            $this->quiz->save();
            session()->flash('message', 'Quiz Updated Successfully');

        } else {
            // validate only the name
            $this->validateOnly('quiz.name');

//            // generate the slug
            $this->quiz['slug'] = str::slug($this->quiz['name'] . '-'. Str::random(5));

            // add the module id to the quiz
            $this->quiz['module_id'] = $this->moduleId;
//            $this->validateOnly('quiz.module_id');

            $this->validate();

            $this->quiz = new Quiz($this->quiz);
            $this->quiz->save();


            redirect()->route('manage-quiz-view',
                ['moduleId' => $this->moduleId,
                    'quizSlug' => $this->quiz->slug]
            )->with('message', 'Quiz Created Successfully');
        }
    }

    function mount($moduleId, $quizId = null)
    {

        $this->moduleId = $moduleId;
        $this->quizId = $quizId;
    }

    function cancelSaveQuiz()
    {
        $this->quiz = null;
    }


}
