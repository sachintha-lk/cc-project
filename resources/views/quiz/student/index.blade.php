<x-sidebar>
    <div x-data="{ showQuizAttemptConfirmModal: false}">
        <div class="bg-white m-3 mx-6 rounded overflow-hidden shadow-lg">
            <div class="bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-700">
                <h2 class="px-4 pt-2 pb-0 mb-0 text-lg font-normal text-gray-800">{{ $module->Module_code }}
                    : {{ $module->Module_name }}</h2>
                <h3 class="p-4 pt-1 text-2xl font-bold text-gray-800 mb-1">{{ $quiz->name }}</h3>
            </div>


            <div class="p-3">
                <div class="text-sm font-normal text-gray-500 mb-2">{{ $quiz->description }}</div>
                {{--                <div class="text-sm font-normal text-gray-500">Total Marks: {{ $quiz->total_marks }}</div>--}}
                {{--                <div class="text-sm font-normal text-gray-500">Pass Marks: {{ $quiz->pass_marks }}</div>--}}
                {{--                <div class="text-sm font-normal text-gray-500">Max Attempts: {{ $quiz->max_attempts }}</div>--}}
                {{--                <div class="text-sm font-normal text-gray-500">{{ $quiz->media_url }}</div>--}}
                {{--                <div class="text-sm font-normal text-gray-500">{{ $quiz->media_type }}</div>--}}
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


                </div>
                @if(isset($score))
                    <div
                        class="flex justify-center mt-3 bg-gradient-to-r from-green-200 to-green-200 w-fit p-3 border-r-3 rounded font-semibold mx-auto">
                        You have already attempted this quiz and scored {{$score}} marks
                    </div>
                @elseif ($quiz->valid_from > now())
                    <div
                        class="flex justify-center mt-3 bg-gradient-to-r from-yellow-200 to-yellow-200 w-fit p-3 border-r-3 rounded font-semibold mx-auto">
                        Quiz Has Not Started Yet
                    </div>

                @elseif ($quiz->valid_upto < now())
                    <div
                        class="flex justify-center mt-3 text-white bg-gradient-to-r from-red-400 to-red-600 w-fit p-3 border-r-3 rounded font-semibold mx-auto">
                        Quiz Has Ended
                    </div>
                @else
                    <div class="flex justify-center mt-3">
                        <button x-on:click="showQuizAttemptConfirmModal = true"
                                class="flex justify-center mt-3 text-white bg-gradient-to-r from-green-600 to-green-700
                            w-fit p-2 px-6 border-r-3 rounded font-semibold text-xl mx-auto">

                            Attempt Quiz
                        </button>
                    </div>
                @endif

            </div>
        </div>

        @if( $quiz->valid_from < now() && $quiz->valid_upto > now() )
            <div x-show="showQuizAttemptConfirmModal" x-cloak
                 class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg p-4 max-w-md mx-auto">
                    <form action="{{route('attempt-quiz' , [
                    'moduleId' => $module->id,
                    'quizSlug' => $quiz->slug,
    ])}}">
                        <h2 class=" text-xl font-semibold">Confirm Quiz Start</h2>
                        <p>Are you sure you want to start the quiz attempt?</p>
                        <div class="mt-4 flex justify-end space-x-4">
                            <button @click="showQuizAttemptConfirmModal = false" type="reset"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none">
                                Confirm
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        @endif

    </div>
</x-sidebar>
