<div class="w-3/4">

    <div class="m-2">
        <label for="name" class="block text-sm font-medium text-gray-700">Quiz Name</label>
        <input type="text" id="name" name="name" wire:model.defer="quiz.name"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.name" class="mt-2"/>
    </div>

    <div class="m-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description" wire:model.defer="quiz.description"
                  class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500
                  focus:border-yellow-500 sm:text-sm">
        </textarea>
        <x-input-error for="quiz.description" class="mt-2"/>
    </div>


    <div class="m-2">
        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
        <input type="datetime-local" id="start_time" name="start_time" wire:model.defer="quiz.valid_from"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.valid_from" class="mt-2"/>
    </div>


    <div class="m-2">
        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
        <input type="datetime-local" id="end_time" name="end_time" wire:model.defer="quiz.valid_upto"
               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        <x-input-error for="quiz.valid_upto" class="mt-2"/>
    </div>


    {{$quiz->questions}}

{{--    @foreach ($quiz->questions as $index => $question)--}}

{{--    @endforeach--}}
    <div class="container">
        <h1>Edit Quiz</h1>

        {{-- Quiz Information --}}
        <form method="POST" action="{{ route('quiz.update', $quiz->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="quizName" class="block text-gray-700 text-sm font-bold mb-2">Quiz Name:</label>
                <input type="text" id="quizName" name="quizName" value="{{ $quiz->name }}"
                       class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            {{-- Questions --}}
            @foreach(json_decode($questions, true) as $questionData)
                @php
                    $question = $questionData['question'];
                    $options = $question['options'];
                @endphp

                <div class="mb-4">
                    <label for="questionText{{ $question['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Question:</label>
                    <input type="text" id="questionText{{ $question['id'] }}" name="questions[{{ $question['id'] }}][text]"
                           value="{{ $question['name'] }}"
                           class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                {{-- Options --}}
                @foreach($options as $option)
                    <div class="mb-2">
                        <label for="optionText{{ $option['id'] }}" class="block text-gray-700 text-sm font-bold mb-2">Option:</label>
                        <input type="text" id="optionText{{ $option['id'] }}" name="questions[{{ $question['id'] }}][options][{{ $option['id'] }}]"
                               value="{{ $option['name'] }}"
                               class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                @endforeach

                {{-- Add Option Button --}}
                <div>
                    <button wire:click="addOption({{ $question['id'] }})"
                            class="text-blue-500 hover:text-blue-700 cursor-pointer">
                        Add Option
                    </button>
                </div>

                {{-- Delete Question Button --}}
                <div>
                    <button wire:click="deleteQuestion({{ $question['id'] }})"
                            class="text-red-500 hover:text-red-700 cursor-pointer">
                        Delete Question
                    </button>
                </div>
            @endforeach

            {{-- Add Question Button --}}
            <div class="mt-4">
                <button wire:click="addQuestion" class="text-green-500 hover:text-green-700 cursor-pointer">
                    Add Question
                </button>
            </div>

            {{-- Update Quiz Button --}}
            <div class="mt-4">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Quiz
                </button>
            </div>
        </form>
    </div>

</div>
