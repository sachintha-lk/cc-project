<div>
    <h2 class="font-bold text-xl text-gray-800 leading-tight mb-4 ml-4">Submission Files</h2>

    <table class="w-full border-collapse bg-white rounded-lg shadow-md">
        <thead>
            <tr>

                <th class="border bg-gray-100 p-2">Student ID</th>
                <th class="border bg-gray-100 p-2">Student Name</th>
                <th class="border bg-gray-100 p-2">Assignment Name</th>
                <th class="border bg-gray-100 p-2">File Submission</th>
                <th class="border bg-gray-100 p-2">Grading Status</th>
                <th class="border bg-gray-100 p-2">Graded At</th>
                <th class="border bg-gray-100 p-2">Grade</th>
                <th class="border bg-gray-100 p-2">Graded By</th>
                <th class="border bg-gray-100 p-2">Grade</th>
                <th class="border bg-gray-100 p-2">Comment</th>
                <th class="border bg-gray-100 p-2">Action</th>

                <th class="border bg-gray-100 p-2">Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($submissions as $submission)
                <tr>

                    <td class="border p-2">{{ $submission->student->id }}</td>
                    <td class="border p-2">{{ $submission->student->name }}</td>
                    <td class="border p-2">{{ $submission->assignment->assignment_name }}</td>
                    <td class="border p-2">
                        <a href="{{ asset('storage/submissions/' . $submission->file_submission) }}" class="text-blue-500 hover:underline" target="_blank">
                            View File
                        </a>
                    </td>

                    <td class="border p-2">
                      {{  $submission->submissionGrade ? 'Graded' : 'Not Graded'}}
                    </td>
                    <td class="border p-2">{{ $submission->submissionGrade ? $submission->submissionGrade->created_at->format('Y-m-d H:i:s') : '' }}</td>
                    <td class="border p-2">{{ $submission->submissionGrade ? $submission->submissionGrade->grade : '' }}</td>
                    <td class="border p-2">

                        @if ($submission->submissionGrade)
                            @if ($submission->submissionGrade->graded_by == auth()->user()->id)
                                You
                            @else
                            {{ $submission->submissionGrade->gradedBy->name }}
                            @endif
                        @endif
                    </td>
                    <td class="border p-2">{{ $submission->submissionGrade ? $submission->submissionGrade->grade : '' }}</td>
                    <td class="border p-2">{{ $submission->submissionGrade ? $submission->submissionGrade->comment : '' }}</td>
                    <td class="border p-2">

                        @if (!$submission->submissionGrade)
                            <button wire:click="confirmShowGradingModal({{ $submission->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Grade
                            </button>
                        @else
                            <button wire:click="confirmShowGradingModal({{ $submission->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </button>
                        @endif
                    </td>



                    <td class="border p-2">{{ $submission->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <livewire:submission-grading-form />
</div>

