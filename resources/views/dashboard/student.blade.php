<x-sidebar>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
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
                <div>
                    <img src="{{ asset('images/web6 (2).jpg') }}" alt="logo" width="700"  class="lg:pl-80">
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4  mt-5 sm:p-6 xl:p-8 ">
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Upcoming Assignments</h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assignmnet name</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Description</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">File type to submit</th>
    
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Due Date</th>
    
                        {{--                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>--}}
    
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"></th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                </td>
    
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                   
                                </td>
    
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
    
                                   
                                </td>
                                {{--                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">--}}
                                {{--                             <div class="flex items-center">--}}
    
                                {{--                                <div class="relative w-full">--}}
                                {{--                                   <div class="w-full bg-gray-200 rounded-sm h-2">--}}
                                {{--                                      <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>--}}
                                {{--                                   </div>--}}
                                {{--                                </div>--}}
                                {{--                             </div>--}}
                                {{--                          </td>--}}
                            </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4  mt-5 sm:p-6 xl:p-8 ">
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">New Resourses</h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Resource name</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>
    
                        {{--                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>--}}
    
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"></th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                </td>
    
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                   
                                </td>
    
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
    
                                   
                                </td>
                                {{--                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">--}}
                                {{--                             <div class="flex items-center">--}}
    
                                {{--                                <div class="relative w-full">--}}
                                {{--                                   <div class="w-full bg-gray-200 rounded-sm h-2">--}}
                                {{--                                      <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>--}}
                                {{--                                   </div>--}}
                                {{--                                </div>--}}
                                {{--                             </div>--}}
                                {{--                          </td>--}}
                            </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-sidebar>