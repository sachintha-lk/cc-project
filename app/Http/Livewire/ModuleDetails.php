<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Module;
use Livewire\Component;

class ModuleDetails extends Component
{
    public $module_id;
    public $module;
    public $assignments;

    public $confirmingAssignmentDeletion = false;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->loadModuleAndAssignments();
    }

    public function render()
    {
        return view('livewire.module-details');
    }

    private function loadModuleAndAssignments()
    {
        $this->module = Module::find($this->module_id);
        $this->assignments = $this->module->assignments;
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
