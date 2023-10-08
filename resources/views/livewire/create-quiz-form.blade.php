<div class="ml-4">
    @if(session()->has('message'))
        <div class="flex items-center rounded-lg mb-6 m-4 bg-green-500 text-white text-sm  font-bold px-4 py-3 relative"
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
        {{--        return [--}}
        {{--        'name' => 'required|string|min:5|max:255',--}}
        {{--        'description' => 'nullable|string|min:5|max:255',--}}
        {{--        'module_id' => 'required|integer|exists:modules,id',--}}
        {{--        'total_marks' => 'nullable|numeric|min:0',--}}
        {{--        'pass_marks' => 'nullable|numeric|min:0',--}}
        {{--        'max_attempts' => 'nullable|integer|min:0',--}}
        {{--        'is_published' => 'boolean',--}}
        {{--        'media_url' => 'nullable|string',--}}
        {{--        'media_type' => 'nullable|string',--}}
        {{--        'duration' => 'nullable|integer|min:0',--}}
        {{--        'valid_from' => 'nullable|date',--}}
        {{--        'valid_upto' => 'nullable|date',--}}
        {{--        'time_between_attempts' => 'nullable|integer|min:0',--}}
        {{--        ];--}}


        <div class="m-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Quiz Name</label>
            <input type="text" id="name" name="name" wire:model.defer="quiz.name"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <x-input-error for="quiz.name" class="mt-2"/>

        </div>
        <div class="m-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" wire:model.defer="quiz.description"
                      class=" block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
                      focus:border-blue-500 sm:text-sm">
            </textarea>
            <x-input-error for="quiz.description" class="mt-2"/>

        </div>
        {{--        <div class="m-2">--}}
        {{--            <label for="total_marks" class="block text-sm font-medium text-gray-700">Total Marks</label>--}}
        {{--            <input type="number" id="total_marks" name="total_marks" wire:model.defer="quiz.total_marks"--}}
        {{--                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
        {{--            <x-input-error for="quiz.total_marks" class="mt-2"/>--}}

        {{--        </div>--}}

        {{--        <div class="m-2">--}}
        {{--            <label for="pass_marks" class="block text-sm font-medium text-gray-700">Pass Marks</label>--}}
        {{--            <input type="number" id="pass_marks" name="pass_marks" wire:model.defer="quiz.pass_marks"--}}
        {{--                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">--}}
        {{--            <x-input-error for="quiz.pass_marks" class="mt-2"/>--}}
        {{--        </div>--}}

        <div class="m-2">
            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="datetime-local" id="start_time" name="start_time" wire:model.defer="quiz.valid_from"
                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <x-input-error for="quiz.valid_from" class="mt-2"/>
        </div>

        <div class="m-2">
            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
            <input type="datetime-local" id="end_time" name="end_time" wire:model.defer="quiz.valid_upto"

                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500
                   focus:border-blue-500 sm:text-sm"/>
            <x-input-error for="quiz.valid_upto" class="mt-2"/>
        </div>

        <div class="m-2">
            <button wire:click="saveQuiz()" class="bg-blue-800 border border-transparent hover:bg-blue-600 focus:bg-blue-700
                text-white font-bold py-2 px-4 rounded">
                Save Quiz
            </button>
            <button wire:click="cancelSaveQuiz()" class="bg-gray-400 border border-transparent hover:bg-gray-400 focus:bg-gray-700
                text-white font-bold py-2 px-4 rounded">
                Cancel
            </button>
        </div>
        <div class="p-4 m-4 text-3xl font-extrabold"> OR
        </div>
        <div class="font-semibold text-2xl">Generate Quiz With AI</div>
        @if ($isOpenAIKeySet)
            <span class="text-red-700">NOTE: Check for accuracy of the generated quiz after generation</span>
        <div class="m-3"><a href="{{ route('create-quiz-with-ai', [ 'moduleId' => $moduleId,]) }}"
                class="bg-blue-800 border border-transparent hover:bg-blue-600 focus:bg-blue-700
                text-white font-bold py-2 px-4 rounded">
                Create Quiz With AI Generation
            </a>

        </div>
        @else
        <div>
            The Open AI API key is not set in the ENV file. To enable the AI Quiz Generation feature please set the OPENAI_API_KEY in the .env file.

            To get your API key, please visit <a href="https://platform.openai.com/" target="_blank">https://platform.openai.com/</a>
            More details related to the laravel package used for this feature can be found at <a href="https://github.com/openai-php/laravel"> Github : openai-php/laravel </a>
        </div>

        @endif
        <span>Note: The model used is GPT-3.5 turbo. Please refer to the OpenAI website for pricing</span>



    </div>


</div>
