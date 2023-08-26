<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Module;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class ModuleDetails extends Component
{
    public $module_id;
    public $module;
    public $assignments;

    public $quizzes;

    public $confirmingAssignmentDeletion = false;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->loadModuleAndAssignments();
        $this->loadModuleAndQuizes();
    }

    public function render()
    {
        $this->loadModuleAndQuizes();
        return view('livewire.module-details');
    }

    private function loadModuleAndAssignments()
    {
        $this->module = Module::find($this->module_id);
        $this->assignments = $this->module->assignments;
    }

    private function loadModuleAndQuizes()
    {
        $this->quizzes = Quiz::where('module_id', $this->module_id)
            ->get();
//        dd($this->quizes);

    }

    public function ConfirmAssignmentDeleted($id)
    {
        $this->confirmingAssignmentDeletion = $id;
    }

    public function DeleteAssignment(Assignment $assignment)
    {
        $assignment->delete();
        $this->confirmingAssignmentDeletion = false;
        $this->loadModuleAndAssignments();
        session()->flash('message', 'Assignment Deleted Successfully');
    }
}
