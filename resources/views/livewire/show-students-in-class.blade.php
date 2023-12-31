<div>
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

    <div>
        <div class="flex justify-between">
            <div class="flex ml-5">
                <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
                    Students in Class
                </h2>
                <div class="ml-5">
                    <label>
                        <input wire:model="q" type="search" placeholder="Search" name="student_search"
                               class="block w-full py-2.5 rounded focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-400"
                               required>
                    </label>
                </div>
            </div>
            <div class="mr-10">
                <a href="{{route('add-students-to-class', [ $class_id ])}}">
                    <x-button>
                        {{ __('Add Students') }}
                    </x-button>
                </a>
            </div>
        </div>
    </div>


    <div class=""
         x-data="{ showConfirmDeleteModal : false , confirmDeleteModalData: { name: '', student_id: '', id: ''}}">
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
            <tr>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Student Id
                </th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Student Name
                </th>
                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @if($students->count() == 0)
                <tr class="text-gray-500">
                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No
                        results found
                    </td>
                </tr>
            @else
                @foreach($students as $student)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $student->student_id }}</td>
                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $student->name }}</td>
                        <td>
                            <div class="ml-2">
                                <button
                                    x-on:click="showConfirmDeleteModal = true; confirmDeleteModalData.name = '{{ $student->name }}'; confirmDeleteModalData.student_id='{{ $student->student_id }}'; confirmDeleteModalData.id='{{ $student->id }}' "
                                    wire:loading.attr="disabled"
                                    class="bg-red-800 border border-transparent hover:bg-red-600 focus:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove
                                </button>
                            </div>
                        </td>
                    </tr>

                @endforeach


            </tbody>
        </table>
        <div class="mt-4">
            {{ $students->links() }}
        </div>
        @endif

        <div x-show="showConfirmDeleteModal" x-cloak
             class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
            <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg p-4 max-w-md mx-auto">
                <h2 class="text-xl font-semibold">Remove Student From Class ?</h2>
                <p class="font-medium">Are you sure you want to remove this student from the class?</p>
                <div class="mt-2"></div>
                <p class="font-medium">Student Name: <span class="text-gray-700"
                                                           x-text="confirmDeleteModalData.name"></span></p>
                <p class="font-medium">Student Id: <span class="text-gray-700"
                                                         x-text="confirmDeleteModalData.student_id"></span></p>


                <div class="mt-4 flex justify-end space-x-4">
                    <button type="reset"
                            x-on:click="showConfirmDeleteModal = false; confirmDeleteModalData = { name: '', student_id: '', id: ''}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                        Cancel
                    </button>

                    {{-- IDEs would show a error for the below x-on:click, but does work --}}
                    <button
                        x-on:click="
                            @this.removeStudentFromClass(confirmDeleteModalData.id);
                            showConfirmDeleteModal = false;
                            confirmDeleteModalData = { name: '', student_id: '' , id: ''};
                        "
                        wire:loading.attr="disabled"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none">
                        Confirm
                    </button>
                </div>
            </div>
        </div>

        {{--            <div wire:model="showConfirmDeleteModal" class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">--}}
        {{--                <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">--}}
        {{--                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>--}}
        {{--                </div>--}}
        {{--                <div class="bg-white rounded-lg p-4 max-w-md mx-auto">--}}
        {{--                    <h2 class="text-xl font-semibold">Remove Student From Class ?</h2>--}}
        {{--                    <p>Are you sure you want to remove the student?</p>--}}
        {{--                    <div class="mt-4 flex justify-end space-x-4">--}}
        {{--                        <button wire:click="closeDeleteModal" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">--}}
        {{--                            Cancel--}}
        {{--                        </button>--}}
        {{--                        <button @click="document.querySelector('#userForm').submit();" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none">--}}
        {{--                            Confirm--}}
        {{--                        </button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}


    </div>

</div>
