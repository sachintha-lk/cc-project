<?php

namespace App\Http\Livewire;

use App\Models\Assignment;
use App\Models\Module;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 *
 */
class Assignments extends Component
{
    use WithFileUploads;

    /**
     * @var
     */
    public $module_id;
    /**
     * @var
     */
    public $module;
    /**
     * @var
     */
    public $assignment;

    /**
     * @var string[]
     */
    protected $rules = [
        'assignment.assignment_name' => 'required|string|min:4',
        'assignment.assignment_description' => 'required|string|min:4',
        'assignment.assignment_file' => 'required|file|max:102400',
        'assignment.assignment_type' => 'required|string|min:4',
        'assignment.start_date' => 'required|date',
        'assignment.deadline' => 'required|date',
    ];

    /**
     * @param $module_id
     * @return void
     */
    public function mount($module_id)
    {
        $this->module_id = $module_id;
        $this->module = Module::find($module_id);
        $this->resetAssignmentData();
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.assignments');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAssignment()
    {
        $this->validate();

        $fileName = $this->storeUploadedFile();

        $this->createAssignment($fileName);

        $this->resetAssignmentData();

        session()->flash('message', 'Assignment Added Successfully');

        return redirect()->to(route('module-details', ['module_id' => $this->module_id]));
    }

    /**
     * @return string
     */
    private function storeUploadedFile()
    {
        $randomNumber = rand(1, 1000);
        $originalFileName = $this->assignment['assignment_file']->getClientOriginalName();
        $extension = $this->assignment['assignment_file']->extension();
        $fileName = "{$originalFileName}_{$randomNumber}.{$extension}";

        Storage::disk('public')->putFileAs('assignments', $this->assignment['assignment_file'], $fileName);

        return $fileName;
    }

    /**
     * @param $fileName
     * @return void
     */
    private function createAssignment($fileName)
    {
        Assignment::create([
            'start_date' => $this->assignment['start_date'],
            'deadline' => $this->assignment['deadline'],
            'assignment_name' => $this->assignment['assignment_name'],
            'assignment_description' => $this->assignment['assignment_description'],
            'assignment_file' => $fileName,
            'assignment_type' => $this->assignment['assignment_type'],
            'module_id' => $this->module_id,
        ]);
    }

    /**
     * @return void
     */
    private function resetAssignmentData()
    {
        $this->assignment = [
            'assignment_name' => '',
            'assignment_description' => '',
            'assignment_file' => '',
            'assignment_type' => '',
            'start_date' => '',
            'deadline' => '',
        ];
    }
}
