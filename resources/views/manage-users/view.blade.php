<x-sidebar>
    <div class="py-12"
         x-data="{ showDeleteConfirmation : false , showActivateConfirmation : false, showDeactivateConfirmation : false }"
         x-init="showDeleteConfirmation = false; showActivateConfirmation = false; showDeactivateConfirmation = false">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('message') }}
                </div>
            @endif

            @if (session()->has('errormsg'))
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6 ">
                    {{ session('errormsg') }}
                </div>
            @endif
            <div>

                <div class=" bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg flex justify-between mb-5">
                    <div class=" flex gap-5 ">
                        <div>
                            <img src="{{ $user->profile_photo_url }}" alt="" class="rounded-full w-32 h-32">
                        </div>

                        <div>
                            <h2 class="font-bold text-3xl"> {{ $user->name }}</h2>

                            <h3 class="font-semibold text-2xl"> {{ $user->role_id == 2? 'Teacher' : 'Student' }}</h3>
                            <h3 class="font-semibold text-2xl"> {{ $user->role_id == 2? $user->teacher_id : $user->student_id }}</h3>

                            <div class="font-medium">{{ $user->email }}</div>
                            <div class="mt-2 flex">
                                <a href="{{ route('edit-user', ['user_id' => $user->id]) }}"
                                   class="flex gap-1 hover:text-blue-600 ">
                                    <span class="font-semibold ">Edit</span>
                                    <div class="w-4 mr-2 mt-1 transform hover:text-blue-500 hover:scale-110">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </div>
                                </a>
                                @if ($user->status == 1)
                                    <div>
                                        {{--                                    <form action="{{ route('deactivate-user', ['user_id' => $user->id]) }}" method="POST" id="deactivateUserForm" x-on:submit.prevent="showDeactivateConfirmation = true" >--}}
                                        {{--                                        @csrf--}}
                                        {{--                                        @method('PUT')--}}
                                        <button type="submit" class="flex gap-1 text-red-600 hover:text-red-500"
                                                x-on:click="showDeactivateConfirmation = true">
                                            <span class="font-semibold ">Deactivate</span>
                                            <div
                                                class="w-4 mr-2 mt-1 transform text-red-600 hover:text-red-500 hover:scale-110">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7a1 1 0 112 0v5a1 1 0 11-2 0V7zm2-2a1 1 0 00-2 0h0a1 1 0 102 0h0z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </button>
                                        {{--                                    </form>--}}
                                    </div>
                                @elseif ($user->status == 0)
                                    <div>
                                        {{--                                    <form action="{{ route('activate-user', ['user_id' => $user->id]) }}" id="activateUserForm" method="POST" x-on:submit.prevent="showActivateConfirmation = true"  >--}}
                                        {{--                                        @csrf--}}
                                        {{--                                        @method('PUT')--}}
                                        <button type="submit" class="flex gap-1 text-green-600 hover:text-green-500"
                                                x-on:click="showActivateConfirmation = true">
                                            <span class="font-semibold ">Activate</span>
                                            <div
                                                class="w-4 mr-2 mt-1 transform text-green-600 hover:text-green-500 hover:scale-110">

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7a1 1 0 112 0v5a1 1 0 11-2 0V7zm2-2a1 1 0 00-2 0h0a1 1 0 102 0h0z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </button>
                                        {{--                                    </form>--}}
                                    </div>
                                @endif
                                <div class="ml-10">

                                    <button type="submit" class="flex gap-1 text-red-600 hover:text-red-500"
                                            x-on:click="showDeleteConfirmation = true">
                                        <span class="font-semibold ">Delete</span>
                                        <div
                                            class="w-4 mr-2 mt-1 transform text-red-600 hover:text-red-500 hover:scale-110">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 4.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="bg-white  p-5 overflow-hidden shadow-xl sm:rounded-lg">
                </div> --}}
                <div class="bg-white  p-5 overflow-hidden shadow-xl sm:rounded-lg">
                    <h3 class="font-semibold text-2xl"> Details</h3>
                    <div class="font-medium text-xl">
                        Class: {{ $user->class ? $user->class->class_name : "No Class"}}</div>
                    <div class="font-medium text-xl">
                        Grade: {{ $user->class ? $user->class->grade->name : "No Grade"}}</div>
                    <div class="m-3"></div>
                    <div class="font-medium">Created at: {{ $user->created_at }}</div>
                    <div class="font-medium">Updated at: {{ $user->updated_at }}</div>
                    <div class="font-medium">Account Status:
                        @if($user->status == 1)
                            <span class="text-green-800 font-semibold">Active</span>
                        @else
                            <span class="text-red-700 font-semibold">Inactive ( Reason: {{ $userAccountStatusHistory->first()->reason }} )</span>
                        @endif
                    </div>
                    @if (count($userAccountStatusHistory) != 0)
                        <h3 class="text-xl text-gray-500 mt-2">Account Status Change History</h3>
                        <table class="min-w-max w-full table-auto scroll-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-3 text-center">Date Updated</th>
                                <th class="py-3 px-3 text-center">Status Changed to</th>
                                <th class="py-3 px-3 text-center">Reason</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-medium">
                            @foreach($userAccountStatusHistory as $update)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-3 text-center">
                                        {{ $update->updated_at }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$update->status == 1 ? 'Activated' : 'Deactivated' }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$update->reason }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="p-5">
                            {{ $userAccountStatusHistory->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <div x-show="showDeleteConfirmation" x-cloak
                 class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg p-4 max-w-md mx-auto">
                    <form action="{{ route('delete-user', ['user_id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <h2 class="text-xl font-semibold">Confirm User Deletion</h2>
                        <p>Are you sure you want to delete this user? This action cannot be undone</p>
                        <div class="mt-4 flex justify-end space-x-4">
                            <button type="reset" x-on:click="showDeleteConfirmation = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none">
                                Delete User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="showDeactivateConfirmation" x-cloak
                 class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg p-4 max-w-md mx-auto">
                    <form action="{{ route('deactivate-user', ['user_id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-semibold">Confirm User Deactivation</h2>
                        <p>Are you sure you want to deactivate this user?</p>
                        <div class="mt-3"></div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for
                            deactivation</label>
                        <input type="text" id="reason" name="reason"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('reason') <span class="text-red-500">{{ $message }}</span>@enderror
                        <div class="mt-4 flex justify-end space-x-4">
                            <button type="reset" @click="showDeactivateConfirmation = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none">
                                Deactivate User
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-show="showActivateConfirmation" x-cloak
                 class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity -z-10" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg p-4 max-w-md mx-auto">
                    <form action="{{ route('activate-user', ['user_id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h2 class="text-xl font-semibold">Confirm User Activation</h2>
                        <span>Are you sure you want to activate this user?</span>
                        <div class="mt-3"></div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for
                            activation</label>
                        <input type="text" id="reason" name="reason"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('reason') <span class="text-red-500">{{ $message }}</span>@enderror
                        <div class="mt-4 flex justify-end space-x-4">
                            <button type="reset" @click="showActivateConfirmation = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none">
                                Activate User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-sidebar>
