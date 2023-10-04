<x-sidebar >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            <a href="{{ route('manage-users') }}"  class="mx-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left inline" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>

                </svg>
            </a>


            @if($userType == 'student')
                {{ __('Add A New Student') }}
            @elseif($userType == 'teacher')
                {{ __('Add A New Teacher') }}
            @endif

        </h2>
    </x-slot>

    <div class="py-12 bg-blue-300" x-data="{ showConfirmation: false }"  >

        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">


            <form method="POST" action="{{ route('store-user') }}" id="userForm" x-on:submit.prevent="showConfirmation = true">
            @csrf


           <input type="hidden" name="userType" value="{{ $userType }}">

           @if ($userType == 'student')
            <div class="m-2">
                    <label for="student_id" class="block text-sm font-medium text-gray-700">Student ID</label>
                    <input type="text" id="student_id" name="student_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                @error('student_id') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            @elseif ($userType == 'teacher')
                <div class="m-2">
                        <label for="teacher_id" class="block text-sm font-medium text-gray-700">Teacher ID</label>
                        <input type="text" id="teacher_id" name="teacher_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    @error('teacher_id') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
            @endif

            <div class="m-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="m-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="m-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password"  id="password" name="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="m-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation"  name="password_confirmation" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                @error('password_confirmation') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="m-2">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-900 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none">

                    @if($userType == 'student')
                        {{ __('Add Student') }}
                    @elseif($userType == 'teacher')
                        {{ __('Add Teacher') }}
                    @endif
                </button>
            </div>
            </form>



        <!-- Confirmation Modal -->
        <div x-show="showConfirmation" x-cloak class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
            <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg- rounded-lg p-4 max-w-md mx-auto">
                <h2 class="text-xl font-semibold">Confirm Action</h2>
                <p>Are you sure you want to submit this form?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button @click="showConfirmation = false" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                        Cancel
                    </button>
                    <button @click="document.querySelector('#userForm').submit();" class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-700 focus:outline-none">
                        Confirm
                    </button>
                </div>
            </div>
        </div>


        </div>
        </div>
</x-sidebar>
