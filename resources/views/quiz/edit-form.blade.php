<x-sidebar>
    <x-slot name="header">
        {{ __('Create Quiz') }}
    </x-slot>
{{--    --}}
    <livewire:edit-quiz :quizSlug="$quizSlug"/>
{{--    @livewire('edit-quiz', ['quizSlug' => $quizSlug])--}}

</x-sidebar>
