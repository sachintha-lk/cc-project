<div>
    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
        {{$module->Module_name}}
    </h2>
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" class="bg-green-500 text-white p-4 rounded-lg mb-6 m-4 flex justify-between  ">
            <span class="block">{{ session('message') }}</span>
            <button @click="show = false" class="ml-4 text-xl font-medium text-white cursor-pointer">&times;</button>
        </div>
        <script>
            setTimeout(function() {
               document.querySelector('[x-data="{ show: true }"]').remove();
            },1500); // 5000 milliseconds = 5 seconds
         </script>
    @endif

    @if (session()->has('errormsg'))
        <div x-data="{ show: true }" x-show="show" class="bg-red-500 text-white p-4 rounded-lg mb-6 flex m-4 justify-between">
            <span class="block">{{ session('errormsg') }}</span>
            <button @click="show = false" class="ml-4 text-xl font-medium text-white cursor-pointer">&times;</button>
        </div>
        <script>
            setTimeout(function() {
               document.querySelector('[x-data="{ show: true }"]').remove();
            },1500); // 5000 milliseconds = 5 seconds
         </script>
    @endif

    <div>
        <h3 class="font-semibold text-lg mb-2 ml-4">General</h3>
        <div class="flex items-center">
            <x-label for="name" class="ml-4" value="{{ __('Assignment Name') }}" />
            <x-input id="name" type="text" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.assignment_name" />
            <x-input-error for="assignment.assignment_name" class="mt-2" />
        </div>
        <div class="flex items-center">
            <x-label for="name" class="ml-4" value="{{ __('Assignment Description') }}" />
            <textarea id="name" type="text" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.assignment_description" ></textarea>
            <x-input-error for="assignment.assignment_description" class="mt-2" />
        </div>
        <div class="flex items-center">
            <x-label for="name" class="ml-4" value="{{ __('Assignment File') }}" />
            <x-input id="name" type="file" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.assignment_file" />
            <x-input-error for="assignment.assignment_file'" class="mt-2" />
        </div>
        <hr>
        <h3 class="font-semibold text-lg mb-2 ml-4">Availability</h3>
        <div class="flex items-center">
            <x-label for="start-date" class="ml-4" value="{{ __('Assignment Start Date') }}" />
            <x-input id="start-date" type="datetime-local" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.start_date" />
            <x-input-error for="assignment.start_date" class="mt-2" />
        </div>
        <div class="flex items-center">
            <x-label for="deadline" class="ml-4" value="{{ __('Assignment Deadline') }}" />
            <x-input id="deadline" type="datetime-local" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.deadline" />
            <x-input-error for="assignment.deadline" class="mt-2" />
        </div>
        <hr>
        <h3 class="font-semibold text-lg mb-2 ml-4">File Type</h3>
        <div class="flex items-center">
        <div class="flex flex-col">
            <x-label for="name" class="ml-4" value="{{ __('Choose File Type For Submittion') }}" />
            <span class="ml-4">eg: zip,pdf,docx</span>
        </div>

            <x-input id="name" type="text" class="mt-1 ml-4 block w-96" wire:model.defer="assignment.assignment_type" />
            <x-input-error for="assignment.assignment_type" class="mt-2" />
        </div>
        <x-button id="save-assignment" class="ml-4 mt-4" wire:click="saveAssignment()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </div>

</div>
