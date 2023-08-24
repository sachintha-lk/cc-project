<div class="bg-white rounded shadow p-6">
    <h2 class="font-bold text-xl text-gray-800 leading-tight mb-4">
        {{ $module->Module_name }}
    </h2>

     <h1 class="font-bold border-2 rounded h-8 w text-lg underline text-gray-800 mb-2 ">Assignments</h1>

    <div >
       
        @foreach ($assignments as $assignment)
        <div class="flex items-center mt-4">
            <a href="{{route('')}}" class="text-amber-950 flex space- ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#d27c2c" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h4.2q.325-.9 1.088-1.45T12 1q.95 0 1.713.55T14.8 3H19q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm2-4h7v-2H7v2Zm0-4h10v-2H7v2Zm0-4h10V7H7v2Zm5-4.75q.325 0 .537-.213t.213-.537q0-.325-.213-.537T12 2.75q-.325 0-.537.213t-.213.537q0 .325.213.537T12 4.25Z"/></svg>
                <span class="text-lg font-semibold underline-offset-2 ml-2 text-gray-900">{{ $assignment->assignment_name }}</span>
            </a>
        </div>
        {{-- <div>
            <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}" class="text-blue-500  ml-2">{{ $assignment->assignment_name }}</a> 
        </div> --}}
        @endforeach
    </div>
</div>

