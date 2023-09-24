<x-sidebar>

    @if (session()->has('success'))
    <div class="m-2">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"> {{ session('success') }}</span>
        </div>
    </div>
    @endif


    <livewire:manage-quiz-view :quizSlug="$quizSlug"/>
</x-sidebar>
