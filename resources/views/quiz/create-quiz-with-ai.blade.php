<x-sidebar>
    <x-slot name="header">
        {{ __('Quiz Generation with AI') }}
    </x-slot>

    <div>
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                <ul class="list-none">
                    @foreach($errors->all() as $error)
                        <li class="mb-2">{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif
        <form method="POST" action="{{ route('create-quiz-with-ai-send-prompt', ['moduleId' => $moduleId]) }}"
              id="AIQuizForm"
              class="w-1/2 mx-auto"
              x-on:submit.prevent="showConfirmation = true">
            @csrf

            <div class="m-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Quiz Name</label>
            <input type="text" id="name" name="name"  required value="{{ old('name', '') }} "
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            @error('name')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" required
                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
              focus:border-blue-500 sm:text-sm">{{ old('description', '') }}</textarea>
            @error('description')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-2">
            <label for="num_questions" class="block text-sm font-medium text-gray-700">Number of Questions</label>
            <input type="number" id="num_questions" name="num_questions" required min=1" max="5" value="{{ old('num_questions', '') }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
           focus:border-blue-500 sm:text-sm">
            @error('num_questions')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-2">
            <label for="prompt" class="block text-sm font-medium text-gray-700">Prompt</label>
            <textarea id="prompt" name="prompt" required
                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
              focus:border-blue-500 sm:text-sm">{{ old('prompt', '')}}</textarea>
            @error('prompt')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-2">
            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="datetime-local" id="start_time" name="start_time" required value="{{ old('start_time', '') }}"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
        focus:border-blue-500 sm:text-sm">
        </div>
            <div class="m-2">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="datetime-local" id="end_time" name="end_time" required value="{{ old('end_time', '') }}"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
                focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" class="bg-blue-800 border border-transparent hover:bg-blue-600 focus:bg-blue-700
                text-white font-bold py-2 px-4 rounded">
                    Send Prompt to Generate Quiz
                </button>
            </div>

        </form>
    </div>
</x-sidebar>
