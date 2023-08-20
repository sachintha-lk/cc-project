<div>
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
                  <input wire:model="q" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-yellow-500 dark:focus:border-yellow-500" placeholder="Search" required>
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
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Modules') }}
                </h2>
            </div>
            <div class="mr-2">
               <x-button wire:click="confirmModuleAddition">
                  {{ __('Add Modules') }}
              </x-button>
            </div>
 
         </div>
 
         <div class="block w-full overflow-x-auto mt-2">
            <div class ='flex justify-between'>
                <div></div>
                <div class = 'mr-2'>
                    <input type="checkbox" class="mr-6  mt-2 leading-tight" wire:model="active" /> Common Modules Only ?
                </div>
            </div>
                <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                      <tr>
                          {{-- <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Module ID</th> --}}
                          <th
                              class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                              Module Name</th>
                          <th
                              class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">
                              Module Code</th>
                          <th
                              class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                              Teacher Name</th>
                          <th
                              class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                             Common or not</th>
                          <th
                              class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">
                          </th>
                      </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-100">
                      @if ($modules->count() == 0)
                          <tr class="text-gray-500">
                              <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">No
                                  results found</td>
                          </tr>
                      @else
                          @foreach ($modules as $module)
                              <tr class="text-gray-500">
                                  {{-- <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{  $module->id }}</td> --}}
                                  <td
                                      class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                                      {{ $module->Module_name }}</td>
                                  <td
                                      class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                      {{ $module->Module_code }}</td>
                                  <td
                                      class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                      {{ $module->teacher->name }}</td>

                                   <td
                                      class="border-t-0 px-4 align-middle text-sm font-medium text-gray-900 whitespace-nowrap p-4 text-left">
                                      {{ $module->iscommon ? 'yes' : 'No' }}</td>
                                  <td
                                      class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 flex">
                                      <div class=" mr-2 mt-5">
                                          <x-danger-button wire:click="confirmModuleDeletion({{ $module->id }})"
                                              wire:loading.attr="disabled">
                                              {{ __('Delete') }}
                                          </x-danger-button>
                                      </div>
                                      <div class="mt-5">
                                          <x-secondary-button wire:click="confirmModuleUpdate({{ $module->id }})"
                                              wire:loading.attr="disabled"
                                              class=" bg-amber-600  border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
                                              {{ __('Update') }}
                                          </x-secondary-button>
                                      </div>
                                      <div class="mt-5 ml-2">
                                          <a href={{}}>
                                              <x-secondary-button
                                                  class=" bg-amber-600 border-2 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700  focus:ring-amber-500 ">
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
         <div class="mt-4">
            {{ $modules->links() }}
         </div>
         <x-dialog-modal wire:model="ConfirmingModuleDeletion">
             <x-slot name="title">
                 {{ __('Delete Module') }}
             </x-slot>
 
             <x-slot name="content">
                 {{ __('Are you sure you want to delete the Module?') }}
             </x-slot>
 
             <x-slot name="footer">
                 <x-secondary-button wire:click="$set('ConfirmingModuleDeletion', false)" wire:loading.attr="disabled">
                     {{ __('Cancel') }}
                 </x-secondary-button>
 
                 <x-danger-button class="ml-3" wire:click="DeleteModule({{$ConfirmingModuleDeletion}})" wire:loading.attr="disabled">
                     {{ __('Delete Module') }}
                 </x-danger-button>
             </x-slot>
         </x-dialog-modal>
         <x-dialog-modal wire:model="ConfirmingModuleAddition" >
            <x-slot name="title">
                {{isset($this->module->id) ? 'Update Module' : 'Add Module'}}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                   <x-label for="name" value="{{ __('Module Name') }}" />
                   <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="module.Module_name" placeholder="Enter the module name :Science" />
                   <x-input-error for="module.Module_name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-4">
                   <x-label for="name" value="{{ __('Module code') }}" />
                   <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="module.Module_code" placeholder="Enter the module code :S103" />
                   The first letter is the subject, and the first  two digit is the grade and the last digit is the module number
                   <x-input-error for="module.Module_code" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-4">
                   <x-label for="name" value="{{ __('Teacher Name') }}" />
                   <select wire:model.defer="module.teacher_id" class="form-control">
                      <option value="">Select Teacher</option>
                      @foreach ($teachers as $teacher)
                         <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                      @endforeach
                   </select>
                   <x-input-error for="module.teacher_id" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-4">
                    <label class = "flex items-center">
                        <input type="checkbox" wire:model.defer="module.iscommon" />
                        <span class="ml-2 text-sm text-gray-800">Common Module</span>
                        <x-input-error for="module.iscommon" class="mt-3" />
                    </label>
                </div>
                
             </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('ConfirmingModuleAddition', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="SaveModule({{$ConfirmingModuleAddition}})" wire:loading.attr="disabled">
                    {{ __('Save Module') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
         
      </div>
 </div>
 