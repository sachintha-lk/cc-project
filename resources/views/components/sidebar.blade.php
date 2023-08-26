<x-app-layout>

    @if (isset($header))
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif
    <div class="flex overflow-hidden bg-white">
        <aside id="sidebar"
               class="fixed hidden z-20 h-full top-0 left-0 pt-20 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
               aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 bg-white divide-y space-y-1">
                        <ul class="space-y-2 pb-2">
                            {{--                           <li>--}}
                            {{--                               <form action="#" method="GET" class="lg:hidden">--}}
                            {{--                                 <label for="mobile-search" class="sr-only">Search</label>--}}
                            {{--                                 <div class="relative">--}}
                            {{--                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">--}}
                            {{--                                       <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                          <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>--}}
                            {{--                                       </svg>--}}
                            {{--                                    </div>--}}
                            {{--                                    <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">--}}
                            {{--                                 </div>--}}
                            {{--                              </form>--}}
                            {{--                              </form>--}}
                            {{--                           </li>--}}
                            <li>
                                <a href="{{route('dashboard')}}"
                                   class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                    <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            {{-- admin only  --}}
                            @if (Auth::user()->role_id == 1)
                                <li>
                                    <a href="{{route('manage-users')}}"
                                       class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <svg
                                            class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M13.75 7h-3.5C9.04 7 8.11 8.07 8.27 9.26L10 22h4l1.73-12.74C15.89 8.07 14.96 7 13.75 7z"/>
                                            <circle cx="12" cy="4" r="2" fill="currentColor"/>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Manage Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('grade')}}"
                                       class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="32"
                                            height="32" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M21.066 20.667c1.227-.682 1.068-3.31-.354-5.874c-.61-1.104-1.36-1.998-2.11-2.623a5.229 5.229 0 0 1-3.1 1.03a5.23 5.23 0 0 1-3.105-1.03c-.75.625-1.498 1.52-2.11 2.623c-1.423 2.563-1.58 5.192-.35 5.874c.548.312 1.126.078 1.722-.496a10.51 10.51 0 0 0-.167 1.874c0 2.938 1.14 5.312 2.543 5.312c.846 0 1.265-.865 1.466-2.188c.2 1.314.62 2.188 1.46 2.188c1.397 0 2.546-2.375 2.546-5.312c0-.66-.062-1.29-.168-1.873c.6.575 1.176.813 1.726.497zM15.5 12.2a4.279 4.279 0 1 0-.003-8.557A4.279 4.279 0 0 0 15.5 12.2zm8.594 2.714a3.514 3.514 0 0 0 0-7.025a3.513 3.513 0 1 0 .001 7.027zm4.28 2.13c-.502-.908-1.116-1.642-1.732-2.155a4.3 4.3 0 0 1-2.546.845c-.756 0-1.46-.207-2.076-.55c.496 1.093.803 2.2.86 3.19c.094 1.516-.38 2.64-1.328 3.165a2.017 2.017 0 0 1-.653.224c-.057.392-.096.8-.096 1.23c0 2.413.935 4.362 2.088 4.362c.694 0 1.04-.71 1.204-1.796c.163 1.08.508 1.796 1.2 1.796c1.145 0 2.09-1.95 2.09-4.36c0-.543-.053-1.06-.14-1.54c.492.473.966.668 1.418.408c1.007-.56.877-2.718-.29-4.82zm-21.468-2.13a3.512 3.512 0 1 0-3.514-3.512a3.515 3.515 0 0 0 3.514 3.514zm2.535 6.622c-1.592-.885-1.738-3.524-.456-6.354a4.242 4.242 0 0 1-2.078.553c-.956 0-1.832-.32-2.55-.846c-.615.512-1.228 1.246-1.732 2.153c-1.167 2.104-1.295 4.262-.287 4.82c.45.258.925.065 1.414-.406a8.83 8.83 0 0 0-.135 1.538c0 2.412.935 4.36 2.088 4.36c.694 0 1.04-.71 1.204-1.795c.165 1.08.51 1.796 1.2 1.796c1.147 0 2.09-1.95 2.09-4.36c0-.433-.04-.842-.097-1.234a2.02 2.02 0 0 1-.66-.226z"/>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Grades</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->role_id == 2)
                                <li>
                                    <a href="{{route('teacher-modules')}}"
                                       class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                  d="M1.5 14H15v-1H2V0H1v13.5l.5.5zM3 11.5v-8l.5-.5h2l.5.5v8l-.5.5h-2l-.5-.5zm2-.5V4H4v7h1zm6-9.5v10l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm2 .5v9h-1V2h1zm-6 9.5v-6l.5-.5h2l.5.5v6l-.5.5h-2l-.5-.5zm2-.5V6H8v5h1z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Modules</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->role_id == 3)
                                <li>
                                    <a href="{{route('student-modules')}}"
                                       class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <svg
                                            class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 16 16">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                  d="M1.5 14H15v-1H2V0H1v13.5l.5.5zM3 11.5v-8l.5-.5h2l.5.5v8l-.5.5h-2l-.5-.5zm2-.5V4H4v7h1zm6-9.5v10l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm2 .5v9h-1V2h1zm-6 9.5v-6l.5-.5h2l.5.5v6l-.5.5h-2l-.5-.5zm2-.5V6H8v5h1z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-3 flex-1 whitespace-nowrap"> My Modules</span>
                                    </a>
                                </li>
                            @endif
                            {{-- <li>
                               <a href="" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                  <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                  </svg>
                                  <span class="ml-3 flex-1 whitespace-nowrap">Employess</span>
                               </a>
                            </li>
                            <li>
                               <a href="" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                  <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="currentColor" d="M21.066 20.667c1.227-.682 1.068-3.31-.354-5.874c-.61-1.104-1.36-1.998-2.11-2.623a5.229 5.229 0 0 1-3.1 1.03a5.23 5.23 0 0 1-3.105-1.03c-.75.625-1.498 1.52-2.11 2.623c-1.423 2.563-1.58 5.192-.35 5.874c.548.312 1.126.078 1.722-.496a10.51 10.51 0 0 0-.167 1.874c0 2.938 1.14 5.312 2.543 5.312c.846 0 1.265-.865 1.466-2.188c.2 1.314.62 2.188 1.46 2.188c1.397 0 2.546-2.375 2.546-5.312c0-.66-.062-1.29-.168-1.873c.6.575 1.176.813 1.726.497zM15.5 12.2a4.279 4.279 0 1 0-.003-8.557A4.279 4.279 0 0 0 15.5 12.2zm8.594 2.714a3.514 3.514 0 0 0 0-7.025a3.513 3.513 0 1 0 .001 7.027zm4.28 2.13c-.502-.908-1.116-1.642-1.732-2.155a4.3 4.3 0 0 1-2.546.845c-.756 0-1.46-.207-2.076-.55c.496 1.093.803 2.2.86 3.19c.094 1.516-.38 2.64-1.328 3.165a2.017 2.017 0 0 1-.653.224c-.057.392-.096.8-.096 1.23c0 2.413.935 4.362 2.088 4.362c.694 0 1.04-.71 1.204-1.796c.163 1.08.508 1.796 1.2 1.796c1.145 0 2.09-1.95 2.09-4.36c0-.543-.053-1.06-.14-1.54c.492.473.966.668 1.418.408c1.007-.56.877-2.718-.29-4.82zm-21.468-2.13a3.512 3.512 0 1 0-3.514-3.512a3.515 3.515 0 0 0 3.514 3.514zm2.535 6.622c-1.592-.885-1.738-3.524-.456-6.354a4.242 4.242 0 0 1-2.078.553c-.956 0-1.832-.32-2.55-.846c-.615.512-1.228 1.246-1.732 2.153c-1.167 2.104-1.295 4.262-.287 4.82c.45.258.925.065 1.414-.406a8.83 8.83 0 0 0-.135 1.538c0 2.412.935 4.36 2.088 4.36c.694 0 1.04-.71 1.204-1.795c.165 1.08.51 1.796 1.2 1.796c1.147 0 2.09-1.95 2.09-4.36c0-.433-.04-.842-.097-1.234a2.02 2.02 0 0 1-.66-.226z"/></svg>
                                  <span class="ml-3 flex-1 whitespace-nowrap">Supplier</span>
                               </a>
                            </li>
                            <li>
                               <a href="" class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                  <svg  class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.3 21q-.95 0-1.625-.688T5 18.675V9.4L3.175 5H2q-.425 0-.713-.288T1 4q0-.425.288-.713T2 3h1.85q.3 0 .55.175t.375.45L6.175 7H20.95q.575 0 .875.475t.025.975L19 14.025q1.275.2 2.138 1.175T22 17.5q0 1.45-1.012 2.475T18.524 21q-1.475 0-2.487-1.025T15.025 17.5q0-.5.125-.925t.35-.825l-3.275-.3l-3 4.5q-.325.5-.838.775T7.3 21Zm.025-2.025q.05 0 .225-.125l2.425-3.6q-1.225-.125-1.925-.587T7 13.7v5q0 .125.1.2t.225.075ZM18.5 19q.65 0 1.075-.438T20 17.5q0-.65-.425-1.075T18.5 16q-.625 0-1.063.425T17 17.5q0 .625.438 1.063T18.5 19Z"/></svg>
                                  <span class="ml-3">Orders</span>
                               </a>
                            </li> --}}
                            {{-- <li>
                               <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                  <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                     <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                  </svg>
                                  <span class="ml-3 flex-1 whitespace-nowrap">Approvals</span>
                               </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>

</x-app-layout>
