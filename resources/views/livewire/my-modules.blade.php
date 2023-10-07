<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Modules') }}
        </h2>
    </x-slot>

    <div class="mt-4  w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach($modules as $module)
        <a href= {{route('student-module-details',[$module->id]  )}}  class="block">
            <div class="bg-blue-500 shadow rounded-lg grade-card h-24">
                <!-- Content of the card -->
                <div class="p-4 sm:p-6 xl:p-8">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $module->Module_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</div>
