<?php

namespace App\Http\Livewire;

use App\Models\SubmissionGrade;
use Livewire\Component;

class SubmissionGradingForm extends Component
{
    public $submissionId;

    public $showModal = false;
    public $submissionGradeId;

    private $submissionGrade;

    public $grade;
    public $comment;

    // listen to event from ShowSubmission.php
    protected $listeners = [
        'showGradingModal' => 'showGradingModal',
        'saved' => 'loadSubmissionGrade',
    ];

    public function showGradingModal($submissionId){
        $this->submissionId = $submissionId;
        $this->showModal = true;
        if (isset($this->submissionId)){
            $this->loadSubmissionGrade();
        }

    }

    public function mount(){
        $this->submissionGrade = null;
        $this->grade = null;
        $this->comment = null;
        $this->submissionId = null;
        $this->submissionGradeId = null;
    }

    public function store(){
        $this->validate([
            'grade' => 'required|numeric|min:0|max:100',
            'comment' => 'nullable|string|max:255',
        ]);

        $submissionGrade = SubmissionGrade::where('submission_id', $this->submissionId)->first();

        if(isset($submissionGrade)){

            $submissionGrade->update([
                'submission_id' => $this->submissionId,
                'grade' => $this->grade,
                'comment' => $this->comment,
                'graded_by' => auth()->user()->id,
            ]);
        }else{
            SubmissionGrade::create([
                'submission_id' => $this->submissionId,
                'grade' => $this->grade,
                'comment' => $this->comment,
                'graded_by' => auth()->user()->id,
            ]);
        }
        // reset input fields
        $this->submissionGrade = null;
        $this->grade = null;
        $this->comment = null;

        $this->submissionId = null;
        $this->submissionGradeId = null;

        // hide modal
        $this->showModal = false;



        $this->emit('savedSubmissionGrade');
    }
    public function render()
    {
        return view('livewire.submission-grading-form');
    }

    public function loadSubmissionGrade(){
        $submissionGrade = SubmissionGrade::where('submission_id', $this->submissionId)->first();
        if(isset($submissionGrade)){
            $this->submissionGradeId = $submissionGrade->id;
            $this->grade = $submissionGrade->grade;
            $this->comment = $submissionGrade->comment;
        }

    }
}
