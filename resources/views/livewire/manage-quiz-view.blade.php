<div class="ml-10">
    <x-slot name="header">
        {{ __('Quiz ID') }}
    </x-slot>


    <div class="text-2xl sm:text-3xl font-bold text-gray-600">{{ $quiz->name }}</div>


    <div class="text-xl font-normal text-gray-500">{{ $quiz->description }}</div>


    {{--    <div class="text-xl font-normal text-gray-500">Total Marks: {{ $quiz->total_marks }}</div>--}}


    {{--    <div class="text-xl font-normal text-gray-500">Pass Marks: {{ $quiz->pass_marks }}</div>--}}


    {{--    <div class="text-xl font-normal text-gray-500">Max Attempts: {{ $quiz->max_attempts }}</div>--}}


    {{--    <div class="text-xl font-normal text-gray-500">{{ $quiz->media_url }}</div>--}}


    {{--    <div class="text-xl font-normal text-gray-500">{{ $quiz->media_type }}</div>--}}

    {{--    <div class="flex items-center">--}}
    {{--        <div class="flex-shrink-0">--}}
    {{--            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $quiz->duration }}</span>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="text-xl font-normal text-gray-500">
        <span class="text-gray-600"> Start Time: </span>
        {{ date('d-m-Y', strtotime($quiz->valid_from)) }}
    </div>

    <div class="text-xl font-normal text-gray-500">
        <span class="text-gray-600"> End Time: </span>
        {{ date('d-m-Y', strtotime($quiz->valid_upto)) }}
    </div>


    @if($quiz->is_published == 1)
        <div class="text-xl font-normal text-gray-600">Published</div>
    @else
        <div class="text-xl font-normal text-gray-600">Not Published</div>
    @endif


    <div class="flex justify-between mt-3 ">
        <h3 class="text-2xl leading-none font-bold text-gray-600 mb-10">Questions</h3>
        <div class="mr-20">
            <x-button wire:click="confirmQuestionAdd">
                {{ __('Add Question') }}
            </x-button>
        </div>
    </div>
    <div class="mt-8 text-2xl flex justify-between w-1/2">

        @if ($quiz->is_published == 1)
            <div class="mr-2">
                <x-button wire:click="confirmQuizUnpublish">
                    {{ __('Unpublish') }}
                </x-button>
            </div>
        @else
            <div class="mr-2">
                <x-button wire:click="confirmQuizPublish">
                    {{ __('Publish') }}
                </x-button>
            </div>
        @endif
        <div class="mr-2">
            <x-button wire:click="confirmQuizUpdate">
                {{ __('Edit') }}
            </x-button>
        </div>
        <div class="mr-2">
            <x-danger-button wire:click="confirmQuizDeletion">
                {{ __('Delete Quiz') }}
            </x-danger-button>
        </div>
    </div>
    {{--    // table to show questions--}}
    {{--    <div class="block w-full overflow-x-auto mt-2">--}}
    {{--        <table class="items-center w-full bg-transparent border-collapse">--}}
    {{--            <thead>--}}
    {{--            <tr>--}}
    {{--                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Question Id</th>--}}
    {{--                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Question</th>--}}
    {{--                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}
    {{--            <tbody class="divide-y divide-gray-100">--}}
    {{--            @if ($questions->count() == 0)--}}
    {{--                <tr class="text-gray-500">--}}
    {{--                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No results found</td>--}}
    {{--                </tr>--}}
    {{--            @else--}}
    {{--                @foreach($questions as $question)--}}
    {{--                    <tr class="text-gray-500">--}}
    {{--                        <td class="border-t-0 px-4 align-middle text-sm font--}}
    {{--                        -normal whitespace-nowrap p-4 text-left">{{ $question->id }}</td>--}}
    {{--                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $question->question }}</td>--}}
    {{--                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">--}}
    {{--                            <div class=" mr-2 mt-5">--}}
    {{--                                <x-danger-button wire:click="confirmQuestionDeletion({{$question->id}})" wire:loading.attr="disabled">--}}
    {{--                                    {{ __('Delete') }}--}}
    {{--                                </x-danger-button>--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-5">--}}
    {{--                                <x-secondary-button wire:click="confirmQuestionUpdate({{$question->id}})" wire:loading.attr="disabled" class=" bg-amber-600 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">--}}
    {{--                                    {{ __('Update') }}--}}
    {{--                                </x-secondary-button>--}}
    {{--                            </div>--}}
    {{--                            <div class="mt-5 ml-2">--}}
    {{--                                <a href={{route('view-question', [$question->id])}}>--}}
    {{--                                    <x-secondary-button class=" bg-amber-600 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">--}}
    {{--                                        {{ __('View') }}--}}
    {{--                                    </x-secondary-button>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </td>--}}
    {{--                    </tr>--}}
    {{--                @endforeach--}}
    {{--            @endif--}}
    {{--            </tbody>--}}
    {{--        </table>--}}
    {{--    </div>--}}
    {{--    // modal to add questions--}}
    {{--    <x-dialog-modal wire:model="confirmQuestionAdd">--}}
    {{--        <x-slot name="title">--}}
    {{--            {{ isset($this->question->id) ?'Update Question' : 'Add Question' }}--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="content">--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="question" value="{{ __('Question') }}" />--}}
    {{--                <x-input id="question" type="text" class="mt-1 block w-full" wire:model.defer="question.question" />--}}
    {{--                <x-input-error for="question.question" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="question_type" value="{{ __('Question Type') }}" />--}}
    {{--                <select id="question_type" name="question_type" wire:model.defer="question.question_type"--}}
    {{--                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
    {{--                    <option value="single">Single</option>--}}
    {{--                    <option value="multiple">Multiple</option>--}}
    {{--                </select>--}}
    {{--                <x-input-error for="question.question_type" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="marks" value="{{ __('Marks') }}" />--}}
    {{--                <x-input id="marks" type="number" class="mt-1 block w-full" wire:model.defer="question.marks" />--}}
    {{--                <x-input-error for="question.marks" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="negative_marks" value="{{ __('Negative Marks') }}" />--}}
    {{--                <x-input id="negative_marks" type="number" class="mt-1 block w-full" wire:model.defer="question.negative_marks" />--}}
    {{--                <x-input-error for="question.negative_marks" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="media_url" value="{{ __('Media URL') }}" />--}}
    {{--                <x-input id="media_url" type="text" class="mt-1 block w-full" wire:model.defer="--}}
    {{--                question.media_url" />--}}
    {{--                <x-input-error for="question.media_url" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="media_type" value="{{ __('Media Type') }}" />--}}
    {{--                <select id="media_type" name="media_type" wire:model.defer="question.media_type"--}}
    {{--                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
    {{--                    <option value="image">Image</option>--}}
    {{--                    <option value="video">Video</option>--}}
    {{--                </select>--}}
    {{--                <x-input-error for="question.media_type" class="mt-2" />--}}
    {{--            </div>--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="footer">--}}
    {{--            <x-secondary-button wire:click="$set('confirmQuestionAdd', false)" wire:loading.attr="disabled">--}}
    {{--                {{ __('Cancel') }}--}}
    {{--            </x-secondary-button>--}}
    {{--            <x-danger-button class="ml-3" wire:click="saveQuestion()" wire:loading.attr="disabled">--}}
    {{--                {{ __('Save') }}--}}
    {{--            </x-danger-button>--}}
    {{--        </x-slot>--}}
    {{--    </x-dialog-modal>--}}
    {{--    // modal to update questions--}}
    {{--    <x-dialog-modal wire:model="confirmQuestionUpdate">--}}
    {{--        <x-slot name="title">--}}
    {{--            {{ isset($this->question->id) ?'Update Question' : 'Add Question' }}--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="content">--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="question" value="{{ __('Question') }}" />--}}
    {{--                <x-input id="question" type="text" class="mt-1 block w-full" wire:model.defer="question.question" />--}}
    {{--                <x-input-error for="question.question" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="question_type" value="{{ __('Question Type') }}" />--}}
    {{--                <select id="question_type" name="question_type" wire:model.defer="question.question_type"--}}
    {{--                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
    {{--                    <option value="single">Single</option>--}}
    {{--                    <option value="multiple">Multiple</option>--}}
    {{--                </select>--}}
    {{--                <x-input-error for="question.question_type" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="marks" value="{{ __('Marks') }}" />--}}
    {{--                <x-input id="marks" type="number" class="mt-1 block w-full" wire:model.defer="question.marks" />--}}
    {{--                <x-input-error for="question.marks" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="negative_marks" value="{{ __('Negative Marks') }}" />--}}
    {{--                <x-input id="negative_marks" type="number" class="mt-1 block w-full" wire:model.defer="question.negative_marks" />--}}
    {{--                <x-input-error for="question.negative_marks" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="media_url" value="{{ __('Media URL') }}" />--}}
    {{--                <x-input id="media_url" type="text" class="mt-1 block w-full" wire:model.defer="--}}
    {{--                question.media_url" />--}}
    {{--                <x-input-error for="question.media_url" class="mt-2" />--}}
    {{--            </div>--}}
    {{--            <div class="col-span-6 sm:col-span-4">--}}
    {{--                <x-label for="media_type" value="{{ __('Media Type') }}" />--}}
    {{--                <select id="media_type" name="media_type" wire:model.defer="question.media_type"--}}
    {{--                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">--}}
    {{--                    <option value="image">Image</option>--}}
    {{--                    <option value="video">Video</option>--}}
    {{--                </select>--}}
    {{--                <x-input-error for="question.media_type" class="mt-2" />--}}
    {{--            </div>--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="footer">--}}
    {{--            <x-secondary-button wire:click="$set('confirmQuestionUpdate', false)" wire:loading.attr="disabled">--}}
    {{--                {{ __('Cancel') }}--}}
    {{--            </x-secondary-button>--}}
    {{--            <x-danger-button class="ml-3" wire:click="updateQuestion()" wire:loading.attr="disabled">--}}
    {{--                {{ __('Update') }}--}}
    {{--            </x-danger-button>--}}
    {{--        </x-slot>--}}
    {{--    </x-dialog-modal>--}}

</div>

