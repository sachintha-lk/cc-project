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

            @if ($assignment->submissions->count() > 0)
                <span class="text-sm font-semibold text-green-500 ml-2">Submitted</span>
            @else
                <span class="text-sm font-semibold text-red-500 ml-2">Not Submitted</span>
            @endif

            @if ($assignment->submissions->count() > 0)
                @if ($assignment->submissions->first()->submissionGrade)
                    <span class="text-sm font-semibold text-green-500 ml-2">Graded</span>

                 @else
                <span class="text-sm font-semibold text-red-500 ml-2">Not Graded</span>
                    @endif
            @endif

        </div>
        {{-- <div>
            <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}" class="text-blue-500  ml-2">{{ $assignment->assignment_name }}</a>
        </div> --}}
        @endforeach
    </div>
    <h1 class="mt-5 font-bold border-2 rounded h-8 w text-lg underline text-gray-800 mb-2 ">Quiz Leaderboard</h1>

    @if(isset($leaderboardStudents))

        <table class="table-auto">
            <thead>
            <tr>
                <th class="px-4 py-2">Place</th>
                <th class="px-4 py-2">Student Name</th>
                <th class="px-4 py-2">Total Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaderboardStudents as  $student)
                <tr>
                    <td class="border px-4 py-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $student->student->name }}
                        @if($student->student->id == auth()->user()->id)
                            <span class="text-yellow-600"> (You)</span>
                        @endif

                        <div class="text-xl inline">
                        @if($loop->iteration == 1)
                            🥇
                        @elseif($loop->iteration == 2)
                            🥈
                        @elseif($loop->iteration == 3)
                            🥉
                        @endif
                        </div>

                    </td>
                    <td class="border px-4 py-2">{{ $student->total_score }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <p>No students have taken any quizzes yet</p>
    @endif

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

    <h1 class="mt-5 font-bold border-2 rounded h-8 w text-lg underline text-gray-800 mb-2 ">Course Resources</h1>

    @if(isset($resources))
    @foreach ($resources as $resource)
{{--        <div class="flex items-center mt-4">--}}
{{--            <a href="{{ asset('storage/course-resources/' . $resource->resource_file) }}" class="text-blue-500  ml-2">{{ $resource->resource_name }}</a>--}}
{{--        </div>--}}

        @if($resource->type == 'link')

            <div class="flex items-center mt-4">
                <a href="{{ $resource->resource }}" class="text-amber-950 flex space- ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.197 3.35462C16.8703 1.67483 19.4476 1.53865 20.9536 3.05046C22.4596 4.56228 22.3239 7.14956 20.6506 8.82935L18.2268 11.2626M10.0464 14C8.54044 12.4882 8.67609 9.90087 10.3494 8.22108L12.5 6.06212" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M13.9536 10C15.4596 11.5118 15.3239 14.0991 13.6506 15.7789L11.2268 18.2121L8.80299 20.6454C7.12969 22.3252 4.55237 22.4613 3.0464 20.9495C1.54043 19.4377 1.67609 16.8504 3.34939 15.1706L5.77323 12.7373" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <script xmlns=""/></svg>
                    <span class="text-lg font-semibold underline-offset-2 ml-2 text-gray-900">{{ $resource->name }}</span>
                </a>
            </div>
        @elseif($resource->type == 'file')
            <div class="flex items-center mt-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 3V7.4C13 7.96005 13 8.24008 13.109 8.45399C13.2049 8.64215 13.3578 8.79513 13.546 8.89101C13.7599 9 14.0399 9 14.6 9H19M13 3H8.2C7.07989 3 6.51984 3 6.09202 3.21799C5.71569 3.40973 5.40973 3.71569 5.21799 4.09202C5 4.51984 5 5.0799 5 6.2V13M13 3L19 9M19 9V13M3 13H21M6 19V17M10 21V17M14 21V17M18 19V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <script xmlns=""/></svg>
                <div class="flex items-center mt-4">
                    <a href="{{ asset('storage/course-resources/' . $resource->resource) }}" class="text-gray-900  ml-2">{{ $resource->name }}</a>
                </div>
            </div>

        @elseif($resource->type == 'text')

            <div class="items-center mt-4">
                    <h3 class="text-lg font-semibold underline-offset-2 ml-2 text-yellow-600">{{ $resource->name }}</h3>
                    <div class="text-sm font-medium">
                        {{ $resource->resource }}
                    </div>
            </div>

        @endif

    @endforeach
    @else
    <p>No resources available yet</p>
    @endif



</div>

