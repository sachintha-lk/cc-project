<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GradeClasses;

/**
 *
 */
class ViewClass extends Component
{
    /**
     * @var
     */
    public $class;
    /**
     * @var
     */
    public $class_id;
    /**
     * @var
     */
    public $students;

    /**
     * @param $class_id
     * @return void
     */
    public function mount($class_id)
    {
        $this->class_id = $class_id;
        $this->class = GradeClasses::find($class_id);

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        $students = $this->students;
        return view('livewire.view-class', compact('students'));
    }
}
