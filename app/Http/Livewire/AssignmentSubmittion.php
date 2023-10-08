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
        'fileToSubmit' => 'required|file|max:102400', // 100MB Max
    ];

    public function mount($assignment_id)
    {
        $this->assignment = Assignment::with('submissions.submissionGrade.gradedBy')->findOrFail($assignment_id);
        $fileTypes = $this->assignment->assignment_type;
        $this->rules['fileToSubmit'] .= "|mimes:{$fileTypes}";
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

        // check if the user has already submitted a file
        if ($this->submissions) {

            session()->flash('error', 'You have already submitted a file for this assignment');
            return;

        }

        // check if state date is in the past
        if ($this->assignment->start_date > now()) {

            session()->flash('error', 'You cannot submit a file for this assignment yet');
            return;
        }

        // check if deadline is in the past
        if ($this->assignment->deadline < now()) {
            session()->flash('error', 'You cannot submit a file for this assignment anymore');
            return;
        }


        $fileTypes = $this->assignment->assignment_type;
        $this->rules['fileToSubmit'] .= "|mimes:{$fileTypes}";

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
