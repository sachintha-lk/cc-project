
    <div>


        <div>
            <div class="flex justify-between">

                <div class="flex ml-5">

                    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
                        Students in Class
                    </h2>

                    <div class="ml-5">
                        <label>
                            <input wire:model="q" type="search"  placeholder="Search" name="student_search" class="block w-full py-2.5 rounded focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-400" required>
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


        <div class="">
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                <tr>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Id</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Student Name</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @if($students->count() == 0)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No results found</td>
                    </tr>
                @else
                @foreach($students as $student)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $student->student_id }}</td>
                        <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $student->name }}</td>
                        <td>
                        <div class="ml-2">
                                <button wire:click="removeStudent({{$student->id}})" wire:loading.attr="disabled" class="bg-red-800 border border-transparent hover:bg-red-600 focus:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove
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
