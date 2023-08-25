<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Submissions;
use Livewire\Component;
use Livewire\WithFileUploads;

class AssignmentSubmittion extends Component
{

    // public $assignment_id;
    use WithFileUploads;

    public $assignment;

    public $submissions;

    public $fileToSubmit;

    protected $rules = [
        'fileToSubmit' => 'required|file|max:1024',
    ];
 
    

    public function mount($assignment_id)
    {
        // $this->assignment_id = $assignment_id;
        $this->assignment = Assignment::findOrFail($assignment_id);
        
    }
    public function render()
    {
        // user id of the student 
        $student_user_id = auth()->user()->id;

        // check if the student has submitted the assignment
        $this->submissions = Submissions::where('assignment_id', $this->assignment->id)
        ->where('student_id', $student_user_id)->first();
        
        return view('livewire.assignment-submittion', [
            'assignment' => $this->assignment,
            'submissions' => $this->submissions,

        ]);
    }

    // public function submitFile()
    // { 
    //     $this->validate([
    //         'fileToSubmit' => 'required|file|max:1024',
    //     ]);
    //     $path= $this->fileToSubmit->store('public/submissions');

    //     $this->submissions->file_submission = $path;
    //     $this->submissions->save();

    //     // session()->flash('message', 'File submitted successfully.');

    //     $this->fileToSubmit = null;

    // }

    //     public function submitFile()
    // {
    //     $this->validate([
    //         'fileToSubmit' => 'required|file|max:1024',
    //     ]);

    //     $path = $this->fileToSubmit->store('public/submissions');

    //     // Create a new Submissions instance
    //     $submission = new Submissions();
    //     $submission->file_submission = $path;
    //     $submission->assignment_id = $this->assignment->id;
    //     $submission->student_id = auth()->user()->id;
    //     $submission->save();

    //     // Optionally, you can flash a success message to the session
    //     session()->flash('message', 'File submitted successfully.');

    //     // Reset the file input
    //     $this->fileToSubmit = null;
    // }

    public function submitFile()
    {
        $this->validate();
    
        // Generate a random number for the file name
        $randomNumber = rand(1, 1000);
    
        // Get the original file name and extension
        $originalFileName = $this->fileToSubmit->getClientOriginalName();
        $extension = $this->fileToSubmit->extension();
    
        // Create a unique file name
        $fileName = "{$originalFileName}_{$randomNumber}.{$extension}";
    
        // Store the file in the 'submissions' folder
        $this->fileToSubmit->storeAs('submissions', $fileName ,'public');
    
        // Create a new submission record
        Submissions::create([
            'file_submission' => $fileName,
            'assignment_id' => $this->assignment->id,
            'student_id' => auth()->user()->id,
        ]);
    
        // // Flash a success message to the session
        // session()->flash('message', 'Assignment Submitted Successfully');
    
        // Reset the file input
        $this->fileToSubmit = null;
    }
    




}
