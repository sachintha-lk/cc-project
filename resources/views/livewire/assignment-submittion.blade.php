<div>
    @if(session()->has('error'))

        <div class="bg-red-500 text-white p-4 rounded-lg mb-6 flex m-4 justify-between">
            <span class="block">{{ session('error') }}</span>
            <button @click="show = false" class="ml-4 text-xl font-medium text-white cursor-pointer">&times;</button>
        </div>
        <script>
            setTimeout(function() {
               document.querySelector('[x-data="{ show: true }"]').remove();
            },1500); // 5000 milliseconds = 5 seconds
         </script>
    @endif
    <div class="bg-blue-100 rounded px-4 py-1 mt-5 ml-10 mr-10">
        <h2 class="font-bold text-xl text-gray-800 leading-tight ml-4  mt-4 mb-4">
            {{ $assignment->assignment_name }}
        </h2>
        <div class="mt-4">
            <span class="text-lg  underline-offset-2 ml-4 text-gray-900">Assignment File:</span>
            <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}"
                class="text-blue-500  ml-2">{{ $assignment->assignment_file }} </a>
            <span> (Click to download)</span>
        </div>

        <div class="mt-4 flex">
            <span class="text-lg  underline-offset-2 ml-4 text-gray-900">Assignment Description:</span>
            <div class="ml-4">{{ $assignment->assignment_description }}</div>
        </div>

        <div class="mt-4">
            <span class="text-lg  underline-offset-2 ml-4 text-gray-900">File Type that should be submited:</span>
            <span class="ml-4">{{ $assignment->assignment_type }}</span>
        </div>

    </div>


    <div class="mt-4 bg-blue-300 rounded px-4 py-1 mt-5 ml-10 mr-10 ">
        <span class="text-lg text-bold underline-offset-2 ml-4 text-gray-900">Submission Status</span>

        @if ($assignment->submissions->count() > 0)
            <span class="text-sm font-semibold text-green-500 ml-2">Submitted</span>
        @else
            <span class="text-sm font-semibold text-red-500 ml-2">Not Submitted</span>
        @endif

    </div>
    <div class=" bg-blue-100 rounded px-4 py-1 mt-5 ml-10 mr-10">

        <span class="text-lg underline-offset-2 ml-4 text-gray-900">Grading Status</span>
        @if ($assignment->submissions->count() > 0)

            @if ($assignment->submissions->first()->submissionGrade)
                <span class="text-sm font-semibold text-green-500 ml-2">Graded</span>
                <br />
                <span class="text-sm font-bold mt-4 text-black  ml-4">Grade:
                    {{ $assignment->submissions->first()->submissionGrade->grade }}</span>
                <br />

                <span class="text-sm font-bold mt-4 ml-4"> Graded By:
                    {{ $assignment->submissions->first()->submissionGrade->gradedBy->name }}</span>

                <div class="text-sm font-bold ml-4 mt-3">
                    Comment
                </div>
                <span class="ml-4">
                    {{ $assignment->submissions->first()->submissionGrade->comment }}
                </span>
            @else
                <span class="text-sm font-semibold text-red-500 ml-4">Not Graded</span>
            @endif
        @endif

    </div>
    <table class="items-center w-full bg-transparent mr-20  ml-10 mt-5 border-collapse">
        <thead>
            <tr>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Start Date</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Deadline</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Submit File</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <tr class="text-gray-500 bg-blue-100">
                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                    {{ $assignment->start_date }}<br/>
                    {{ \Carbon\Carbon::parse($assignment->start_date)->diffForHumans() }}
                </td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                    {{ $assignment->deadline }}<br/>
                    {{ \Carbon\Carbon::parse($assignment->deadline)->diffForHumans() }}
                </td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                    {{-- @dd($submissions) --}}

                    @if (isset($submissions->file_submission))
                        <a href="{{ asset('storage/submissions/' . $submissions->file_submission) }}"
                            class="text-blue-500 hover:underline" target="_blank">View Submitted File</a>
                    @else
                        @if($assignment->start_date > now())
                            <span class="text-red-500">Assignment not yet started</span>
                        @elseif($assignment->deadline < now())
                            <span class="text-red-500">Assignment deadline passed can't submit now</span>
                        @elseif($assignment->start_date < now() && $assignment->deadline > now())
                        @error('fileToSubmit') <span class="text-red-500">{{ $message }}</span> @enderror
                        <form wire:submit.prevent="submitFile">
                            <input type="file" wire:model="fileToSubmit" class="mr-2">

                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                        </form>
                        @endif

                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
