<div class="w-9/12 mx-auto">
        <div class="m-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" type="text" wire:model="name" class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                      focus:border-yellow-500 sm:text-sm" placeholder="Resource Name">
            <x-input-error for="name" class="mt-2"/>
        </div>
        <div class="m-2">
            <label for="type" class="block text-sm font-medium text-gray-700">Resource Type</label>
            <select id="type" wire:model="type" class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                    focus:border-yellow-500 sm:text-sm">
                <option value="select">Select Resource Type</option>
                <option value="link">Link</option>
                <option value="file">File</option>
                <option value="text">Text</option>
            </select>
            <x-input-error for="type" class="mt-2"/>
        </div>

        @if($type == "link")
        <div class="m-2">
            <label for="resource_link" class="block text-sm font-medium text-gray-700">Link</label>
            <span class="text-gray-500"> Enter url including https://</span>
            <input id="resource_link" type="text" wire:model="resource_link" class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                      focus:border-yellow-500 sm:text-sm" placeholder="Resource Link">
            <x-input-error for="resource_link" class="mt-2"/>
        </div>

        @elseif($type == "file")
        <div class="m-2">
            <label for="resource_file" class="block text-sm font-medium text-gray-700">File</label>
            <input id="resource_file" type="file" wire:model="resource_file" class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                      focus:border-yellow-500 sm:text-sm" placeholder="Resource File">
            <x-input-error for="resource_file" class="mt-2"/>
        </div>

            @if($resource_id && $type === 'file' && $resource)
                <div>
                    <span class="text-gray-500">Current File In System: </span>
                    <a class="underline" href="{{ asset('storage/resources/'.$resource) }}" >{{ $resource }}</a>

                </div>

            @endif




        @elseif($type == "text")
        <div class="m-2">
            <label for="resource_text" class="block text-sm font-medium text-gray-700">Text</label>
            <textarea id="resource_text" wire:model="resource_text" class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                      focus:border-yellow-500 sm:text-sm" placeholder="Resource Text"></textarea>
            <x-input-error for="resource_text" class="mt-2"/>
        </div>
        @endif

        <button wire:click="addResource" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            {{ isset($resource_id) ? 'Save Resource' :'Add Resource'}}
        </button>

</div>
