<div class="mx-3 px-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Quiz') }}
        </h2>
    </x-slot>
    <div class="bg-white m-3 mx-1 rounded overflow-hidden shadow-lg">
        <div class="bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-700">
            {{--            <h2 class="px-4 pt-2 pb-0 mb-0 text-lg font-normal text-gray-800">{{ $module->Module_code }}--}}
            {{--                : {{ $module->Module_name }}</h2>--}}
            <h3 class="p-4 pt-1 text-2xl font-bold text-gray-800 mb-1">{{ $quiz->name }}</h3>
            <button wire:click="editQuiz" class="px-4 py-1 mb-2 ml-4 text-sm font-semibold text-gray-800 bg-white border border-gray-400 rounded shadow hover:bg-gray-100"
            >
                Edit Quiz
            </button>

            @if ($quiz->is_published == 1)
                <button wire:click="confirmQuizUnpublish" class="px-4 py-1 mb-2 ml-4 text-sm font-semibold text-gray-800 bg-white border border-gray-400 rounded shadow hover:bg-gray-100"
                >
                    Unpublish Quiz
                </button>

            @else
                <button wire:click="confirmQuizPublish" class="px-4 py-1 mb-2 ml-4 text-sm font-semibold text-gray-800 bg-white border border-gray-400 rounded shadow hover:bg-gray-100"
                >
                    Publish Quiz
                </button>
            @endif

            <button wire:click="confirmQuizDeletion" class="px-4 py-1 mb-2 ml-4 text-sm text-white font-semibold bg-red-600 rounded shadow hover:bg-red-700"
            >
                Delete Quiz
            </button>


        </div>
        <div class="p-3">
            <div class="text-sm font-normal text-gray-500 mb-2">{{ $quiz->description }}</div>

            <div class="flex  justify-around">
                <div class="font-normal text-gray-600">
                    <div class="text-center"> Start Time</div>
                    <div class=" font-semibold text-center">
                        {{ date('D, d M Y H:i:s', strtotime($quiz->valid_from)) }}
                    </div>

                </div>
                <div class="font-normal text-gray-600">
                    <div class="text-center"> End Time</div>
                    <div class=" font-semibold text-center">
                        {{ date('D, d M Y H:i:s', strtotime($quiz->valid_upto)) }}
                    </div>

                </div>
                @if($quiz->is_published == 1)
                    <div class="text-xl font-bold text-green-600">Published</div>
                @else
                    <div class="text-xl font-normal text-gray-600">Not Published</div>
                @endif

            </div>

        </div>
    </div>

    <h2 class="text-2xl leading-none font-bold text-gray-600 m-2">Quiz Attempts</h2>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <table class="min-w-max w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-3 text-center">Student ID</th>
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Score</th>
                <th class="py-3 px-6 text-center">Attempt Time</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-medium">
            @if (count($quizAttempts) != 0)
                @foreach ($quizAttempts as $attempt)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-3 text-center">
                            {{ $attempt->student->student_id }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center  ">
                                <div class="mr-2">
                                    {{-- <img class="w-6 h-6 rounded-full" src={{ $student->profile_photo_url }}/> --}}
                                    {{-- TODO fix image --}}
                                </div>
                                <span class="">{{ $attempt->student->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-3 text-center">
                            {{ $attempt->score }}
                        </td>
                        <td class="py-3 px-3 text-center">
                            {{ date('D, d M Y H:i:s', strtotime($attempt->created_at)) }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-3 text-center">
                        No attempts found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="p-5">
            {{ $quizAttempts->links() }}
        </div>

    </div>

    <div class="flex justify-between mt-5 ">
        <h3 class="text-2xl leading-none font-bold text-gray-600 mb-10">Questions</h3>

        <div class="mr-20">
            <x-button wire:click="$emit('openAddEditQuestionModal')">
                {{ __('Add Question') }}
            </x-button>
        </div>
    </div>
    <div class="mt-1 ml-4 mb-4">
        @foreach ($formattedQuestions as $formattedQuestion)
            <div class="mt-2">

                <h4 class="font-semibold text-xl text-gray-800 leading-tight">{{ $formattedQuestion['question'] }}</h4>
                <div>

                    <button wire:click="$emit('openAddEditQuestionModal', {{ $formattedQuestion['id'] }})" class="font-semibold px-3 py-1 bg-yellow-200 text-md text-gray-800 rounded leading-tight">Edit</button>

                    <button wire:click="deleteQuestion({{ $formattedQuestion['id'] }})" class="font-semibold  px-3 py-1 text-md  bg-red-800  text-gray-200 rounded leading-tight">Delete</button>
                </div>
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

    <livewire:add-edit-question :quizId="$quiz->id" wire:poll.750ms="refreshQuestions"/>




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

    <x-dialog-modal wire:model="confirmQuizDeletion">
        <x-slot name="title">
            {{ __('Delete Quiz') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this quiz?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmQuizDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteQuiz()" wire:loading.attr="disabled">
                {{ __('Delete Quiz') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>

