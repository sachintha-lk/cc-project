<?php

namespace App\Http\Livewire;
use App\Models\Grade;
use App\Models\GradeClasses;
use Livewire\Component;
use Livewire\WithPagination;



class GradeClass extends Component
{
    use WithPagination;
    public $gradeId;
    public $q;

     public $gclass;

    public $confirmingClassDeletion = false;
     public $confirmingClassAdd = false;

    protected $queryString = [
        'q' => ['except' => ''],
    ];

    protected $rules = [
        'gclass.class_name' => 'required|string|min:3',
    ];

    public function mount($gradeId)
    {
        $this->gradeId = $gradeId;
    }



    public function render()
    {
        $grade = Grade::find($this->gradeId);
        $classes = GradeClasses::where('grade_id', $this->gradeId)
        ->when($this->q,function($query){
           return $query->where(function($query){
               $query->where('class_name','like','%'.$this->q.'%');
           });
        })
        ->paginate(5); 
        return view('livewire.gradeclass', compact('grade'),['classes'=>$classes]);
    }

    public function updateq(){
        $this->resetPage();
    }

    public function confirmClassDeletion($id){
       
        //   $classes->delete();
           $this->confirmingClassDeletion = $id;

    }
    public function deleteClass(GradeClasses $classes){
        $classes->delete();
        $this->confirmingClassDeletion = false;
        session()->flash('message','Class Deleted Successfully');
    }

    public function  confirmClassAdd(){
        
        $this->confirmingClassAdd = true;
    }

    public function confirmClassUpdate(GradeClasses $classes)
    {
        $this->gclass = $classes;
        $this->confirmingClassAdd = true;
    }

    public function saveclass()
{
    $this->validate();

    if (isset($this->gclass->id)) {
        $this->gclass->save();
        session()->flash('message', 'Class Updated Successfully');
    } else {
        GradeClasses::create([
            'class_name' => $this->gclass['class_name'],
            'grade_id' => $this->gradeId,
        ]);
        session()->flash('message', 'Class Added Successfully');
    }

    $this->confirmingClassAdd = false;
}








     
}
