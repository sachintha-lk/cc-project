<?php

namespace App\Http\Livewire;

use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyModules extends Component
{

    public $modules;
    public function mount(){
        $studentId = Auth::user()->id;
        $student = User::findOrFail($studentId);
        $classId = $student->class_id;

        $this->modules = Module::where('class_id', $classId)->get();
    }
    public function render()
    {
        return view('livewire.my-modules',[
            'modules' => $this->modules
        ]);
    }
}
