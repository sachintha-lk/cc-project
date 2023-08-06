<x-sidebar>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded p-4">
                <h3 class="text-slate-800 font-semibold text-xl">Hello 
                    @auth
                    {{ Auth::user()->name }}!
                    
                    @endauth
                </h3>
            </div>
        </div>
    </div>
</x-sidebar>