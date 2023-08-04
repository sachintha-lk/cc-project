
<div>


    <div>
        <div class="flex justify-between">

            <div class="flex ml-5">

                <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
                    Students in Class
                </h2>

                <div class="ml-5">
                    <label>
                        <input w wire:model="q" type="search"  placeholder="Search" name="student_search" class="block w-full py-2.5 rounded focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-400" required>
                    </label>

                    {{--                                <button class="relative z-[2] flex items-center rounded-r bg-yellow-800 px-5 py-2 text-xs font-medium uppercase text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"--}}
                    {{--                        type="submit">--}}
                    {{--                    <svg xmlns="http://www.w3.org/2000/svg"--}}
                    {{--                         viewBox="0 0 20 20"--}}
                    {{--                         fill="currentColor"--}}
                    {{--                         class="h-5 w-5">--}}
                    {{--                        <path--}}
                    {{--                            fill-rule="evenodd"--}}
                    {{--                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"--}}
                    {{--                            clip-rule="evenodd" />--}}
                    {{--                    </svg>--}}
                    {{--                </button>--}}

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
            @foreach($students as $student)
                <tr class="text-gray-500">
                    <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $student->student_id }}</td>
                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $student->name }}</td>
                    {{--                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">--}}
                    {{--                        <div class=" mr-2 mt-5">--}}
                    {{--                            <x-danger-button wire:click="confirmClassDeletion({{$class->id}})" wire:loading.attr="disabled">--}}
                    {{--                                {{ __('Delete') }}--}}
                    {{--                            </x-danger-button>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="mt-5">--}}
                    {{--                            <x-danger-button wire:click="confirmClassUpdate({{$class->id}})" wire:loading.attr="disabled" class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">--}}
                    {{--                                {{ __('Update') }}--}}
                    {{--                            </x-danger-button>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="mt-5 ml-2">--}}
                    {{--                            <a href={{route('view-class', [$class->id])}}>--}}
                    {{--                                <x-danger-button class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">--}}
                    {{--                                    {{ __('View') }}--}}
                    {{--                                </x-danger-button>--}}
                    {{--                            </a>--}}
                    {{--                        </div>--}}
                    {{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $students->links() }}
        </div>



    </div>

</div>
