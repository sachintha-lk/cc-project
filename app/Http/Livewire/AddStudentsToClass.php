<?php

namespace App\Http\Livewire;

use App\Models\GradeClasses;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AddStudentsToClass extends Component
{
    use WithPagination;

    public $q;
    public $class_id;
    public $class;
    public $selectedStudentsTempCollection;

    public function mount($class_id)
    {
        $this->class_id = $class_id;
        $this->class = GradeClasses::find($class_id);
        $this->selectedStudentsTempCollection = new Collection();
    }

    public function render()
    {
        $students = $this->getFilteredStudents();

        return view('livewire.add-students-to-class', [
            'students' => $students,
            'selectedStudents' => $this->selectedStudentsTempCollection,
            'class_name' => $this->class->class_name,
        ]);
    }

    public function selectStudent($student_id)
    {
        $selectedStudent = $this->getSelectedStudent($student_id);

        if ($selectedStudent && !$this->studentExistsInCollection($selectedStudent)) {
            $this->selectedStudentsTempCollection->push($selectedStudent);
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
        if ($this->selectedStudentsTempCollection->isEmpty()) {
            return;
        }

        $selectedStudentIds = $this->selectedStudentsTempCollection->pluck('id');
        $students = $this->getStudentsByIds($selectedStudentIds);

        $this->associateStudentsWithClass($students);
        $this->clearSelectedStudents();
        session()->flash('message', 'Students added to class successfully.');
    }

    // Helper methods

    private function getFilteredStudents()
    {
        return User::where('role_id', 3)
            ->where('class_id', null)
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('email', 'like', '%' . $this->q . '%')
                        ->orWhere('student_id', 'like', '%' . $this->q . '%');
                });
            })
            ->whereNotIn('id', $this->selectedStudentsTempCollection->pluck('id'))
            ->paginate(10);
    }

    private function getSelectedStudent($student_id)
    {
        return User::where('role_id', 3)
            ->where('id', $student_id)
            ->first();
    }

    private function studentExistsInCollection($selectedStudent)
    {
        return $this->selectedStudentsTempCollection->contains(function ($student) use ($selectedStudent) {
            return $student->student_id == $selectedStudent->student_id;
        });
    }

    private function getStudentsByIds($selectedStudentIds)
    {
        return User::whereIn('id', $selectedStudentIds)->get();
    }

    private function associateStudentsWithClass($students)
    {
        foreach ($students as $student) {
            $student->class()->associate($this->class);
            $student->save();
        }
    }
}
