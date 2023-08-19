<div class="flex items-center justify-center m-5 gap-3">
    <div class="md:w-1/2">
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('errormsg'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6 ">
                {{ session('errormsg') }}
            </div>
        @endif

        <div class="m-3">
            <h2 class="font-semibold text-xl text-gray-700 mb-3">Select Students to add to the class {{ $class_name }}</h2>
            <input w wire:model="q" type="search"  placeholder="Search" name="student_search" class="block w-1/3 py-2.5 rounded focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-400" required>
        </div>
        <div class="m-3">
            <p class="text-red-500">Note: Only students with no class have been listed</p>
        </div>
        <div>
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                <tr>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Id</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Name</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Email</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @if ($students->count() == 0)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-1 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No results found</td>
                    </tr>
                @else

                @foreach($students as $student)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-1 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $student->student_id }}</td>
                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $student->name }}</td>
                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $student->email }}</td>
                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1 flex">
{{--                            <div class=" mr-2 mt-5">--}}
{{--                                <x-danger-button wire:click="confirmClassDeletion({{$class->id}})" wire:loading.attr="disabled">--}}
{{--                                    {{ __('Delete') }}--}}
{{--                                </x-danger-button>--}}
{{--                            </div>--}}
{{--                            <div class="mt-5">--}}
{{--                                <x-danger-button wire:click="confirmClassUpdate({{$class->id}})" wire:loading.attr="disabled" class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">--}}
{{--                                    {{ __('Update') }}--}}
{{--                                </x-danger-button>--}}
{{--                            </div>--}}
                            <div class="ml-2">
                                <button wire:click="selectStudent({{$student->id}})" wire:loading.attr="disabled" class="bg-yellow-800 border border-transparent hover:bg-yellow-600 focus:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        Select
                                </button>

                            </div>

                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            <div class="mt-4">
                {{ $students->links() }}
            </div>

        </div>

    </div>
    <div class="md:w-1/3">


        <h2 class="font-semibold text-xl text-gray-700">Selected Students</h2>

        <div class="flex gap-2 my-4">
            <button wire:click="addSelectedStudentsToClass" wire:loading.attr="disabled" class="bg-yellow-800 border border-transparent  hover:bg-yellow-500 focus:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Add Selected Students to Class
            </button>

            <button wire:click="clearSelectedStudents" wire:loading.attr="disabled" class="bg-red-600 border border-transparent  hover:bg-red-500 focus:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Clear Selected Students
            </button>
        </div>





        <div>
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                <tr>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Id</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Name</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Email</th>
                    <th class="px-1 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Remove</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @if ($selectedStudents->count() == 0)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-1 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No students selected</td>
                    </tr>
                @else
                @foreach($selectedStudents as $selectedStudent)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-1 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $selectedStudent->student_id }}</td>
                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $selectedStudent->name }}</td>
                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $selectedStudent->email }}</td>

                        <td class="border-t-0 px-1 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1 flex">

                            <div class="ml-2">
                                <button  wire:click="removeFromSelectedStudents({{ $selectedStudent->id }})" wire:loading.attr="disabled" class="bg-red-600 border border-transparent  hover:bg-red-500 focus:bg-red-700 text-white font-bold py-2 px-4 rounded">Unselect</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endif

                </tbody>

            </table>
        </div>

    </div>
</div>

