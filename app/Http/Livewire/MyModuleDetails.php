<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class MyModuleDetails extends Component
{
    public $assignments;

    public $module;

    public $module_id;

    public $quizzes;

    public $resources;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);
        $this->assignments = $this->module->assignments;
        $this->quizzes = Quiz::where('module_id', $this->module_id)
            ->where('is_published', 1)
            ->get();

        $this->resources = $this->module->courseResources;


    }



    public function render()
    {
        return view('livewire.my-module-details');
    }
}
