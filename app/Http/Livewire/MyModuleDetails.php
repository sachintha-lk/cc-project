<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;

class MyModuleDetails extends Component
{
    public $assignments;

    public $module;

    public $module_id;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);
        $this->assignments = $this->module->assignments;
    }



    public function render()
    {
        return view('livewire.my-module-details');
    }
}
