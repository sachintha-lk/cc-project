<div class="ml-10">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Quiz') }}
        </h2>
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
        <div class="text-xl font-bold text-green-600">Published</div>
    @else
        <div class="text-xl font-normal text-gray-600">Not Published</div>
    @endif


    <div class="flex justify-between mt-5 ">
        <h3 class="text-2xl leading-none font-bold text-gray-600 mb-10">Questions</h3>

        <div class="mr-20">
            <x-button wire:click="$emit('openAddQuestionModal')">
                {{ __('Add Question') }}
            </x-button>
        </div>
    </div>
    <div class="mt-1">
        @foreach ($formattedQuestions as $formattedQuestion)
            <div class="mt-2">
                <h4 class="font-semibold text-xl text-gray-800 leading-tight">{{ $formattedQuestion['question'] }}</h4>
                <p class="font-medium text-sm text-gray-700">Marks: {{ $formattedQuestion['marks'] }}</p>
                <ul>
                    @foreach ($formattedQuestion['options'] as $formattedOption)
                        <li class="ml-2 {{ $formattedOption['is_correct'] ? 'list-disc text-green-700 font-bold' : '' }}">
                            {{ $formattedOption['name'] }}
                        </li>

                    @endforeach
                </ul>
                {{--            <div>Answers: {{ implode(', ', $formattedQuestion['answers']) }}</div>--}}
            </div>
        @endforeach
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

    <livewire:add-question :quizId="$quiz->id" wire:poll.750ms="refreshQuestions"/>

    {{--    // show questions--}}


    {{--    // modal to add questions--}}

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

