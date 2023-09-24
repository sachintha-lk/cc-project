<?php

namespace App\Http\Livewire;

use App\Models\Submissions;
use Livewire\Component;

class ShowSubmission extends Component
{
    public $submissions;
    public $showGradingModal = false;
    public $assignmentId;

    // listen to event from SubmissionGradingForm.php
    protected $listeners = [
        'savedSubmissionGrade' => 'savedSubmissionGradeHandler',
    ];

    public function mount($assignmentId){
        $this->assignmentId = $assignmentId;
        $this->loadSubmissions();
    }

    public function loadSubmissions(){
        $this->submissions = Submissions::with(['student:id,name','assignment', 'submissionGrade'])
        ->where('assignment_id', $this->assignmentId)
        ->get();
    }

    public function render()
    {
        return view('livewire.show-submission');
    }

    public function confirmShowGradingModal($submissionId){
        $this->showGradingModal = true;
        $this->emit('showGradingModal', $submissionId);
    }

    public function savedSubmissionGradeHandler(){
        $this->loadSubmissions();
    }
}
