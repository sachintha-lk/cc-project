<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AddStudentsToClass extends Component
{
    use withPagination;
    public $q;
    public $selectedStudentsTempArray = [];
    public function render()
    {

        $selectedStudents = $this->selectedStudentsTempArray;
        // TODO make this query correct to exclude student who are already in the class
        $students = User::where('role_id', 3)
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%')
                        ->orWhere('student_id', 'like', '%' . $this->q . '%' );
                });
            })->paginate(10);

        return view('livewire.add-students-to-class',  ['students'=>$students], compact('selectedStudents'));
    }

    public function selectStudent($student_id)
    {
        $this->selectedStudentsTempArray[] = $student_id;
    }

    public function removeFromSelectedStudents($student_id)
    {
        $key = array_search($student_id, $this->selectedStudentsTempArray);
        unset($this->selectedStudentsTempArray[$key]);
    }
    public function clearSelectedStudents()
    {
        $this->selectedStudentsTempArray = [];
    }

    public function addSelectedStudentsToClass()
    {

    }

}
