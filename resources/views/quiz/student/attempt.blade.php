<x-app-layout>
    <div class="bg-gradient-to-r from-blue-500 via-blue-200 to-blue-500">
        <div>
            <div class="text-center px-4 pt-1 pb-0 mb-0 text-lg font-normal text-gray-800">Quiz Attempt</div>
            <h2 class="text-center px-4 pt-0 pb-0 mb-0 text-lg font-normal text-gray-800">{{ $module->Module_name }}
                : {{ $module->Module_code }}</h2>
            <h3 class=" text-center p-4 pt-1 text-3xl font-bold text-gray-800 mb-1">{{ $quiz->name }}</h3>
            <div class="text-center">
                End Time:
                <livewire:countdown-timer :time="$quiz->valid_upto" :key="$quiz->id"/>
            </div>
        </div>



    </div>

    <form id="quiz-form" action="{{route('submit-quiz',
    ['quizSlug' => $quiz->slug, 'moduleId' => $module->id])}}"
          method="POST">
        @csrf
        <div class="mx-4 mt-3 pl-5 pb-4 text-left ">
            @foreach($formattedQuestions as $index => $question)
                <div class="mt-8">
                    <div class="p-4 pt-1 pb-0 text-2xl font-bold text-gray-800 mb-1">
                        {{ $index + 1 }}).
                        {{ $question['question'] }}</div>
                    <p class="font-medium pt-0 text-sm text-gray-700">Marks: {{ $question['marks'] }}</p>

                    <div class="grid grid-cols-1 w-fit">
                        {{-- @dump($question['options']) --}}
                        @foreach($question['options'] as $option)
                            <div class="">
                                <div class="text-left">
                                    <input type="radio" id="{{$option['id']}}" name="{{$question['id']}}"
                                           value="{{ $option['id'] }}">

                                    <label for="{{$option['id']}}"
                                           class="p-4 text-lg font-semibold text-gray-800 mb-1">{{ $option['name'] }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--                <div class="text-left p-4 pt-1 text-2xl font-bold text-gray-800 mb-1">{{ $question['answer'] }}</div>--}}
                </div>
            @endforeach

            <div class="mt-8">
                <button type="submit"
                        class=" ml-4 mt-3 text-white bg-gradient-to-r from-green-600 to-green-700
                            w-fit p-2 px-6 border-r-3 rounded font-semibold text-xl mx-auto">
                    Submit Quiz
                </button>
            </div>
        </div>

    </form>
</x-app-layout>
