<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AssignmentSubmittion extends Component
{

    public $assignment_id;
    public function render()
    {
        return view('livewire.assignment-submittion');
    }
}
