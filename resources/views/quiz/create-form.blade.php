<x-sidebar>
    <x-slot name="header">
        {{ __('Create Quiz') }}
    </x-slot>

    <livewire:create-edit-quiz-form :moduleId="$moduleId"/>
    
</x-sidebar>
