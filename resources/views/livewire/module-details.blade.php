<x-sidebar>
    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
        {{ $module->Module_name }}
    </h2>
    <div class="mt-10 ml-10">


        <a href={{ route('assignments', [$module->id]) }}>
            <x-secondary-button
                class=" border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                {{ __('Add Assignment') }}
            </x-secondary-button>
        </a>

    </div>
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
            <tr>
                {{-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Module ID</th> --}}
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignment Name</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                    Assignement Description</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Deadline</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Start Date</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Assignment File</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                    Submittion File Type</th>
                <th
                    class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
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
                    <tr class="text-gray-500">
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
                                <x-danger-button wire:click="confirmassignmentDeletion({{ $assignment->id }})"
                                    wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                            <div class="mt-5">
                                <x-secondary-button wire:click="confirmModuleUpdate({{ $assignment->id }})"
                                    wire:loading.attr="disabled"
                                    class=" bg-amber-600  border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                                    {{ __('Update') }}
                                </x-secondary-button>
                            </div>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</x-sidebar>
