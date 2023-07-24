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
            
                <div class="flex justify-between mb-5">
                    <div class="flex  ">
                    <h3 class="font-semibold text-2xl">Students</h3>
                    <form action="{{ route('manage-users') }}" method="GET">
                  
                    <div class="flex ml-5">
                        <input type="text" placeholder="Search" name="student_search" class="block w-full py-2.5 rounded-l focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-400" value={{ $studentSearch }}>
                    
                        <button class="relative z-[2] flex items-center rounded-r bg-yellow-800 px-5 py-2 text-xs font-medium uppercase text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-5 w-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    </form>
                    
                           
                    </div>
                    
                       
                        <a href="{{ route('add-student')}}" class="bg-yellow-800 border border-transparent  hover:bg-yellow-600 focus:bg-yellow-700  text-white font-bold py-2 px-4 rounded">Add New Student</a>
                            
                   
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-3 text-center">Id</th>
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-center">Grade</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-medium">
                                @if (count($students) != 0)
                                @foreach ($students as $student)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-3 text-center">
                                        {{ $student->id }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center  ">
                                            <div class="mr-2">
                                                {{-- <img class="w-6 h-6 rounded-full" src={{ $student->profile_photo_url }}/> --}} 
                                                {{-- TODO fix image --}}
                                            </div>
                                            <span class="">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-3 text-left">
                                        {{ $student->email }}
                                    </td>
                                    <td class="py-3 px-3 text-center">
                                        1
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if ($student->status == 1)
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs font-semibold">Active</span>
                                     
    
                                        @elseif ($student->status == 0)
                                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs font-semibold">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            {{-- view --}}

                                            <a href="/manage/users/{{ $student->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            {{-- edit --}}
                                            <a href="/manage/users/{{ $student->id}}/edit">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            {{-- delete --}}
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else 
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-3 text-center">
                                        No data found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="p-5">
                            {{ $students->links() }}
                          </div>
                  
                </div>
            </div>
           
           
            <div class="mt-5">
                <div class="flex justify-between mb-5">
                    <div class=" flex">
                        <h3 class="font-semibold text-2xl">Teachers</h3>
                        <form action="{{ route('manage-users') }}" method="GET">
                        
                            <div class="flex ml-5">
                                <div class="relative flex w-full flex-nowrap items-stretch">
                                    <input type="text" placeholder="Search" name="teacher_search" class="block w-full py-2.5 rounded-l focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm border-gray-400" value={{$teacherSearch}}>
                               

                                
                                    <!--Search button-->
                                <button class="relative z-[2] flex items-center rounded-r bg-yellow-800 px-5 py-2 text-xs font-medium uppercase text-white shadow-md transition duration-150 ease-in-out hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="h-5 w-5">
                                        <path
                                            fill-rule="evenodd"
                                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                </div>
                             
                            </div>
                            </form>
                    </div>
                    <a href="{{ route('add-teacher')}}" class="bg-yellow-800 border border-transparent  hover:bg-yellow-600 focus:bg-yellow-700  text-white font-bold py-2 px-4 rounded">Add New Teacher</a>
                 </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-3 text-center">Id</th>
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                   
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-medium">
                                @if (count($teachers) != 0)
                                @foreach ($teachers as $teacher)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-3 text-center">
                                        {{ $teacher->id }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center  ">
                                            <div class="mr-2">
                                                {{-- <img class="w-6 h-6 rounded-full" src={{ $teacher->profile_photo_url }}/> --}}
                                                 {{-- TODO fix image --}}
                                            </div>
                                            <span class="">{{ $teacher->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-3 text-left">
                                        {{ $teacher->email }}
                                    </td>
                                   
                                    <td class="py-3 px-6 text-center">
                                        @if ($teacher->status == 1)
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs font-semibold">Active</span>
                                        
                                        @elseif ($teacher->status == 0)
                                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs font-semibold">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            {{-- view --}}
                                            <a href="/manage/users/{{ $teacher->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            {{-- edit --}}
                                            <a href="/manage/users/{{ $teacher->id}}/edit">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            {{-- delete --}}
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="border-b border-gray-200 hover:bg-gray-100 text-center">
                                    <td class="py-3 px-3 text-center">
                                        No data found
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="p-5">
                            {{ $teachers->links() }}
                          </div>
                  
                </div>
            </div>        
        </div>
    </div>
</x-sidebar>