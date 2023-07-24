<x-sidebar>


    <div class="py-12">
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
                            <div class="font-medium">{{ $user->email }}</div>
                            <div class="mt-2">
                                <a href="{{ route('edit-user', ['user_id' => $user->id]) }}" class="flex gap-1 hover:text-yellow-600 ">
                                    <span class="font-semibold ">Edit</span>
                                    <div class="w-4 mr-2 mt-1 transform hover:text-yellow-500 hover:scale-110">
                                   
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                    </div>
                        
                    </div>
                    
                       
                            
                   
                    </div>
                {{-- <div class="bg-white  p-5 overflow-hidden shadow-xl sm:rounded-lg">
                  
                </div> --}}

                <div class="bg-white  p-5 overflow-hidden shadow-xl sm:rounded-lg">
                  
                    <h3 class="font-semibold text-2xl"> Details</h3>
                
                    <div class="font-medium">Created at: {{ $user->created_at }}</div>
                    <div class="font-medium">Updated at: {{ $user->updated_at }}</div>
                    <div class="font-medium">Account Status: 
                        @if($user->status == 1)
                            <span class="text-green-800 font-semibold">Active</span>
                        @else
                        <span class="text-red-700 font-semibold">Inactive</span>
                        @endif
                  </div>

            
                    
            </div>
           
           
               
        </div>
    </div>
</x-sidebar>