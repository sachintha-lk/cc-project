<x-sidebar>
    <x-slot:header >

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($resource_id) ?'Edit Resource' : 'Add Resource' }}
        </h2>

    </x-slot:header >

    @if(isset($resource_id))
        <livewire:resource-add-edit :module_id="$module_id" :resource_id="$resource_id"/>
    @else
        <livewire:resource-add-edit :module_id="$module_id"/>
    @endif

</x-sidebar>
