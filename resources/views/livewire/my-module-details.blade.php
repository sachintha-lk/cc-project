<div class="bg-white rounded shadow p-6">
    <h2 class="font-bold text-xl text-gray-800 leading-tight mb-4">
        {{ $module->Module_name }}
    </h2>

     <h1 class="font-bold border-2 rounded h-8 w text-lg underline text-gray-800 mb-2 ">Assignments</h1>

    <div >

        @foreach ($assignments as $assignment)
        <div class="flex items-center mt-4">
            <a href="{{route('assignment-submission', [$module->id, $assignment->id])}}" class="text-amber-950 flex space- ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#d27c2c" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h4.2q.325-.9 1.088-1.45T12 1q.95 0 1.713.55T14.8 3H19q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm2-4h7v-2H7v2Zm0-4h10v-2H7v2Zm0-4h10V7H7v2Zm5-4.75q.325 0 .537-.213t.213-.537q0-.325-.213-.537T12 2.75q-.325 0-.537.213t-.213.537q0 .325.213.537T12 4.25Z"/></svg>
                <span class="text-lg font-semibold underline-offset-2 ml-2 text-gray-900">{{ $assignment->assignment_name }}</span>
            </a>

            @if ($assignment->submissions)
                <span class="text-sm font-semibold text-green-500 ml-2">Submitted</span>
            @else
                <span class="text-sm font-semibold text-red-500 ml-2">Not Submitted</span>
            @endif

            @if ($assignment->submissions->first()->submissionGrade)
                <span class="text-sm font-semibold text-green-500 ml-2">Graded</span>
            @endif
        </div>
        {{-- <div>
            <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}" class="text-blue-500  ml-2">{{ $assignment->assignment_name }}</a>
        </div> --}}
        @endforeach
    </div>

    <h1 class="mt-5 font-bold border-2 rounded h-8 w text-lg underline text-gray-800 mb-2 ">Quizzes</h1>
    @if(isset($quizzes))
    @foreach ($quizzes as $quiz)
        <div class="flex items-center mt-4">
            <a href="{{route('student-quiz-view', [$module->id, $quiz->slug])}}" class="text-amber-950 flex space- ">
                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>

                <span class="text-lg font-semibold underline-offset-2 ml-2 text-gray-900">{{ $quiz->name }}</span>
            </a>
        </div>
        {{-- <div>
            <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}" class="text-blue-500  ml-2">{{ $assignment->assignment_name }}</a>
        </div> --}}
    @endforeach
    @endif
</div>

