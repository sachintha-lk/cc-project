<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Module;
use Livewire\Component;
use Livewire\WithFileUploads;

class Assignments extends Component
{
    use WithFileUploads;

    public $module_id;
    public $module;
    public $assignment;


    protected $rules = [
        'assignment.assignment_name' => 'required|string|min:4',
        'assignment.assignment_description' => 'required|string|min:4',
        'assignment.assignment_file' => 'required|file|max:102400',
        'assignment.assignment_type' => 'required|string|min:4',
        'assignment.start_date' => 'required|date',
        'assignment.deadline' => 'required|date',
    ];

    // 'rules' => 'file|mimes:png,jpg,pdf|max:102400
    // https://laravel-livewire.com/docs/2.x/file-uploads
    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);
    }

    public function render()
    {
        return view('livewire.assignments');
    }

    public function saveAssignment()
    {
        $this->validate();

        // Generate a random number for the file name
        $randomNumber = rand(1, 1000);

        // Get the original file name and extension
        $originalFileName = $this->assignment['assignment_file']->getClientOriginalName();
        $extension = $this->assignment['assignment_file']->extension();

        // Create a unique file name
        $fileName = "{$originalFileName}_{$randomNumber}.{$extension}";

        // Store the file in the 'assignments' folder
        $this->assignment['assignment_file']->storeAs('assignments', $fileName, 'public');

        // Create a new assignment record
        Assignment::create([
            'start_date' => $this->assignment['start_date'],
            'deadline' => $this->assignment['deadline'],
            'assignment_name' => $this->assignment['assignment_name'],
            'assignment_description' => $this->assignment['assignment_description'],
            'assignment_file' => $fileName,
            'assignment_type' => $this->assignment['assignment_type'],
            'module_id' => $this->module_id,
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Assignment Added Successfully');

        // Reset the assignment data
        $this->assignment = [
            'assignment_name' => '',
            'assignment_description' => '',
            'assignment_file' => '',
            'assignment_type' => '',
            'start_date' => '',
            'deadline' => '',
        ];

        // Redirect to the module details page
        return redirect()->to(route('module-details', ['module_id' => $this->module_id]));
    }


}