<x-sidebar>
    <x-slot name="header">
        <div class="flex gap-6">
            <a href="{{route('view-class', [ $class_id ])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left inline" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>

                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Students to Class') }}
            </h2>
        </div>
    </x-slot>



    <livewire:add-students-to-class :class_id="$class_id" />
</x-sidebar>
