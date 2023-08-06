<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>


    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" class="bg-green-500 text-white p-4 rounded-lg mb-6 m-4 flex justify-between  ">
            <span class="block">{{ session('message') }}</span>
            <button @click="show = false" class="ml-4 text-xl font-medium text-white cursor-pointer">&times;</button>
        </div>
    @endif

    @if (session()->has('errormsg'))
        <div x-data="{ show: true }" x-show="show" class="bg-red-500 text-white p-4 rounded-lg mb-6 flex m-4 justify-between">
            <span class="block">{{ session('errormsg') }}</span>
            <button @click="show = false" class="ml-4 text-xl font-medium text-white cursor-pointer">&times;</button>
        </div>
    @endif



    <div class="mt-8 text-2xl flex justify-between">
        <div class="mr-2 ml-1">
           <x-button wire:click="confirmGradeAdd">
              {{ __('Add Grade') }}
          </x-button>
        </div>

     </div>
    <div class="mt-4  w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">




    @foreach($grades as $grade)
        <div class="bg-amber-500  shadow rounded-lg grade-card h-24">
            <!-- Links container -->
            <div class="links-container">
                {{-- view --}}
                <a href="{{ route('class', ['gradeId' => $grade->id]) }}">
                    <div class="w-4 mr-2 transform hover:text-amber-100 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </a>
                {{-- edit --}}

                <button class="w-4 mr-2 transform hover:text-amber-100 hover:scale-110"  wire:click="confirmGradeUpdate({{ $grade->id }})" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </button>
                {{-- delete --}}
                <button class="w-4 mr-2 transform hover:text-amber-100 hover:scale-110" wire:click="confirmGradeDeletion({{ $grade->id }})" wire:loading.attr="disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>


            </div>

            <!-- Content of the card -->
            <div class="p-4 sm:p-6 xl:p-8">

                <div class="flex items-center">
                    <div class="flex-shrink-0">

                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $grade->name }}</span>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <x-confirmation-modal wire:model="confirmGradeDeletion">
        <x-slot name="title">
            {{ __('Delete Grade') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete the Grade?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmGradeDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteGrade({{$confirmGradeDeletion}})" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>


    <x-dialog-modal wire:model="confirmGradeAdd">
        <x-slot name="title">
            {{ isset($this->grade->id) ?'Update Grade' : 'Add Grade' }}
        </x-slot>

        <x-slot name="content">
           <div class="col-span-6 sm:col-span-4">
              <x-label for="name" value="{{ __('Grade Name') }}" />
              <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="grade.name" />
              <x-input-error for="grade.name" class="mt-2" />
           </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmGradeAdd', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="saveGrade()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-danger-button>
        </x-slot>
        </x-dialog-modal>
</div>

<style>
    /* Custom styles for the card container */
    .grade-card {
        margin: 5px; /* Add margin to create spacing from the sides */
        position: relative; /* To position the links correctly within the card */
    }

    /* Style for the links container */
    .links-container {
        position: absolute;
        top: 10px; /* Adjust the top position to change the vertical spacing of the links */
        right: 10px; /* Adjust the right position to change the horizontal spacing of the links */
        display: flex;
        gap: 15px; /* Adjust the gap value to control the spacing between the links */
        flex-direction: column;
    }


</style>
