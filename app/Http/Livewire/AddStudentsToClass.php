<?php

namespace App\Http\Livewire;

use App\Models\GradeClasses;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AddStudentsToClass extends Component
{
    use withPagination;

    public $q;

    public $class_id;

    public $class;
    public $selectedStudentsTempCollection;

    public function mount($class_id)
    {
        $this->class_id = $class_id;

        // find class by id if it is not there go back
        $this->class = GradeClasses::find($class_id);


        $this->selectedStudentsTempCollection = new Collection();
    }

    public function render()
    {
        $selectedStudents = $this->selectedStudentsTempCollection;

        $selectedStudentIds = $this->selectedStudentsTempCollection->pluck('id');

        $students = User::where('role_id', 3)
            ->where('class_id', null)
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%')
                        ->orWhere('student_id', 'like', '%' . $this->q . '%');
                });
            })
            ->whereNotIn('id', $selectedStudentIds)
            ->paginate(10);

        return view('livewire.add-students-to-class', [
            'students' => $students,
            'selectedStudents' => $selectedStudents,
            'class_name' => $this->class->class_name,
        ]);
    }

    public function selectStudent($student_id)
    {
        $selectedStudent = User::where('role_id', 3)
            ->where('id', $student_id)
            ->first();

        if ($selectedStudent) {
            // check if the student is already in the selected students collection
            $studentExists = $this->selectedStudentsTempCollection->contains(function ($student) use ($selectedStudent) {
                return $student->student_id == $selectedStudent->student_id;
            });

            if (!$studentExists) {
                $this->selectedStudentsTempCollection->push($selectedStudent);
            }

        }


    }

    public function removeFromSelectedStudents($id)
    {
        $this->selectedStudentsTempCollection = $this->selectedStudentsTempCollection->reject(function ($student) use ($id) {
            return $student['id'] == $id;
        });
    }

    public function clearSelectedStudents()
    {
        $this->selectedStudentsTempCollection = new Collection();
    }

    public function addSelectedStudentsToClass()
    {
        // the list should not be empty
        if ($this->selectedStudentsTempCollection->isEmpty()) {
            return;
        }
        $selectedStudentIds = $this->selectedStudentsTempCollection->pluck('id');

        // add the students to the class
        $students = User::whereIn('id', $selectedStudentIds)->get();

        foreach ($students as $student) {
            $student->class()->associate($this->class);
            $student->save();
        }

        // clear the selected students
        $this->clearSelectedStudents();

        session()->flash('message', 'Students added to class successfully.');
    }

}
