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
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Module</th>

                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Assignmnet name</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Description</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">File type to submit</th>

                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Due Date</th>

                        {{--                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>--}}

                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @if($assignments!=null)
                            @foreach($assignments as $assignment)

                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    {{$assignment->module->Module_name}}
                                </th>
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    <a href="{{ route('assignment-submission', ['module_id' => $assignment->module->id, 'assignment_id' => $assignment->id] ) }}">
                                        {{$assignment->assignment_name}}
                                    </a>

                                </th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{$assignment->assignment_description  }}
                                </td>

                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{$assignment->assignment_type}}
                                </td>

                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{$assignment->deadline}}

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
                            @endforeach
                            @else
                            <tr class="text-gray-500">

                                <td class="border-t-0 px-4 col-span-6 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    No Assignments
                                </td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4  mt-5 sm:p-6 xl:p-8 ">
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Latest forum post</h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Post</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Author</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Updated Time</th>

                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Link</th>

                        {{--                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap"></th>--}}

                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @if($latestForumPosts!=null)
                            @foreach($latestForumPosts as $post)
                                <tr class="text-gray-500">
                                    {{--                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">--}}
                                    <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{$post->content}}</th>

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        {{ $post->author_name }}
                                    </td>

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        {{ $post->updated_at->diffForHumans() }}

                                    </td>

                                    <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                        <a href=" {{ Forum::route('post.show', $post) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                    </td>

                                </tr>
                            @endforeach
                            @else

                                <tr class="text-gray-500">

                                        <td class="border-t-0 px-4 col-span-6 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                            No Posts Found
                                        </td>

                                </tr>
                            @endif
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
                        @if($resources!=null)
                            @foreach($resources as $resource)
                            <tr class="text-gray-500">
                                <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    {{$resource->name}}
                                </th>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    <a href="{{ route('student-module-details',
                                    ['module_id' => $resource->module->id] ) }}">
                                    {{$resource->module->Module_code}}
                                    {{$resource->module->Module_name}}
                                    </a>
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
                            @endforeach
                        @else
                            <tr class="text-gray-500">

                                <td class="border-t-0 px-4 col-span-6 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    No Resources
                                </td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-sidebar>
