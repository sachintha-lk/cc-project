<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GradeClasses;

class ViewClass extends Component
{
    public $class;
    public $class_id;
    public $students;

    public function mount($class_id)
    {
        $this->class_id = $class_id;
        $this->class = GradeClasses::find($class_id);

    }

    public function render()
    {
        $students = $this->students;
        return view('livewire.view-class', compact('students'));
    }
}
