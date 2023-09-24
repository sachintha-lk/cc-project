<div>
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



    <div class="mt-4">
        <span class="text-lg  underline-offset-2 ml-4 text-gray-900">Submission Status</span>

        @if ($assignment->submissions->count() > 0)
            <span class="text-sm font-semibold text-green-500 ml-2">Submitted</span>
        @else
            <span class="text-sm font-semibold text-red-500 ml-2">Not Submitted</span>
        @endif

    </div>
    <div class="mt-4">

        <span class="text-lg underline-offset-2 ml-4 text-gray-900">Grading Status</span>
        @if ($assignment->submissions->count() > 0)

        @if ($assignment->submissions->first()->submissionGrade)
            <span class="text-sm font-semibold text-green-500 ml-2">Graded</span>
            <br/>
            <span class="text-sm font-semibold text-black  ml-4">Grade: {{ $assignment->submissions->first()->submissionGrade->grade }}</span>
            <br/>

            <span class="text-sm font-semibold   ml-4"> Graded By: {{ $assignment->submissions->first()->submissionGrade->gradedBy->name }}</span>

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
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
            <tr>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Start Date</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Deadline</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Submit File</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <tr class="text-gray-500">
                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                    {{ $assignment->start_date }}</td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                    {{ $assignment->deadline }}</td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                    {{-- @dd($submissions) --}}

                    @if (isset($submissions->file_submission))
                        <a href="{{ asset('storage/submissions/' . $submissions->file_submission) }}"
                            class="text-blue-500 hover:underline" target="_blank">View Submitted File</a>
                    @else
                        <form wire:submit.prevent="submitFile">
                            <input type="file" wire:model="fileToSubmit" class="mr-2">
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                        </form>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
