<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CountdownTimer extends Component
{
    public $time;

    public function mount($time)
    {
        $this->time = $time;
    }

    public function render()
    {
        return view('livewire.countdown-timer', [
            'time' => $this->time
        ]);
    }
}
