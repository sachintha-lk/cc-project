<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use Livewire\Component;

class Grades extends Component
{
    public $confirmGradeDeletion = false;
    public $confirmGradeAdd=false;
    public $grade;

    public $q;

    protected $rules = [
        'grade.name'=>'required|string|min:4',

    ];

    public function render()
    {
        return view('livewire.grades',['grades'=>Grade::all()]); // Pass the grades data to the view
    }

    public function confirmGradeDeletion($id)
    {
        $this->confirmGradeDeletion = $id;
    }

    public function deleteGrade(Grade $grade)
    {
       $grade->delete();
        $this->confirmGradeDeletion = false;
        session()->flash('message','Grade Deleted Successfully');

    }

    public function confirmGradeAdd()
    {
        $this-> confirmGradeAdd = true;
        $this->reset(['grade']);

    }
    public function confirmGradeUpdate(grade $grade)
    {
        $this->grade = $grade;
        $this->confirmGradeAdd = true;
    }



    public function saveGrade()
    {
        $this->validate();
        if(isset($this->grade->id))
        {
            $this->grade->save();
            session()->flash('message','Grade Updated Successfully');
        }
        else
        {
            Grade::create([
                'name'=>$this->grade['name'],
            ]);
            session()->flash('message','Grade Added Successfully');
        }

        $this->confirmGradeAdd = false;
    }





}
