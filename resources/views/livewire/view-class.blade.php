<div>
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
        <tr>
            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Class Id</th>
            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Class Name</th>
            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($classes as $class)
            <tr class="text-gray-500">
                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $class->id }}</td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $class->class_name }}</td>
                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">
                    <div class=" mr-2 mt-5">
                        <x-danger-button wire:click="confirmClassDeletion({{$class->id}})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </div>
                    <div class="mt-5">
                        <x-danger-button wire:click="confirmClassUpdate({{$class->id}})" wire:loading.attr="disabled" class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                            {{ __('Update') }}
                        </x-danger-button>
                    </div>
                    <div class="mt-5 ml-2">
                        <a href={{route('view-class', [$class->id])}}>
                            <x-danger-button class=" bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                                {{ __('View') }}
                            </x-danger-button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
