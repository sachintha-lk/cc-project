<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudentsInClass extends Component
{

    use WithPagination;
    public $class_id;

    public $q;

    protected $queryString = [
        'q' => ['except' => ''],
    ];

    public function mount($class_id)
    {
        $this->class_id = $class_id;

    }
    public function render()
    {
        // TODO change this to get students in class

        $students = User::where('role_id', 3)
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%')
                        ->orWhere('student_id', 'like', '%' . $this->q . '%' );
                });
            })->paginate(10);

        return view('livewire.show-students-in-class', ['students'=>$students]);
    }

//    public function removeStudent($student_id)
//    {
//        $student = User::find($student_id);
//        $student->class_id = null;
//        $student->save();
//        $this->students = User::where('role_id', 3)->get();
//    }
}
