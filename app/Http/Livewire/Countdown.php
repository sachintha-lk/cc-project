<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Countdown extends Component
{

    public $days;
    public $hours;
    public $minutes;
    public $seconds;

    public $time;

    private $timeCarbon;
    private $timeDiff;


    public function mount($time)
    {
        $this->time = $time;
        $this->timeCarbon = \Carbon\Carbon::parse($time);

        $this->updateTime();
    }

    public function updated()
    {
        $this->updateTime();
    }

    public function render()
    {
        return view('livewire.countdown');
    }

    private function updateTime()
    {
        $this->timeDiff = $this->timeCarbon->timestamp - time();

        $this->days = floor($this->timeDiff / (60 * 60 * 24));
        $this->hours = floor(($this->timeDiff - ($this->days * 60 * 60 * 24)) / (60 * 60));
        $this->minutes = floor(($this->timeDiff - ($this->days * 60 * 60 * 24) - ($this->hours * 60 * 60)) / 60);
        $this->seconds = floor(($this->timeDiff - ($this->days * 60 * 60 * 24) - ($this->hours * 60 * 60) - ($this->minutes * 60)));
    }

    // call update time every second
    public function updateTimeEverySecond()
    {
        $this->updateTime();
        $this->emit('updateTimeEverySecond');
    }
}
