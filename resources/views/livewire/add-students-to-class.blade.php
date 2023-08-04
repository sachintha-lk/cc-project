<div class="flex content-center m-5 gap-3">
    <div class="md:w-1/2">
        <div class="flex">
            <h2 class="font-bold text-xl text-gray-700">Select Students to add to the class</h2>

        </div>
        <div>
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                <tr>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Id</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Name</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Email</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($students as $student)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $student->student_id }}</td>
                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $student->name }}</td>
                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1">{{ $student->email }}</td>
-
                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap py-1 flex">
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
{{--                                    // select btn with wire:click=selectstudent and pass the id--}}
                                <x-danger-button wire:click="selectStudent({{$student->id}})" wire:loading.attr="disabled" class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                                    {{ __('Select') }}
                                </x-danger-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $students->links() }}
            </div>

        </div>

    </div>
    <div class="md:w-1/3">

        <div class="flex">
            <h2 class="font-bold text-xl text-gray-700">Selected Students</h2>
            <x-danger-button wire:click="addStudentsToClass" wire:loading.attr="disabled" class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                {{ __('Add Students') }}
            </x-danger-button>
            <x-danger-button class="bg-amber-500 border border-transparent rounded-md text-xs text-white  tracking-widest">
                {{ __('Clear Selected Students') }}
            </x-danger-button>

    </div>
</div>
</div>
