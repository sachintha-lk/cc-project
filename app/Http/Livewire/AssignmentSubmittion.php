<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Submissions;
use Livewire\Component;
use Livewire\WithFileUploads;

class AssignmentSubmittion extends Component
{
    use WithFileUploads;

    public $assignment;
    public $submissions;
    public $fileToSubmit;

    protected $rules = [
        'fileToSubmit' => 'required|file|max:1024',
    ];

    public function mount($assignment_id)
    {
        $this->assignment = Assignment::findOrFail($assignment_id);
        $this->loadUserSubmission();
    }

    public function render()
    {
        return view('livewire.assignment-submittion', [
            'assignment' => $this->assignment,
            'submissions' => $this->submissions,
        ]);
    }

    public function submitFile()
    {
        $this->validate();

        $fileName = $this->storeSubmittedFile();

        Submissions::create([
            'file_submission' => $fileName,
            'assignment_id' => $this->assignment->id,
            'student_id' => auth()->user()->id,
        ]);

        $this->fileToSubmit = null;
        $this->loadUserSubmission();
    }

    // Helper methods

    private function loadUserSubmission()
    {
        $student_user_id = auth()->user()->id;
        $this->submissions = Submissions::where('assignment_id', $this->assignment->id)
            ->where('student_id', $student_user_id)
            ->first();
    }

    private function storeSubmittedFile()
    {
        $randomNumber = rand(1, 1000);
        $originalFileName = $this->fileToSubmit->getClientOriginalName();
        $extension = $this->fileToSubmit->extension();
        $fileName = "{$originalFileName}_{$randomNumber}.{$extension}";

        $this->fileToSubmit->storeAs('submissions', $fileName, 'public');

        return $fileName;
    }
}
