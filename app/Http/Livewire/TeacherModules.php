<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Auth;
use Livewire\Component;

class TeacherModules extends Component
{

    public $modules;

    public function mount(){
        $teacherId = Auth::user()->id;
        $this->modules = Module::where('teacher_id', $teacherId)->get();
    }
    public function render()
    {
        return view('livewire.teacher-modules', [
            'modules' => $this->modules
        ]);
    }
}
