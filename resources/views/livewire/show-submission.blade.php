<div>
    <h2 class="font-bold text-xl text-gray-800 leading-tight mb-4 ml-4">Submission Files</h2>

    <table class="w-full border-collapse bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                
                <th class="border bg-gray-100 p-2">Student ID</th>
                <th class="border bg-gray-100 p-2">Student Name</th>
                <th class="border bg-gray-100 p-2">Assignment Name</th>
                <th class="border bg-gray-100 p-2">File Submission</th>
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
                    <td class="border p-2">{{ $submission->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

