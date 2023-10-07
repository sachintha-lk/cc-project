<?php

namespace App\Http\Livewire;

use App\Models\CourseResource;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ResourceAddEdit extends Component
{
    use WithFileUploads;

    public $name;
    public $type;
    public $resource;

    public $module_id;

    public $resource_id;
    public $resource_type;

    public $resource_link;

    public $resource_file;

    public $isUploadingFile = false;

    public $resource_text;

    protected $rules = [
        'name' => 'required|min:6|max:255',
        'type' => 'required|in:link,file,text',
    ];

    public function mount($module_id) {
        $this->module_id = $module_id;
        if ($this->resource_id) {
            $resource = CourseResource::find($this->resource_id);
            $this->name = $resource->name;
            $this->type = $resource->type;
            $this->resource = $resource->resource;
            $this->module_id = $resource->module_id;

            if ($this->type == 'link') {
                $this->resource_link = $this->resource;
            } elseif ($this->type == 'file') {
                $this->resource_file = $this->resource;
            } elseif ($this->type == 'text') {
                $this->resource_text = $this->resource;
            }

            // dd all
//            dd($this->name, $this->type, $this->resource, $this->module_id);
        }




    }
    public function render()
    {
        return view('livewire.resource-add-edit');
    }

    public function addResource()
    {
        $this->validate();

        if ($this->resource_id) {
            // If resource_id is set, it's an edit operation
            $this->editExistingResource();
        } else {
            // Otherwise, it's a new resource
            $this->createNewResource();
        }


    }

    private function createNewResource()
    {
        // Create a new resource
        if ($this->type === "file" ) {
//            $this->isUploadingFile = true;
            if ($this->resource_file instanceof TemporaryUploadedFile) {
//                $this->isUploadingFile = false;
                $resource = new CourseResource();
                $resource->resource = $this->saveNewFile();
                $this->updateResource($resource);
            }
        } else {
            $resource = new CourseResource();
            $this->updateResource($resource);
        }

    }

    private function editExistingResource()
    {
        // Update an existing resource
        $resource = CourseResource::find($this->resource_id);

        if ($resource) {
            // Check if the resource type is 'file' and a new file is uploaded
//            dd($this->type, $this->resource_file, ($this->type === 'file' && $this->resource_file));
            if ($this->type === 'file' && $this->resource_file) {
//                $this->isUploadingFile = true;
                if ($this->resource_file instanceof TemporaryUploadedFile) {
//                    $this->isUploadingFile = false;
                    // Check if the old resource is a file, and delete it if it is
                    if (is_file($resource->resource)) {
                        $this->deleteOldFile($resource->resource);
                    }

                    // Save the new file
                    $resource->resource = $this->saveNewFile();
                    $this->updateResource($resource);

                }
            } else {
            // If no new file is uploaded during edit, keep the existing resource
                $resource->resource = $this->resource;
                $this->updateResource($resource);

            }
        }
    }

    private function deleteOldFile($oldFileName)
    {
        // Delete the old file if it exists
        if ($oldFileName) {
            $oldFilePath = public_path('storage/resources/' . $oldFileName);

            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    }

    private function saveNewFile()
    {

//        dd($this->resource_file);
        // Generate a new unique filename
        $this->validate([
            'resource_file' => 'required|file|mimes:png,jpg,jpeg,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar|max:204800', // 200MB Max
        ]);

        $fileName = pathinfo($this->resource_file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $this->resource_file->getClientOriginalExtension();

        // Store the new file
        $this->resource_file->storeAs('resources', $fileName, 'public');

        return $fileName;
    }

    private function updateResource($resource)
    {
        $resource->name = $this->name;
        $resource->type = $this->type;
        $resource->module_id = $this->module_id;

        if ($this->type == 'link') {
            // validate link url
            $this->validate([
                'resource_link' => 'required|url',
            ]);
            $resource->resource = $this->resource_link;
        } elseif ($this->type == 'text') {
            // validate text
            $this->validate([
                'resource_text' => 'required|min:6|max:255',
            ]);
            $resource->resource = $this->resource_text;
        }

        $resource->save();

        $this->resetExcept(['module_id']);

        return redirect()->route('module-details', ['module_id' => $this->module_id]);
    }



    public function updatedResourceFile()
    {
        // Set $isUploadingFile to false when $resource_file changes
        // is TemporaryUploadedFile
        if ($this->resource_file instanceof TemporaryUploadedFile) {
            $this->isUploadingFile = false;  // finished uploading
        } else {
            $this->isUploadingFile = true;  // still uploding
        }

        $this->render();
    }

}
