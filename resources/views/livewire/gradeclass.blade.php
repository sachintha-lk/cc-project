
<div>
    <h2 class="font-bold text-xl p-4 ml-10 text-gray-800 leading-tight">
        {{ $grade->name }}
    </h2>



    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
        <div class="max-w-2xl mx-auto">
           <form class="flex items-center">
              <label for="simple-search" class="sr-only">Search</label>
              <div class="relative w-full">
                 <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                 </div>
                 <input wire:model="q" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Search" required>
              </div>
              <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-yellow-700 rounded-lg border border-yellow-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:hover:bg-yellow-600 dark:focus:ring-yellow-800">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                 </svg>
              </button>
           </form>
        </div>
        <div class="mt-8 text-2xl flex justify-between">
           <div>
              <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Classes</h3>
           </div>
           <div class="mr-2">
              <x-button wire:click="confirmClassAdd">
                 {{ __('Add Classes') }}
             </x-button>
           </div>

        </div>

        <div class="block w-full overflow-x-auto mt-2">
           <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                 <tr>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Class Id</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Class Name</th>
                    <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                 </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                @if ($classes->count() == 0)
                    <tr class="text-gray-500">
                        <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No results found</td>
                    </tr>
                @else
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
                @endif
              </tbody>
           </table>
        </div>
        <div class="mt-4">
           {{ $classes->links() }}
        </div>
        {{-- <x-dialog-modal wire:model="confirmingClassDeletion">
            <x-slot name="title">
                {{ __('Delete Class') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete the class?') }}
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('confirmingClassDeletion', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteClass({{$confirmingClassDeletion}})" wire:loading.attr="disabled">
                    {{ __('Delete Class') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal> --}}


        <x-dialog-modal wire:model="confirmingClassAdd">
            <x-slot name="title">
                {{ isset($this->gclass->id) ?'Update classes' : 'Add classes' }}
            </x-slot>

            <x-slot name="content">
               <div class="col-span-6 sm:col-span-4">
                  <x-label for="name" value="{{ __('Class Name') }}" />
                  <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="gclass.class_name" />
                  <x-input-error for="gclass.class_name" class="mt-2" />
               </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('confirmingClassAdd', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="saveclass()" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-danger-button>
            </x-slot>
            </x-dialog-modal>
     </div>
</div>
