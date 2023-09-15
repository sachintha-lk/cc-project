<x-sidebar>
    <x-slot name="header">
        {{ __('Create Quiz') }}
    </x-slot>

    <livewire:create-quiz-form :moduleId="$moduleId"/>

</x-sidebar>
