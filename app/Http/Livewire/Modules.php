<?php

namespace App\Http\Livewire;

use App\Models\GradeClasses;
use App\Models\Module;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Modules extends Component
{
    use WithPagination;
    public $classId;
    public $teachers;
    public $active;
    public $q;
    public $module;
    public $ConfirmingModuleDeletion = false;
    public $ConfirmingModuleAddition = false;

    protected $queryString = [
        'active' => ['except' => false],
        'q' => ['except' => '']
    ];

    protected $rules = [
        'module.Module_name' => 'required|string|min:4',
        'module.Module_code' => 'required|string|max:6|unique:modules,Module_code',
        'module.teacher_id' => 'required',
    ];
    public function mount($classId)
    {
        $this->classId = $classId;

        $this->teachers = User::where('role_id', 2)->get();

    }

    public function render()
    {
    $class = GradeClasses::find($this->classId);

    $modules = Module::with('teacher') // Eager load the teacher relationship
        ->where('class_id', $this->classId)
        ->when ($this->active, function ($query) {
            return $query->active();
        })
        ->when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->where('Module_name', 'like', '%' . $this->q . '%')
                ->orWhere('Module_code' , 'like' , '%' .$this->q . '%');
            });
        })
        ->paginate(5);
        

    return view('livewire.modules', compact('class', 'modules'));
    }

    public function updationq(){
        $this->resetPage();
    }
    public function updationactive(){
        $this->resetPage();
    }

    public function confirmModuleDeletion($id)
    {
        // $module->delete();
        $this->ConfirmingModuleDeletion = $id;
    }

    public function DeleteModule(Module $module)
    {
        $module->delete();
        $this->ConfirmingModuleDeletion = false;
        session()->flash('message','Module Deleted Successfully');
    }

    public function confirmModuleAddition()
    {
      $this->reset(['module']);
       $this->ConfirmingModuleAddition = true;
    } 

    public function confirmModuleUpdate(Module $module){

        $this->module = $module;
        $this->ConfirmingModuleAddition = true;
    }

   public function SaveModule(){
    $this->validate();
    // dd($this->module['Module_name']);

    if(isset($this->module->id)){
        $this->module->save();
        session()->flash('message', 'Module Updated Successfully');
    }else{

        Module::create([
            'Module_name' => $this->module['Module_name'],
            'Module_code' => $this->module['Module_code'],
            'teacher_id' => $this->module['teacher_id'],
            'iscommon' => $this->module['iscommon'] ?? 0 ,
            'class_id' => $this->classId,
        ]);
        session()->flash('message', 'Module Added Successfully');
    }
    $this->ConfirmingModuleAddition = false;
   }
   

}
