<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\CourseResource;
use App\Models\Module;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Livewire\Component;

class ModuleDetails extends Component
{
    public $module_id;
    public $module;
    public $assignments;

    public $quizzes;

    public $resources;

    public $confirmingAssignmentDeletion = false;
    public $confirmingResourceDeletion = false;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->loadModuleAndAssignments();
        $this->loadModuleAndQuizes();
        $this->loadCourseResources();
    }

    public function render()
    {
        $this->loadModuleAndQuizes();
        $this->loadCourseResources();
        $this->loadModuleAndAssignments();
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

    public function loadCourseResources() {
        $this->resources = CourseResource::where('module_id', $this->module_id)
            ->get();
    }

    public function ConfirmResourceDeletion($id)
    {
        $this->confirmingResourceDeletion = $id;
    }

    public function DeleteResource(CourseResource $resource)
    {
        $resource->delete();
        $this->confirmingResourceDeletion = false;
        $this->loadCourseResources();
        session()->flash('message', 'Resource Deleted Successfully');
    }

}
