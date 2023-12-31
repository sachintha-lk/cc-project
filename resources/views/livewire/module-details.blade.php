<div>
    @php
        use Illuminate\Support\Str;
    @endphp

@if(session()->has('message'))
    <div class="flex items-center rounded-lg mb-6 m-4 bg-green-500 text-white text-sm  font-bold px-4 py-3 relative" role="alert" x-data="{ show: true }" x-show="show">
       <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
       </svg>
       <p>{{ session('message') }}</p>
       <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
          <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
             <title>Close</title>
             <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
          </svg>
       </span>
    </div>
    <script>
       setTimeout(function() {
          document.querySelector('[x-data="{ show: true }"]').remove();
       },1500); // 5000 milliseconds = 5 seconds
    </script>
    @endif

    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
        {{ $module->Module_name }}
    </h2>
    <div class="mt-3 ml-10">
        <h3 class="font-semibold text-lg mb-2">Assignments</h3>


        <a href={{ route('assignments', [$module->id]) }}>
            <x-secondary-button
                class=" border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300  focus:ring-blue-500 ">
                {{ __('Add Assignment') }}
            </x-secondary-button>
        </a>

    </div>
    <table class="items-center ml-8 w-full  mt-5 rounded-xl bg-transparent border-collapse">
        <thead class="rounded">
            <tr class="rounded ">
                {{-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Module ID</th> --}}
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Name</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignement Description</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Deadline</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Start Date</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Assignment File</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Submittion File Type</th>
                <th
                    class="px-4 bg-gray-200  text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @if ($assignments->count() == 0)
                <tr class="text-gray-500">
                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No
                        results found</td>
                </tr>
            @else
                @foreach ($assignments as $assignment)
                    <tr class="text-gray-500 bg-blue-200">
                        {{-- <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{  $module->id }}</td> --}}
                        <td
                            class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                            {{ $assignment->assignment_name }}</td>
                        <td
                            class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                            {{ $assignment->assignment_description }}</td>
                        <td
                            class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                            {{ $assignment->deadline }}</td>

                        <td
                            class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                            {{ $assignment->start_date }}</td>
                        <td
                            class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                            @if ($assignment->assignment_file)
                                <a href="{{ asset('storage/assignments/' . $assignment->assignment_file) }}" target="_blank">
                                    Download Assignment File
                                </a>
                            @else
                                No File Attached
                            @endif
                        </td>

                        <td
                            class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                            {{ $assignment->assignment_type }}</td>

                        <td
                            class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">
                            <div class=" mr-2 mt-5">
                                <x-danger-button wire:click="ConfirmAssignmentDeleted({{ $assignment->id }})"
                                    wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
{{--                            <div class="mt-5">--}}
{{--                                <x-secondary-button wire:click="confirmModuleUpdate({{ $assignment->id }})"--}}
{{--                                    wire:loading.attr="disabled"--}}
{{--                                    class=" bg-gray-50  border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-100 active:bg-gray-200  focus:ring-blue-500 ">--}}
{{--                                    {{ __('Update') }}--}}
{{--                                </x-secondary-button>--}}
{{--                            </div>--}}
                            <div class="mt-5 ml-2">
                                <a href={{route('show-submission',[$module->id, $assignment->id]) }}>
                                    <x-secondary-button
                                        class="  bg-gray-50 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-100 active:bg-gray-200  focus:ring-blue-500 ">
                                        {{ __('View') }}
                                    </x-secondary-button>
                                </a>
                            </div>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


    <div class=" mb-2 ml-8 mt-5">
    <h1 class="font-semibold text-lg ml-2">Quiz Leaderboard</h1>

    @if(isset($leaderboardStudents))

        <table class="table-auto  mt-5 ">
            <thead>
            <tr >
                <th class="px-4 py-2  bg-gray-200  text-gray-700 align-middle  text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Place</th>
                <th class="px-4 py-2  bg-gray-200  text-gray-700 align-middle  text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Name</th>
                <th class="px-4 py-2  bg-gray-200  text-gray-700 align-middle  text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Total Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaderboardStudents as  $student)
                <tr class="text-gray-500 bg-blue-200">
                    <td class="border px-4 py-2">
                        {{ $loop->iteration }}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $student->student->name }}

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
    </div>
        <div class="mt-5 ml-6">
            <h3 class="font-semibold text-lg mb-2 ml-4">Quizes</h3>

            <a href={{ route('create-quiz', [$module->id]) }}>
                <x-secondary-button
                    class=" border-2 rounded-md ml-4 font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:ring-blue-500 ">
                    {{ __('Add Quiz') }}
                </x-secondary-button>
            </a>
            <table class="items-center w-full mt-5  ml-2 bg-transparent border-collapse">
                <thead>

                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Quiz Name</th>
                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Valid From time</th>
                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Valid Upto time</th>
                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Publish status</th>

                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Action</th>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @if ($quizzes->count() == 0)
                        <tr class="text-gray-500">
                            <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                No results found</td>
                        </tr>
                    @else
                        @foreach ($quizzes as $quiz)
                            <tr class="text-gray-500  bg-blue-200">
                                <td
                                    class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                                    {{ $quiz->name }}</td>
                                <td
                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{

                                           date('D, d M Y H:i:s', strtotime($quiz->valid_from))

                                    }}
                                </td>

                                <td
                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{

                                           date('D, d M Y H:i:s', strtotime($quiz->valid_upto))
                                    }}
                                </td>

                                    @if ($quiz->is_published)
                                    <td
                                        class="text-green-600 border-t-0 px-4 align-middle text-xs font-semibold whitespace-nowrap p-4">
                                        Published
                                    </td>
                                    @else
                                    <td
                                        class="text-red-500 border-t-0 px-4 align-middle text-xs font-semibold whitespace-nowrap p-4">
                                        Not Published
                                    </td>
                                    @endif


                                <td
                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">

                                    <div class="mt-5 ml-2">

                                            <a href={{ route('manage-quiz-view',[$module->id, $quiz->slug]) }}>
                                            <x-secondary-button
                                                class=" bg-blue-600 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700  focus:ring-blue-500 ">
                                                {{ __('View') }}
                                            </x-secondary-button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>

        <div class= "mt-3 ml-6" >
            <h3 class="font-semibold text-lg mb-2 ml-4">Resources</h3>

            <a href={{ route('add-new-resources', [$module->id]) }}>
                <x-secondary-button
                    class=" ml-5 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300  focus:ring-blue-500 ">
                    {{ __('Add Resource') }}
                </x-secondary-button>
            </a>
            <table  class="items-center w-full mt-5 ml-2 bg-transparent border-collapse">
                <thead>
                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Resource Name</th>

                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Resource</th>

                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Resource Type</th>

                <th
                    class="px-4 bg-gray-200 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Action</th>

                </thead>
                <tbody class="divide-y divide-gray-100" >

                @if ($resources->count() == 0)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap  text-left">
                            No results found</td>
                    </tr>
                @else
                    @foreach ($resources as $resource)
                        <tr class="text-gray-500  bg-blue-200">
                            <td
                                class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap  text-left">
                                 {{ Str::limit($resource->name, $limit = 20, $end = '...') }}
                                </td>

                            @if($resource->type == "file")
                                <td
                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap ">
                                    @if ($resource->resource)
                                        <a href="{{ asset('storage/resources/' . $resource->resource) }}" target="_blank">
                                            Download Resource File
                                        </a>
                                    @else
                                        No File Attached
                                    @endif
                                </td>
                            @elseif($resource->type == "link")

                            <td
                                class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap">
                                <a href="{{ $resource->resource }}" target="_blank">
                                    {{ $resource->resource }}
                                </a>
                            </td>
                            @else
                                <td
                                    class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap">

                                    {{ Str::limit($resource->resource, $limit = 20, $end = '...') }}

                                </td>



                            @endif

                            <td
                                class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                {{ $resource->type }}
                            </td>

                            <td
                                class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">

                                <div class="mt-5 ml-2">
                                    <div class=" mr-2 mt-5">
                                        <x-danger-button wire:click="ConfirmResourceDeletion({{ $resource->id }})"
                                                         wire:loading.attr="disabled">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </div>

                                    <a href={{ route('edit-resource',[$module->id, $resource->id]) }}>
                                        <x-secondary-button
                                            class=" bg-gray-50 mt-1 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-100 active:bg-gray-200  focus:ring-blue-500">
                                            {{ __('Edit') }}
                                        </x-secondary-button>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>





    <x-dialog-modal wire:model="confirmingAssignmentDeletion">
        <x-slot name="title">
            {{ __('Delete Assignment') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete the assignment?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingAssignmentDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="DeleteAssignment({{$confirmingAssignmentDeletion}})" wire:loading.attr="disabled">
                {{ __('Delete Assignment') }}
            </x-danger-button>
        </x-slot>
</x-dialog-modal>

        <x-dialog-modal wire:model="confirmingResourceDeletion">
            <x-slot name="title">
                {{ __('Delete Resource') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete the resource?') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('confirmingResourceDeletion', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="DeleteResource({{$confirmingResourceDeletion}})" wire:loading.attr="disabled">
                    {{ __('Delete Resource') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>


</div>
