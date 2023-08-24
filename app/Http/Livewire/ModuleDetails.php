<?php

namespace App\Http\Livewire;

use App\Models\Module;
use Livewire\Component;

class ModuleDetails extends Component
{

    public $module_id;

    public $module;

    public $assignments;

    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);
        $this->assignments = $this->module->assignments;

        // dd($this->assignments);
    }

    public function render()
    {
        return view('livewire.module-details');
    }
}