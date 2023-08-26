<?php

namespace App\Http\Livewire;

use App\Models\Submissions;
use Livewire\Component;

class ShowSubmission extends Component
{
    public $submissions;

    
    public $assignmentId;

    public function mount($assignmentId){
        $this->assignmentId = $assignmentId;
        $this->loadSubmissions();
    }

    public function loadSubmissions(){
        $this->submissions = Submissions::with(['student:id,name','assignment'])
        ->where('assignment_id', $this->assignmentId)
        ->get();
    }
   
    public function render()
    {
        return view('livewire.show-submission');
    }
}
