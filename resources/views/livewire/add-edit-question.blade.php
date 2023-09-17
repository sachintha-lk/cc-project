<x-dialog-modal wire:model="confirmQuestionAddEdit">
    <x-slot name="title">
        {{ isset($this->question->id) ?'Update Question' : 'Add Question' }}
    </x-slot>
    <x-slot name="content">
        <div class="ml-4">
            @if(session()->has('message'))
                <div
                    class="flex items-center rounded-lg mb-6 m-4 bg-green-500 text-white text-sm  font-bold px-4 py-3 relative"
                    role="alert" x-data="{ show: true }" x-show="show">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                    </svg>
                    <p>{{ session('message') }}</p>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
          <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 20 20">
             <title>Close</title>
             <path
                 d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
          </svg>
       </span>
                </div>
                <script>
                    setTimeout(function () {
                        document.querySelector('[x-data="{ show: true }"]').remove();
                    }, 1500); // 5000 milliseconds = 5 seconds
                </script>
            @endif
            <div class="w-1/2 ">
                <div class="m-2">
                    <label for="question_name" class="block text-sm font-medium text-gray-700">Question</label>
                    <input type="text" id="question_name" name="question_name" wire:model.defer="question_name"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="question_name" class="mt-2"/>
                </div>
                <div class="m-2">
                    <label for="marks" class="block text-sm font-medium text-gray-700">Marks</label>
                    <input type="number" id="marks" name="marks" min="0" wire:model.defer="marks"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="marks" class="mt-2"/>
                </div>

                <div class="m-2">
                    <label for="option_a" class="block text-sm font-medium text-gray-700">Option A</label>
                    <input type="text" id="option_a" name="option_a" wire:model.defer="option_a"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="option_a" class="mt-2"/>
                </div>
                <div class="m-2">
                    <label for="option_b" class="block text-sm font-medium text-gray-700">Option B</label>
                    <input type="text" id="option_b" name="option_b" wire:model.defer="option_b"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="option_b" class="mt-2"/>
                </div>
                <div class="m-2">
                    <label for="option_c" class="block text-sm font-medium text-gray-700">Option C</label>
                    <input type="text" id="option_c" name="option_c" wire:model.defer="option_c"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="option_c" class="mt-2"/>
                </div>
                <div class="m-2">
                    <label for="option_d" class="block text-sm font-medium text-gray-700">Option D</label>
                    <input type="text" id="option_d" name="option_d" wire:model.defer="option_d"
                           class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <x-input-error for="option_d" class="mt-2"/>
                </div>
                <div class="m-2">
                    <label for="correct_answer" class="block text-sm font-medium text-gray-700">Correct Answer</label>
                    <select id="correct_answer" name="correct_answer" wire:model.defer="correct_answer"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                        <option value="" selected disabled>Select Correct Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    <x-input-error for="correct_answer" class="mt-2"/>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">

        <div class="m-2">
            <button wire:click="saveQuestion()" class="bg-yellow-800 border border-transparent hover:bg-yellow-600 focus:bg-yellow-700
                text-white font-bold py-2 px-4 rounded">
                Save Question
            </button>
            <button wire:click="cancelSaveQuestion()" class="bg-gray-400 border border-transparent hover:bg-gray-400 focus:bg-gray-700
                text-white font-bold py-2 px-4 rounded">
                Cancel
            </button>
        </div>
    </x-slot>
</x-dialog-modal>


{{--<x-dialog-modal wire:model="confirmQuestionAdd">--}}
{{--    <x-slot name="title">--}}
{{--        {{ isset($this->question->id) ?'Update Question' : 'Add Question' }}--}}
{{--    </x-slot>--}}
{{--    <x-slot name="content">--}}
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="question" value="{{ __('Question') }}"/>--}}
{{--            <x-input id="question" type="text" class="mt-1 block w-full" wire:model.defer="question.question"/>--}}
{{--            <x-input-error for="question.question" class="mt-2"/>--}}
{{--        </div>--}}
{{--        --}}{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--        --}}{{--            <x-label for="question_type" value="{{ __('Question Type') }}"/>--}}
{{--        --}}{{--            <select id="question_type" name="question_type" wire:model.defer="question.question_type"--}}
{{--        --}}{{--                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
{{--        --}}{{--                <option value="single-answer">Multiple Choice Single answer</option>--}}
{{--        --}}{{--                <option value="multiple-answer">Multiple Choice Multiple answer</option>--}}
{{--        --}}{{--                <option value="fill-in-the-blanks ">Fill in the blanks</option>--}}
{{--        --}}{{--            </select>--}}
{{--        --}}{{--            <x-input-error for="question.question_type" class="mt-2"/>--}}
{{--        --}}{{--        </div>--}}
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-label for="marks" value="{{ __('Marks') }}"/>--}}
{{--            <x-input id="marks" type="number" class="mt-1 block w-full" wire:model.defer="question.marks"/>--}}
{{--            <x-input-error for="question.marks" class="mt-2"/>--}}
{{--        </div>--}}

{{--        --}}{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--        --}}{{--            <x-label for="media_url" value="{{ __('Media URL') }}"/>--}}
{{--        --}}{{--            <x-input id="media_url" type="text" class="mt-1 block w-full" wire:model.defer="--}}
{{--        --}}{{--                    question.media_url"/>--}}
{{--        --}}{{--            <x-input-error for="question.media_url" class="mt-2"/>--}}
{{--        --}}{{--        </div>--}}
{{--        --}}{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--        --}}{{--            <x-label for="media_type" value="{{ __('Media Type') }}"/>--}}
{{--        --}}{{--            <select id="media_type" name="media_type" wire:model.defer="question.media_type"--}}
{{--        --}}{{--                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
{{--        --}}{{--                <option value="image">Image</option>--}}
{{--        --}}{{--                <option value="video">Video</option>--}}
{{--        --}}{{--            </select>--}}
{{--        --}}{{--            <x-input-error for="question.media_type" class="mt-2"/>--}}
{{--        --}}{{--        </div>--}}
{{--        <div class=""--}}
{{--    </x-slot>--}}
{{--    <x-slot name="footer">--}}
{{--        <x-secondary-button wire:click="$set('confirmQuestionAdd', false)" wire:loading.attr="disabled">--}}
{{--            {{ __('Cancel') }}--}}
{{--        </x-secondary-button>--}}
{{--        <x-danger-button class="ml-3" wire:click="saveQuestion()" wire:loading.attr="disabled">--}}
{{--            {{ __('Save') }}--}}
{{--        </x-danger-button>--}}
{{--    </x-slot>--}}
{{--</x-dialog-modal>--}}

