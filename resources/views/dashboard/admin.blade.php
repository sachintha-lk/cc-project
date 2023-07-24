<x-sidebar>
    <div class="pt-6 px-4">
        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
           {{-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
              <div class="flex items-center justify-between mb-4">
                 <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">LKR.45,385</span>
                    <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                 </div>
                 <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                    12.5%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                 </div>
              </div>
              <div id="main-chart"></div>
           </div> --}}
           {{-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <div class="mb-4 flex items-center justify-between">
                 <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Latest Transactions</h3>
                    <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
                 </div>
                 <div class="flex-shrink-0">
                    <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View all</a>
                 </div>
              </div>
              <div class="flex flex-col mt-8">
                 <div class="overflow-x-auto rounded-lg">
                    <div class="align-middle inline-block min-w-full">
                       <div class="shadow overflow-hidden sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                             <thead class="bg-gray-50">
                                <tr>
                                   <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Transaction
                                   </th>
                                   <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Date & Time
                                   </th>
                                   <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Amount
                                   </th>
                                </tr>
                             </thead>
                             <tbody class="bg-white">
                                <tr>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                      Payment from <span class="font-semibold">Bonnie Green</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 23 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.2300
                                   </td>
                                </tr>
                                <tr class="bg-gray-50">
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                      Payment refund to <span class="font-semibold">#00910</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 23 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      -LKR.670
                                   </td>
                                </tr>
                                <tr>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                      Payment failed from <span class="font-semibold">#087651</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 18 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.234
                                   </td>
                                </tr>
                                <tr class="bg-gray-50">
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                      Payment from <span class="font-semibold">Lana Byrd</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 15 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.5000
                                   </td>
                                </tr>
                                <tr>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                      Payment from <span class="font-semibold">Jese Leos</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 15 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.2300
                                   </td>
                                </tr>
                                <tr class="bg-gray-50">
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900 rounded-lg rounded-left">
                                      Payment from <span class="font-semibold">THEMESBERG LLC</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 11 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.560
                                   </td>
                                </tr>
                                <tr>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                      Payment from <span class="font-semibold">Lana Lysle</span>
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                      Apr 6 ,2021
                                   </td>
                                   <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                      LKR.1437
                                   </td>
                                </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
              </div>
           </div> --}}
        </div>
        <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
           {{-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <div class="flex items-center">
                 <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">2,340</span>
                    <h3 class="text-base font-normal text-gray-500">New products this week</h3>
                 </div>
                 <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                    14.6%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                 </div>
              </div>
           </div> --}}
           <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <div class="flex items-center">
                 <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                    <h3 class="text-base font-normal text-gray-500">Number of Teachers</h3>
                 </div>
                 <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                   <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><linearGradient id="notoManTeacher0" x1="63.999" x2="63.999" y1="116.605" y2="39.511" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#26A69A"/><stop offset="1" stop-color="#00796B"/></linearGradient><path fill="url(#notoManTeacher0)" d="M6.36 10.9h115.29v77.52H6.36z"/><linearGradient id="notoManTeacher1" x1="63.999" x2="63.999" y1="119.455" y2="37.224" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#8D6E63"/><stop offset=".779" stop-color="#795548"/></linearGradient><path fill="url(#notoManTeacher1)" d="M119.29 13.26v72.81H8.71V13.26h110.58M124 8.55H4v82.23h120V8.55z"/><path fill="#E59600" d="M64 90.78h-9.5v10.83c0 4.9 3.87 8.87 8.63 8.87h1.73c4.77 0 8.63-3.97 8.63-8.87V90.78H64z"/><linearGradient id="notoManTeacher2" x1="64" x2="64" y1="31.924" y2="5.133" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#E1F5FE"/><stop offset="1" stop-color="#81D4FA"/></linearGradient><path fill="url(#notoManTeacher2)" d="M82.7 97.21c-3.98-.68-8.12-1.12-12.3-1.34l-2.69 2.89l-3.65 3.93l-3.67-3.94l-2.69-2.89c-4.18.2-8.32.6-12.31 1.22C27.06 99.93 12 107.36 12 120.75v3.23h104v-3.23c0-12.64-14.95-20.47-33.3-23.54z"/><linearGradient id="notoManTeacher3" x1="63.601" x2="63.601" y1="31.2" y2="4.828" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00BFA5"/><stop offset="1" stop-color="#00AB94"/></linearGradient><path fill="url(#notoManTeacher3)" d="M104.11 123.98H23.04c.27-6.14 1.29-13.82 4.08-21.85c0 0 2.09-1.06 5.48-2.26c1.05-.38 2.23-.77 3.51-1.14c2.7-.8 5.86-1.53 9.23-1.93l2.41 14.53l15.67-8.22h1.27l15.67 8.22l2.41-14.53c10.09 1.2 18.22 5.33 18.22 5.33c2.79 8.03 3.37 15.71 3.12 21.85z"/><linearGradient id="notoManTeacher4" x1="32.43" x2="32.43" y1="32.759" y2="4.952" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#B2DFDB" stop-opacity=".2"/><stop offset=".767" stop-color="#B2DFDB" stop-opacity=".6"/></linearGradient><path fill="url(#notoManTeacher4)" d="M36.11 98.73c-2.77 9.78-4.08 19.87-4.34 25.25h-3.02c.22-5.19 1.36-14.61 3.85-24.11c1.05-.38 2.23-.77 3.51-1.14z"/><linearGradient id="notoManTeacher5" x1="948.705" x2="948.705" y1="32.929" y2="4.955" gradientTransform="rotate(180 522.044 64)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#B2DFDB" stop-opacity=".2"/><stop offset=".767" stop-color="#B2DFDB" stop-opacity=".6"/></linearGradient><path fill="url(#notoManTeacher5)" d="M99.25 123.98c-.23-5.35-1.57-14.54-4.22-24.3l-3.52-1.1c2.93 10.05 4.45 19.86 4.72 25.4h3.02z"/><linearGradient id="notoManTeacher6" x1="64.055" x2="64.055" y1="12.297" y2="35.184" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#E1F5FE"/><stop offset="1" stop-color="#81D4FA"/></linearGradient><path fill="url(#notoManTeacher6)" d="m74.11 91.88l-3.71 3.99l-1.33 1.43l-1.36 1.46l-3.65 3.93l-3.67-3.94l-1.35-1.45l-1.34-1.44l-3.7-3.98l-8.66 4.92l.05.28l.25 1.51l.24 1.46l1.87 11.28l16.31-8.55l16.3 8.55l1.85-11.16l.25-1.49l.24-1.47l.07-.41z"/><linearGradient id="notoManTeacher7" x1="79.149" x2="72.816" y1="21.117" y2="-5.55" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset=".002" stop-color="#212121" stop-opacity=".2"/><stop offset="1" stop-color="#212121" stop-opacity=".6"/></linearGradient><path fill="url(#notoManTeacher7)" d="m100.98 123.98l.78-2.7l.63-2.18l-.06-.02l.01-.05l-1.55-.44l1.64-5.72c.1-.35.09-.7 0-1.02c0-.01-.01-.03-.01-.04a.3.3 0 0 0-.04-.1c-.17-.54-.56-.97-1.09-1.13l-.15-.04h-.01l-3.75-1.08l-34.94-10.04c-.05-.01-.09-.01-.13-.03a6.177 6.177 0 0 0-7.51 4.27l-1.44 5.03c-.1.34-.21.71-.33 1.11l-1.32 4.61l-2.75 9.58l52.02-.01z"/><path fill="#424242" d="m102.28 123.98l3.47-12.11c.29-1.01-.29-2.06-1.3-2.34l-38.69-11.1a6.19 6.19 0 0 0-7.65 4.24L52 123.98h50.28z"/><linearGradient id="notoManTeacher8" x1="81.888" x2="76.722" y1="17.259" y2="-.074" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#EF5350"/><stop offset="1" stop-color="#E53935"/></linearGradient><path fill="url(#notoManTeacher8)" d="m104.02 123.98l1.06-3.68c.35-1.22-.38-2.5-1.62-2.85l-41.52-11.9c-4.53-1.3-5.32 2.35-6.59 6.78l-3.34 11.65h52.01z"/><path fill="#424242" d="M64.33 101.57c.18 0 .38.02.59.07l37.25 10.7l-.31 1.08c-11.79-3.29-34.29-9.62-38.94-11.16c.24-.33.71-.69 1.41-.69m0-3.33c-4.52 0-6.78 5.57-3.12 6.94c4.03 1.5 42.93 12.32 42.93 12.32l1.58-5.52c.31-1.06-.19-2.14-1.11-2.4L65.77 98.42c-.5-.12-.98-.18-1.44-.18z" opacity=".2"/><linearGradient id="notoManTeacher9" x1="-117.44" x2="-73.995" y1="-972.312" y2="-972.312" gradientTransform="matrix(.9612 .2758 -.3192 1.1123 -136.555 1216.41)" gradientUnits="userSpaceOnUse"><stop offset=".01" stop-color="#BDBDBD"/><stop offset=".987" stop-color="#F5F5F5"/></linearGradient><path fill="url(#notoManTeacher9)" d="m103.37 112.12l-39.8-11.42c-1.08-.31-2.26.46-2.62 1.71l-.06.22c-.36 1.25.23 2.53 1.31 2.84l39.8 11.42s-.34-.83.07-2.3c.41-1.48 1.3-2.47 1.3-2.47z"/><defs><path id="notoManTeachera" d="m105.67 118.03l-44.5-12.66c-3.53-1-3.9.22-4.81 3.43l-4.34 15.18h54.15l-.5-5.95z"/></defs><clipPath id="notoManTeacherb"><use href="#notoManTeachera"/></clipPath><linearGradient id="notoManTeacherc" x1="52.555" x2="56.93" y1="5.954" y2="19.704" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#212121"/><stop offset="1" stop-color="#424242"/></linearGradient><path fill="url(#notoManTeacherc)" d="m55.87 123.98l7.76-27.03l-6.43-1.85l-8.29 28.88z" clip-path="url(#notoManTeacherb)"/><path fill="#E59600" d="M91.33 50.43H36.67c-5.89 0-10.71 5.14-10.71 11.41s4.82 11.41 10.71 11.41h54.65c5.89 0 10.71-5.14 10.71-11.41s-4.81-11.41-10.7-11.41z"/><path fill="#FFCA28" d="M64 11.07c-17.4 0-33.52 18.61-33.52 45.4c0 26.64 16.61 39.81 33.52 39.81S97.52 83.1 97.52 56.46c0-26.78-16.12-45.39-33.52-45.39z"/><g fill="#404040"><ellipse cx="48.19" cy="58.81" rx="4.93" ry="5.1"/><ellipse cx="79.33" cy="58.81" rx="4.93" ry="5.1"/></g><path fill="#E59600" d="M67.86 68.06c-.11-.04-.21-.07-.32-.08h-7.08c-.11.01-.22.04-.32.08c-.64.26-.99.92-.69 1.63c.3.71 1.71 2.69 4.55 2.69s4.25-1.99 4.55-2.69c.3-.71-.05-1.37-.69-1.63z"/><path fill="#795548" d="M72.53 76.14c-3.18 1.89-13.63 1.89-16.81 0c-1.83-1.09-3.7.58-2.94 2.24c.75 1.63 6.44 5.42 11.37 5.42s10.55-3.79 11.3-5.42c.75-1.66-1.09-3.33-2.92-2.24z"/><path fill="#6D4C41" d="M40.01 50.72c2.99-4.23 9.78-4.63 13.67-1.48c.62.5 1.44 1.2 1.68 1.98c.4 1.27-.82 2.26-2.01 1.96c-.76-.19-1.47-.6-2.22-.83c-1.37-.43-2.36-.55-3.59-.55c-1.82-.01-2.99.22-4.72.92c-.71.29-1.29.75-2.1.41c-.93-.38-1.28-1.57-.71-2.41zm46.06 2.41c-.29-.13-.57-.29-.86-.41c-1.78-.74-2.79-.93-4.72-.92c-1.7.01-2.71.24-4.04.69c-.81.28-1.84.98-2.74.71c-1.32-.4-1.28-1.84-.56-2.76c.86-1.08 2.04-1.9 3.29-2.44c2.9-1.26 6.44-1.08 9.17.55c.89.53 1.86 1.26 2.4 2.18c.78 1.3-.4 3.03-1.94 2.4z"/><path fill="#543930" d="M64 4.03h-.04c-45.43.24-36.12 52.14-36.12 52.14s2.04 5.35 2.97 7.71c.13.34.63.3.71-.05c.97-4.34 4.46-19.73 6.22-24.41a6.075 6.075 0 0 1 6.79-3.83c4.45.81 11.55 1.81 19.37 1.81h.16c7.82 0 14.92-1 19.37-1.81c2.9-.53 5.76 1.08 6.79 3.83c1.75 4.66 5.22 19.96 6.2 24.36c.08.36.58.39.71.05l2.98-7.67c.02.01 9.33-51.89-36.11-52.13z"/><radialGradient id="notoManTeacherd" cx="63.983" cy="80.901" r="38.093" gradientTransform="matrix(1 0 0 -1.1282 0 138.37)" gradientUnits="userSpaceOnUse"><stop offset=".794" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoManTeacherd)" d="M100.13 56.17S109.44 4.27 64 4.03h-.04c-.71 0-1.4.02-2.08.05c-1.35.06-2.66.16-3.92.31h-.04c-.09.01-.17.03-.26.04c-38.24 4.81-29.82 51.74-29.82 51.74l2.98 7.68c.13.34.62.31.7-.05c.98-4.39 4.46-19.71 6.22-24.37a6.075 6.075 0 0 1 6.79-3.83c4.45.81 11.55 1.81 19.37 1.81h.16c7.82 0 14.92-1 19.37-1.81c2.9-.53 5.76 1.08 6.79 3.83c1.76 4.68 5.25 20.1 6.21 24.42c.08.36.57.39.7.05c.95-2.36 3-7.73 3-7.73z"/><path fill="#212121" stroke="#212121" stroke-miterlimit="10" stroke-width=".55" d="M93.93 52.93c-.07-1.19-.12-1.31-1.69-1.81c-1.23-.39-7.95-.94-13.01-.66c-.36.02-.71.04-1.04.07c-4.59.39-10.1 2.24-14.24 2.34c-1.76.04-9.01-1.86-14.14-2.26c-.33-.02-.66-.05-1-.06c-5.07-.26-11.82.33-13.05.73c-1.57.51-1.62.63-1.68 1.82c-.07 1.18.13 2.2 1.06 2.51c1.27.42 1.28 2 2.13 6.54c.77 4.14 2.62 7.41 10.57 7.98c.34.02.66.04.98.04c7.03.1 9.45-4.53 10.25-6.07c1.49-2.86 1.02-6.8 4.96-6.81c3.93-.01 3.56 3.86 5.07 6.71c.81 1.53 3.17 6.18 10.14 6.08c.34 0 .69-.02 1.05-.05c7.94-.62 9.78-3.9 10.52-8.04c.82-4.55.83-6.14 2.09-6.56c.91-.3 1.1-1.31 1.03-2.5zM53.37 68.17c-1.22.57-2.85.86-4.57.86c-3.59-.01-7.57-1.27-9.01-3.81c-2.04-3.62-2.57-10.94.03-12.47c1.14-.67 4.99-1.13 8.97-.96c4.13.18 8.4 1.04 9.94 3.06c2.56 3.33-1.5 11.5-5.36 13.32zm34.9-3.1c-1.43 2.56-5.44 3.85-9.05 3.86c-1.7.01-3.31-.27-4.51-.83c-3.87-1.8-7.97-9.94-5.45-13.29c1.53-2.04 5.82-2.92 9.96-3.12c3.97-.19 7.81.25 8.94.91c2.62 1.52 2.13 8.84.11 12.47z"/></svg>
                 </div>
              </div>
           </div>
           <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="flex items-center">
               <div class="flex-shrink-0">
                  <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                  <h3 class="text-base font-normal text-gray-500">Number of Students</h3>
               </div>
               <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                  <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#543930" d="M98.9 79.76c-1.25-2.27.34-4.58 3.06-7.44c4.31-4.54 9-15.07 4.64-25.76c.03-.06-.86-1.86-.83-1.92l-1.79-.09c-.57-.08-20.26-.12-39.97-.12s-39.4.04-39.97.12c0 0-2.65 1.95-2.63 2.01c-4.35 10.69.33 21.22 4.64 25.76c2.71 2.86 4.3 5.17 3.06 7.44c-1.21 2.21-4.81 2.53-4.81 2.53s.83 2.26 2.83 3.48c1.85 1.13 4.13 1.39 5.7 1.43c0 0 6.15 8.51 22.23 8.51h17.9c16.08 0 22.23-8.51 22.23-8.51c1.57-.04 3.85-.3 5.7-1.43c2-1.22 2.83-3.48 2.83-3.48s-3.61-.33-4.82-2.53z"/><radialGradient id="notoStudent0" cx="99.638" cy="45.941" r="23.419" gradientTransform="matrix(1 0 0 .4912 -21.055 59.492)" gradientUnits="userSpaceOnUse"><stop offset=".728" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent0)" d="M63.99 95.7v-9.44L92.56 84l2.6 3.2s-6.15 8.51-22.23 8.51l-8.94-.01z"/><radialGradient id="notoStudent1" cx="76.573" cy="49.423" r="6.921" gradientTransform="matrix(-.9057 .4238 -.3144 -.6719 186.542 79.33)" gradientUnits="userSpaceOnUse"><stop offset=".663" stop-color="#6D4C41"/><stop offset="1" stop-color="#6D4C41" stop-opacity="0"/></radialGradient><path fill="url(#notoStudent1)" d="M95.1 83.07c-4.28-6.5 5.21-8.93 5.21-8.93l.01.01c-1.65 2.05-2.4 3.84-1.43 5.61c1.21 2.21 4.81 2.53 4.81 2.53s-4.91 4.36-8.6.78z"/><radialGradient id="notoStudent2" cx="94.509" cy="69.002" r="30.399" gradientTransform="matrix(-.0746 -.9972 .8311 -.0622 33.418 157.536)" gradientUnits="userSpaceOnUse"><stop offset=".725" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent2)" d="M106.62 46.56c4.25 10.35-.22 21.01-4.41 25.51c-.57.62-3.01 3.01-3.57 4.92c0 0-9.54-13.31-12.39-21.13c-.57-1.58-1.1-3.2-1.17-4.88c-.05-1.26.14-2.76.87-3.83c.89-1.31 20.16-1.7 20.16-1.7c0 .01.51 1.11.51 1.11z"/><radialGradient id="notoStudent3" cx="44.31" cy="69.002" r="30.399" gradientTransform="matrix(.0746 -.9972 -.8311 -.0622 98.35 107.477)" gradientUnits="userSpaceOnUse"><stop offset=".725" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent3)" d="M21.4 46.56c-4.25 10.35.22 21.01 4.41 25.51c.58.62 3.01 3.01 3.57 4.92c0 0 9.54-13.31 12.39-21.13c.58-1.58 1.1-3.2 1.17-4.88c.05-1.26-.14-2.76-.87-3.83c-.89-1.31-1.93-.96-3.44-.96c-2.88 0-15.49-.74-16.47-.74c.01.01-.76 1.11-.76 1.11z"/><radialGradient id="notoStudent4" cx="49.439" cy="45.941" r="23.419" gradientTransform="matrix(-1 0 0 .4912 98.878 59.492)" gradientUnits="userSpaceOnUse"><stop offset=".728" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent4)" d="M64.03 95.7v-9.44L35.46 84l-2.6 3.2s6.15 8.51 22.23 8.51l8.94-.01z"/><radialGradient id="notoStudent5" cx="26.374" cy="49.423" r="6.921" gradientTransform="matrix(.9057 .4238 .3144 -.6719 -13.052 100.605)" gradientUnits="userSpaceOnUse"><stop offset=".663" stop-color="#6D4C41"/><stop offset="1" stop-color="#6D4C41" stop-opacity="0"/></radialGradient><path fill="url(#notoStudent5)" d="M32.92 83.07c4.28-6.5-5.21-8.93-5.21-8.93l-.01.01c1.65 2.05 2.4 3.84 1.43 5.61c-1.21 2.21-4.81 2.53-4.81 2.53s4.91 4.36 8.6.78z"/><path fill="#E59600" d="M73.78 112.04V89.25H54.21v22.79zm17.55-61.7H36.67c-5.89 0-10.71 5.13-10.71 11.41s4.82 11.41 10.71 11.41h54.65c5.89 0 10.71-5.14 10.71-11.41c.01-6.27-4.81-11.41-10.7-11.41z"/><path fill="#FFCA28" d="M64 10.98c-17.4 0-33.52 18.61-33.52 45.4c0 26.64 16.61 39.81 33.52 39.81s33.52-13.17 33.52-39.81c0-26.79-16.12-45.4-33.52-45.4z"/><path fill="#6D4C41" d="M54.8 49.72c-.93-1.23-3.07-3.01-7.23-3.01s-6.31 1.79-7.23 3.01c-.41.54-.31 1.17-.02 1.55c.26.35 1.04.68 1.9.39s2.54-1.16 5.35-1.18c2.81.02 4.49.89 5.35 1.18c.86.29 1.64-.03 1.9-.39c.28-.37.39-1-.02-1.55zm32.87 0c-.93-1.23-3.07-3.01-7.23-3.01s-6.31 1.79-7.23 3.01c-.41.54-.31 1.17-.02 1.55c.26.35 1.04.68 1.9.39s2.54-1.16 5.35-1.18c2.81.02 4.49.89 5.35 1.18c.86.29 1.64-.03 1.9-.39c.28-.37.39-1-.02-1.55z"/><g fill="#404040"><ellipse cx="47.56" cy="58.72" rx="4.93" ry="5.1"/><ellipse cx="80.44" cy="58.72" rx="4.93" ry="5.1"/></g><path fill="#795548" d="M72.42 76.05c-3.18 1.89-13.63 1.89-16.81 0c-1.83-1.09-3.7.58-2.94 2.24c.75 1.63 6.44 5.42 11.37 5.42s10.55-3.79 11.3-5.42c.75-1.66-1.09-3.33-2.92-2.24z"/><path fill="#E59600" d="M67.86 67.96c-.11-.04-.21-.07-.32-.08h-7.08c-.11.01-.22.04-.32.08c-.64.26-.99.92-.69 1.63c.3.71 1.71 2.69 4.55 2.69s4.25-1.99 4.55-2.69c.3-.7-.05-1.37-.69-1.63z"/><path fill="#543930" d="M99.27 23.45c-.79-4.72-13.85-13.12-18.74-14.67c-13.24-4.19-21.85-2.49-26.47.03c-.96.52-7.17 3.97-11.51 1.5c-2.72-1.55-10.53 10.84-14.46 13.21c-4.59 2.77-4.19 7.81-3.49 9.77c-2.52 2.14-5.69 6.69-3.52 12.6c1.64 4.45 8.17 6.5 8.17 6.5c-.62 10.74 2.28 15.95 2.28 15.95s4.69-18.45 4.3-21.27c0 0 7.76-1.54 16.57-6.58c5.95-3.41 10.02-7.4 16.71-8.91c10.18-2.29 12.45 5.08 12.45 5.08s9.42-1.81 12.26 11.27c1.17 5.38 1.93 14.3 2.57 19.77c-.06-.48 3.24-6.33 3.86-12.33c.16-1.55 4.34-3.6 6.14-10.26c2.4-8.88-.24-18.5-7.12-21.66z"/><radialGradient id="notoStudent6" cx="82.872" cy="84.536" r="33.876" gradientTransform="matrix(.3076 .9515 .706 -.2282 -2.303 -16.1)" gradientUnits="userSpaceOnUse"><stop offset=".699" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent6)" d="M106.4 45.1c-1.5 5.53-4.63 7.88-5.75 9.41c-1.54-9.37-1.3-18.27-12.71-28.81c0 0 2.29-.49 3.41-2.53c.87-1.59.54-3.57.54-3.57c.38.02.77.06 1.17.11c1.96.36 3.96 1.32 5.79 2.55c.22.42.36.82.42 1.19c6.88 3.15 9.53 12.77 7.13 21.65z"/><radialGradient id="notoStudent7" cx="38.533" cy="84.7" r="16.886" gradientTransform="matrix(.9907 .1363 .1915 -1.3921 -15.859 155.958)" gradientUnits="userSpaceOnUse"><stop offset=".598" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent7)" d="M24.37 33.49c-2.37 2.1-5.56 6.79-3.21 12.61c1.77 4.39 8.09 6.29 8.09 6.29c0 .02 1.26.4 1.91.4l1.48-21.9c-3.03 0-5.94.91-7.82 2.22c.03.03-.46.35-.45.38z"/><radialGradient id="notoStudent8" cx="37.086" cy="95.778" r="12.941" gradientTransform="matrix(-.9657 -.2598 -.2432 .9037 96.192 -44.696)" gradientUnits="userSpaceOnUse"><stop offset=".66" stop-color="#6D4C41" stop-opacity="0"/><stop offset="1" stop-color="#6D4C41"/></radialGradient><path fill="url(#notoStudent8)" d="M32.69 30.9v-.05c-3.03 0-5.93.91-7.82 2.21c0 .03-.15.14-.27.23v-.01c.01-.01.03-.02.04-.03c-.7-1.96-1.11-7 3.49-9.77c.44-.27.93-.66 1.46-1.15c1.22-.5 2.52-.79 3.72-.91c.35-.03.99-.08 1.18-.08l4.81.59l-6.61 8.97z"/><path fill="#E8AD00" d="M116.67 53.3c-1.24 0-2.25.96-2.25 2.14v9.2c0 1.18 1.01 2.14 2.25 2.14s2.25-.96 2.25-2.14v-9.2c0-1.18-1.01-2.14-2.25-2.14zm-4.5 0c-1.24 0-2.25.96-2.25 2.14v9.2c0 1.18 1.01 2.14 2.25 2.14s2.25-.96 2.25-2.14v-9.2c0-1.18-1.01-2.14-2.25-2.14z"/><path fill="#FFCA28" d="M114.42 53.3c-1.24 0-2.25.96-2.25 2.14v11.19c0 1.18 1.01 2.14 2.25 2.14s2.25-.96 2.25-2.14V55.44c0-1.18-1.01-2.14-2.25-2.14z"/><ellipse cx="114.42" cy="52.07" fill="#FFCA28" rx="2.76" ry="2.63"/><path fill="#504F4F" d="M114.42 52.04c-.55 0-1-.45-1-1v-38c0-.55.45-1 1-1s1 .45 1 1v38c0 .55-.45 1-1 1z"/><linearGradient id="notoStudent9" x1="63.417" x2="63.417" y1="128.333" y2="99.693" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset=".003" stop-color="#424242"/><stop offset=".472" stop-color="#353535"/><stop offset="1" stop-color="#212121"/></linearGradient><path fill="url(#notoStudent9)" d="M115.42 12c-30.83-7.75-52-8-52-8s-21.17.25-52 8v.77c0 1.33.87 2.5 2.14 2.87c3.72 1.1 11.47 3.34 16.53 4.36c0 0-1.11 1.71-2 3.52c0 0 9.95 5.92 35.33 8.48c25.38-2.56 35.85-8.55 35.85-8.55c-.88-1.81-1.98-3.45-1.98-3.45c4.5-.74 12.32-3.14 16.04-4.32c1.25-.4 2.09-1.55 2.09-2.86V12z"/><linearGradient id="notoStudenta" x1="63.417" x2="63.417" y1="128.167" y2="97.167" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset=".003" stop-color="#616161"/><stop offset=".324" stop-color="#505050"/><stop offset=".955" stop-color="#242424"/><stop offset="1" stop-color="#212121"/></linearGradient><path fill="url(#notoStudenta)" d="M63.42 4s-21.17.25-52 8c0 0 35.41 9.67 52 9.38c16.59.29 52-9.38 52-9.38c-30.84-7.75-52-8-52-8z"/><linearGradient id="notoStudentb" x1="13.309" x2="114.137" y1="110.001" y2="110.001" gradientTransform="matrix(1 0 0 -1 0 128)" gradientUnits="userSpaceOnUse"><stop offset=".001" stop-color="#BFBEBE"/><stop offset=".3" stop-color="#212121" stop-opacity="0"/><stop offset=".7" stop-color="#212121" stop-opacity="0"/><stop offset="1" stop-color="#BFBEBE"/></linearGradient><path fill="url(#notoStudentb)" d="M115.42 12c-30.83-7.75-52-8-52-8s-21.17.25-52 8v.77c0 1.33.87 2.5 2.14 2.87c3.72 1.1 11.47 3.34 16.53 4.36c0 0-1.11 1.71-2 3.52c0 0 9.95 5.92 35.33 8.48c25.38-2.56 35.85-8.55 35.85-8.55c-.88-1.81-1.98-3.45-1.98-3.45c4.5-.74 12.32-3.14 16.04-4.32c1.25-.4 2.09-1.55 2.09-2.86V12z" opacity=".4"/><path fill="#212121" d="M114.5 120.99c0-14.61-21.75-21.54-40.72-23.1l-8.6 11.03c-.28.36-.72.58-1.18.58c-.46 0-.9-.21-1.18-.58L54.2 97.87c-10.55.81-40.71 4.75-40.71 23.12V124h101l.01-3.01z"/><radialGradient id="notoStudentc" cx="64" cy="5.397" r="54.167" gradientTransform="matrix(1 0 0 -.5247 0 125.435)" gradientUnits="userSpaceOnUse"><stop offset=".598" stop-color="#212121"/><stop offset="1" stop-color="#616161"/></radialGradient><path fill="url(#notoStudentc)" d="M114.5 120.99c0-14.61-21.75-21.54-40.72-23.1l-8.6 11.03c-.28.36-.72.58-1.18.58c-.46 0-.9-.21-1.18-.58L54.2 97.87c-10.55.81-40.71 4.75-40.71 23.12V124h101l.01-3.01z"/></svg>
               </div>
            </div>
         </div>
           <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <div class="flex items-center">
                 <div class="flex-shrink-0">
                    <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">385</span>
                    <h3 class="text-base font-normal text-gray-500">Total Classes</h3>
                 </div>
                 <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                   <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 32 32"><g fill="none"><g filter="url(#f2164id14)"><path fill="url(#f2164id0)" d="M30.015 15.83h-28l1.72-4.31c.17-.43.58-.71 1.04-.71h22.48c.46 0 .87.28 1.04.71l1.72 4.31Z"/><path fill="url(#f2164id1)" d="M30.015 15.83h-28l1.72-4.31c.17-.43.58-.71 1.04-.71h22.48c.46 0 .87.28 1.04.71l1.72 4.31Z"/></g><g filter="url(#f2164id15)"><path fill="url(#f2164id2)" d="M17.525 3.15h2.69c.16 0 .29.13.29.29v1.42c0 .16-.13.29-.29.29h-2.08c-.33 0-.6-.27-.6-.6v-1.4h-.01Z"/></g><g filter="url(#f2164id16)"><rect width="1.643" height=".23" x="17.618" y="4.014" fill="#51834C" rx=".115"/></g><g filter="url(#f2164id17)"><path fill="#4AD680" d="M19.115 4.15h-3.1v-2h3.1c.22 0 .4.18.4.4v1.19c.01.23-.17.41-.4.41Z"/><path fill="url(#f2164id3)" d="M19.115 4.15h-3.1v-2h3.1c.22 0 .4.18.4.4v1.19c.01.23-.17.41-.4.41Z"/></g><path fill="url(#f2164id1m)" d="M16.055 6.65h-.06a.47.47 0 0 1-.47-.47V2.29c0-.26.21-.47.47-.47h.06c.26 0 .47.21.47.47v3.89c0 .26-.21.47-.47.47Z"/><path fill="url(#f2164id1n)" d="M16.055 6.65h-.06a.47.47 0 0 1-.47-.47V2.29c0-.26.21-.47.47-.47h.06c.26 0 .47.21.47.47v3.89c0 .26-.21.47-.47.47Z"/><path fill="url(#f2164id4)" d="M9.05 15.82H2.015v14H9.05v-14Z"/><path fill="url(#f2164id5)" d="M9.05 15.82H2.015v14H9.05v-14Z"/><path fill="url(#f2164id6)" d="M9.05 15.82H2.015v14H9.05v-14Z"/><path fill="url(#f2164id7)" d="M9.05 15.82H2.015v14H9.05v-14Z"/><path fill="url(#f2164id8)" d="M23.015 15.82h7v14h-7v-14Z"/><path fill="url(#f2164id9)" d="M23.015 15.82h7v14h-7v-14Z"/><path fill="url(#f2164ida)" d="M23.015 15.82h7v14h-7v-14Z"/><path fill="url(#f2164id1o)" d="M23.015 15.82h7v14h-7v-14Z"/><g filter="url(#f2164id18)"><path fill="#8E5745" d="M7.036 16h2.703v1.402H7.036z"/></g><path fill="url(#f2164idb)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164idc)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164idd)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164ide)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164idf)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164id1p)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><path fill="url(#f2164id1q)" d="m22.735 13.78l-6.15-6.06a.79.79 0 0 0-1.12 0l-6.15 6.06a.98.98 0 0 0-.29.68v15.37h14V14.45c-.01-.25-.11-.49-.29-.67Z"/><g filter="url(#f2164id19)"><path fill="url(#f2164idg)" d="M25.735 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idh)" d="M25.735 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1a)"><path fill="url(#f2164idi)" d="M28.735 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idj)" d="M28.735 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1b)"><path fill="url(#f2164idk)" d="M25.735 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idl)" d="M25.735 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1c)"><path fill="url(#f2164idm)" d="M28.735 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idn)" d="M28.735 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1d)"><path fill="url(#f2164ido)" d="M4.755 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idp)" d="M4.755 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1e)"><path fill="url(#f2164idq)" d="M7.755 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idr)" d="M7.755 20.82h-1.44c-.15 0-.28-.13-.28-.28V18.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1f)"><path fill="url(#f2164ids)" d="M4.755 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idt)" d="M4.755 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1g)"><path fill="url(#f2164idu)" d="M7.755 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/><path fill="url(#f2164idv)" d="M7.755 24.82h-1.44c-.15 0-.28-.13-.28-.28V22.1c0-.15.13-.28.28-.28h1.44c.15 0 .28.13.28.28v2.44c0 .16-.12.28-.28.28Z"/></g><g filter="url(#f2164id1h)"><path fill="#EDDEF1" d="M16.015 17.82a3 3 0 1 0 0-6a3 3 0 0 0 0 6Z"/></g><path fill="url(#f2164id1r)" d="M16.015 15.23c-.28 0-.5-.22-.5-.5v-1.41c0-.28.22-.5.5-.5s.5.22.5.5v1.41c0 .28-.23.5-.5.5Z"/><path fill="url(#f2164id1s)" d="M16.015 15.23c-.28 0-.5-.22-.5-.5v-1.41c0-.28.22-.5.5-.5s.5.22.5.5v1.41c0 .28-.23.5-.5.5Z"/><path fill="url(#f2164idw)" d="M17.495 16.82a.47.47 0 0 1-.35-.15l-1.48-1.48c-.2-.2-.2-.51 0-.71c.2-.2.51-.2.71 0l1.48 1.48c.2.2.2.51 0 .71c-.11.1-.23.15-.36.15Z"/><g filter="url(#f2164id1i)"><path fill="url(#f2164idx)" d="M24.015 13.96c0-.3-.12-.58-.33-.79l-7.03-7.03a.911.911 0 0 0-1.28 0l-7.03 7.03c-.21.21-.33.5-.33.79v1.87c0 .28.22.5.5.5s.5-.22.5-.5v-1.26c0-.26.1-.51.29-.69l6.15-6.15a.79.79 0 0 1 1.12 0l6.15 6.15c.18.18.29.43.29.69v1.26c0 .28.22.5.5.5s.5-.22.5-.5c0-.62-.003-1.248 0-1.87Z"/></g><path fill="url(#f2164idy)" d="M24.015 13.96c0-.3-.12-.58-.33-.79l-7.03-7.03a.911.911 0 0 0-1.28 0l-7.03 7.03c-.21.21-.33.5-.33.79v1.82h.01c0 .02-.01.03-.01.05c0 .28.22.5.5.5s.5-.22.5-.5c0-.02-.01-.03-.01-.05h.01v-1.21c0-.26.1-.51.29-.69l6.15-6.15a.79.79 0 0 1 1.12 0l6.15 6.15c.18.18.29.43.29.69v1.26c0 .28.22.5.5.5s.5-.22.5-.5c0-.62-.003-1.248 0-1.87Z"/><path fill="url(#f2164idz)" d="M24.015 13.96c0-.3-.12-.58-.33-.79l-7.03-7.03a.911.911 0 0 0-1.28 0l-7.03 7.03c-.21.21-.33.5-.33.79v1.82h.01c0 .02-.01.03-.01.05c0 .28.22.5.5.5s.5-.22.5-.5c0-.02-.01-.03-.01-.05h.01v-1.21c0-.26.1-.51.29-.69l6.15-6.15a.79.79 0 0 1 1.12 0l6.15 6.15c.18.18.29.43.29.69v1.26c0 .28.22.5.5.5s.5-.22.5-.5c0-.62-.003-1.248 0-1.87Z"/><path fill="url(#f2164id1t)" d="M24.015 13.96c0-.3-.12-.58-.33-.79l-7.03-7.03a.911.911 0 0 0-1.28 0l-7.03 7.03c-.21.21-.33.5-.33.79v1.82h.01c0 .02-.01.03-.01.05c0 .28.22.5.5.5s.5-.22.5-.5c0-.02-.01-.03-.01-.05h.01v-1.21c0-.26.1-.51.29-.69l6.15-6.15a.79.79 0 0 1 1.12 0l6.15 6.15c.18.18.29.43.29.69v1.26c0 .28.22.5.5.5s.5-.22.5-.5c0-.62-.003-1.248 0-1.87Z"/><g filter="url(#f2164id1j)"><path fill="url(#f2164id10)" d="M19.025 29.82h-6.05v-5.3c0-.39.31-.7.7-.7h4.65c.39 0 .7.31.7.7v5.3Z"/><path fill="url(#f2164id11)" d="M19.025 29.82h-6.05v-5.3c0-.39.31-.7.7-.7h4.65c.39 0 .7.31.7.7v5.3Z"/></g><g filter="url(#f2164id1k)"><path stroke="url(#f2164id12)" stroke-linecap="round" stroke-width=".25" d="m16.05 14.841l1.553 1.564"/></g><g filter="url(#f2164id1l)"><path stroke="url(#f2164id13)" stroke-linecap="round" stroke-width=".4" d="m16.306 6.34l7.084 7.104"/></g><defs><linearGradient id="f2164id0" x1="16.015" x2="16.015" y1="11.194" y2="15.829" gradientUnits="userSpaceOnUse"><stop stop-color="#A77060"/><stop offset="1" stop-color="#6E504C"/></linearGradient><linearGradient id="f2164id1" x1="2.859" x2="3.436" y1="14.319" y2="14.49" gradientUnits="userSpaceOnUse"><stop stop-color="#554540"/><stop offset="1" stop-color="#735348" stop-opacity="0"/></linearGradient><linearGradient id="f2164id2" x1="17.796" x2="19.921" y1="4.632" y2="4.632" gradientUnits="userSpaceOnUse"><stop stop-color="#67C175"/><stop offset="1" stop-color="#A1E16D"/></linearGradient><linearGradient id="f2164id3" x1="17.765" x2="17.765" y1="4.406" y2="3.783" gradientUnits="userSpaceOnUse"><stop stop-color="#308649"/><stop offset="1" stop-color="#308649" stop-opacity="0"/></linearGradient><linearGradient id="f2164id4" x1="5.533" x2="5.533" y1="15.819" y2="28.68" gradientUnits="userSpaceOnUse"><stop stop-color="#C9885B"/><stop offset="1" stop-color="#E79F6A"/></linearGradient><linearGradient id="f2164id5" x1="9.621" x2="6.567" y1="23.599" y2="23.599" gradientUnits="userSpaceOnUse"><stop stop-color="#935B42"/><stop offset="1" stop-color="#B67358" stop-opacity="0"/></linearGradient><linearGradient id="f2164id6" x1="2.015" x2="2.765" y1="27.288" y2="27.288" gradientUnits="userSpaceOnUse"><stop stop-color="#A1714D"/><stop offset="1" stop-color="#A1714D" stop-opacity="0"/></linearGradient><linearGradient id="f2164id7" x1="5.533" x2="5.533" y1="14.657" y2="16.557" gradientUnits="userSpaceOnUse"><stop stop-color="#8B5243"/><stop offset="1" stop-color="#8B5243" stop-opacity="0"/></linearGradient><linearGradient id="f2164id8" x1="23.015" x2="30.015" y1="26.874" y2="26.874" gradientUnits="userSpaceOnUse"><stop stop-color="#FFD19E"/><stop offset="1" stop-color="#F2BEA5"/></linearGradient><linearGradient id="f2164id9" x1="30.015" x2="29.375" y1="25.033" y2="25.033" gradientUnits="userSpaceOnUse"><stop stop-color="#EEC9A8"/><stop offset="1" stop-color="#EEC9A8" stop-opacity="0"/></linearGradient><linearGradient id="f2164ida" x1="25.545" x2="25.545" y1="15.664" y2="16.208" gradientUnits="userSpaceOnUse"><stop stop-color="#A97469"/><stop offset="1" stop-color="#A97469" stop-opacity="0"/></linearGradient><linearGradient id="f2164idb" x1="11.203" x2="22.328" y1="21.507" y2="23.882" gradientUnits="userSpaceOnUse"><stop stop-color="#F2B98E"/><stop offset="1" stop-color="#FFD7AB"/></linearGradient><linearGradient id="f2164idc" x1="8.703" x2="9.796" y1="24.78" y2="24.78" gradientUnits="userSpaceOnUse"><stop offset=".214" stop-color="#A3785B"/><stop offset=".657" stop-color="#B27E5B"/><stop offset=".914" stop-color="#DEA072" stop-opacity="0"/></linearGradient><linearGradient id="f2164idd" x1="23.025" x2="22.465" y1="24.205" y2="24.205" gradientUnits="userSpaceOnUse"><stop offset=".403" stop-color="#FFE4B3"/><stop offset="1" stop-color="#FFE4B3" stop-opacity="0"/></linearGradient><linearGradient id="f2164ide" x1="20.053" x2="19.241" y1="10.873" y2="11.686" gradientUnits="userSpaceOnUse"><stop offset=".19" stop-color="#8A594A"/><stop offset="1" stop-color="#986658" stop-opacity="0"/></linearGradient><linearGradient id="f2164idf" x1="12.343" x2="12.828" y1="10.46" y2="10.944" gradientUnits="userSpaceOnUse"><stop stop-color="#794D30"/><stop offset="1" stop-color="#794D30" stop-opacity="0"/></linearGradient><linearGradient id="f2164idg" x1="24.416" x2="26.014" y1="19.692" y2="19.731" gradientUnits="userSpaceOnUse"><stop stop-color="#53C7FF"/><stop offset=".842" stop-color="#44ACFA"/><stop offset="1" stop-color="#3EA2ED"/></linearGradient><linearGradient id="f2164idh" x1="24.015" x2="24.288" y1="19.319" y2="19.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idi" x1="27.416" x2="29.014" y1="19.692" y2="19.731" gradientUnits="userSpaceOnUse"><stop stop-color="#53C7FF"/><stop offset=".842" stop-color="#44ACFA"/><stop offset="1" stop-color="#3EA2ED"/></linearGradient><linearGradient id="f2164idj" x1="27.015" x2="27.288" y1="19.319" y2="19.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idk" x1="24.416" x2="26.014" y1="23.692" y2="23.731" gradientUnits="userSpaceOnUse"><stop stop-color="#53C7FF"/><stop offset=".842" stop-color="#44ACFA"/><stop offset="1" stop-color="#3EA2ED"/></linearGradient><linearGradient id="f2164idl" x1="24.015" x2="24.288" y1="23.319" y2="23.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idm" x1="27.416" x2="29.014" y1="23.692" y2="23.731" gradientUnits="userSpaceOnUse"><stop stop-color="#53C7FF"/><stop offset=".842" stop-color="#44ACFA"/><stop offset="1" stop-color="#3EA2ED"/></linearGradient><linearGradient id="f2164idn" x1="27.015" x2="27.288" y1="23.319" y2="23.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164ido" x1="3.48" x2="5.378" y1="20.292" y2="17.684" gradientUnits="userSpaceOnUse"><stop stop-color="#54D3FF"/><stop offset="1" stop-color="#44ACFA"/></linearGradient><linearGradient id="f2164idp" x1="3.035" x2="3.308" y1="19.319" y2="19.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idq" x1="6.48" x2="8.378" y1="20.292" y2="17.684" gradientUnits="userSpaceOnUse"><stop stop-color="#54D3FF"/><stop offset="1" stop-color="#44ACFA"/></linearGradient><linearGradient id="f2164idr" x1="6.035" x2="6.308" y1="19.319" y2="19.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164ids" x1="3.48" x2="5.378" y1="24.292" y2="21.684" gradientUnits="userSpaceOnUse"><stop stop-color="#54D3FF"/><stop offset="1" stop-color="#44ACFA"/></linearGradient><linearGradient id="f2164idt" x1="3.035" x2="3.308" y1="23.319" y2="23.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idu" x1="6.48" x2="8.378" y1="24.292" y2="21.684" gradientUnits="userSpaceOnUse"><stop stop-color="#54D3FF"/><stop offset="1" stop-color="#44ACFA"/></linearGradient><linearGradient id="f2164idv" x1="6.035" x2="6.308" y1="23.319" y2="23.319" gradientUnits="userSpaceOnUse"><stop stop-color="#5ADFFF"/><stop offset=".909" stop-color="#5ADFFF" stop-opacity="0"/></linearGradient><linearGradient id="f2164idw" x1="15.515" x2="17.837" y1="14.329" y2="16.651" gradientUnits="userSpaceOnUse"><stop stop-color="#6C4B40"/><stop offset="1" stop-color="#B16F60"/></linearGradient><linearGradient id="f2164idx" x1="16.015" x2="16.015" y1="5.877" y2="16.329" gradientUnits="userSpaceOnUse"><stop stop-color="#B67A6C"/><stop offset="1" stop-color="#825E59"/></linearGradient><linearGradient id="f2164idy" x1="20.106" x2="19.825" y1="9.504" y2="9.785" gradientUnits="userSpaceOnUse"><stop stop-color="#BF8B78"/><stop offset="1" stop-color="#BF8B78" stop-opacity="0"/></linearGradient><linearGradient id="f2164idz" x1="16.015" x2="16.015" y1="16.819" y2="15.658" gradientUnits="userSpaceOnUse"><stop stop-color="#543C46"/><stop offset="1" stop-color="#543C46" stop-opacity="0"/></linearGradient><linearGradient id="f2164id10" x1="12.975" x2="19.025" y1="27.304" y2="27.304" gradientUnits="userSpaceOnUse"><stop stop-color="#534264"/><stop offset="1" stop-color="#423B49"/></linearGradient><linearGradient id="f2164id11" x1="12.975" x2="13.616" y1="27.328" y2="27.328" gradientUnits="userSpaceOnUse"><stop offset=".347" stop-color="#695282"/><stop offset="1" stop-color="#695282" stop-opacity="0"/></linearGradient><linearGradient id="f2164id12" x1="17.719" x2="15.908" y1="16.359" y2="14.652" gradientUnits="userSpaceOnUse"><stop stop-color="#C38878"/><stop offset="1" stop-color="#A57A6D"/></linearGradient><linearGradient id="f2164id13" x1="23.718" x2="16.304" y1="14.042" y2="6.17" gradientUnits="userSpaceOnUse"><stop stop-color="#D4967E" stop-opacity="0"/><stop offset="1" stop-color="#D4967E"/></linearGradient><filter id="f2164id14" width="28.25" height="5.27" x="1.765" y="10.809" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.25" dy=".25"/><feGaussianBlur stdDeviation=".25"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.639216 0 0 0 0 0.435294 0 0 0 0 0.364706 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id15" width="3.28" height="2.3" x="17.375" y="2.999" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".15"/><feGaussianBlur stdDeviation=".125"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.843137 0 0 0 0 1 0 0 0 0 0.419608 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".15" dy="-.15"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.258824 0 0 0 0 0.447059 0 0 0 0 0.294118 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_6570" result="effect2_innerShadow_18_6570"/></filter><filter id="f2164id16" width="1.843" height=".43" x="17.518" y="3.914" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur result="effect1_foregroundBlur_18_6570" stdDeviation=".05"/></filter><filter id="f2164id17" width="3.65" height="2.15" x="15.865" y="2.149" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".15"/><feGaussianBlur stdDeviation=".125"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.407843 0 0 0 0 0.937255 0 0 0 0 0.603922 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id18" width="6.703" height="5.402" x="5.036" y="14" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur result="effect1_foregroundBlur_18_6570" stdDeviation="1"/></filter><filter id="f2164id19" width="2.15" height="3.05" x="23.865" y="17.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1a" width="2.15" height="3.05" x="26.865" y="17.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1b" width="2.15" height="3.05" x="23.865" y="21.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1c" width="2.15" height="3.05" x="26.865" y="21.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1d" width="2.15" height="3.05" x="2.885" y="17.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1e" width="2.15" height="3.05" x="5.885" y="17.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1f" width="2.15" height="3.05" x="2.885" y="21.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1g" width="2.15" height="3.05" x="5.885" y="21.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.15" dy=".05"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.0705882 0 0 0 0 0.466667 0 0 0 0 0.815686 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1h" width="6.6" height="6.6" x="12.715" y="11.519" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".3" dy="-.3"/><feGaussianBlur stdDeviation=".5"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.3" dy=".3"/><feGaussianBlur stdDeviation=".5"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.694118 0 0 0 0 0.592157 0 0 0 0 0.733333 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_6570" result="effect2_innerShadow_18_6570"/></filter><filter id="f2164id1i" width="16.5" height="10.703" x="7.815" y="5.627" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx=".4" dy="-.25"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.384314 0 0 0 0 0.258824 0 0 0 0 0.231373 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.2"/><feGaussianBlur stdDeviation=".15"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.670588 0 0 0 0 0.466667 0 0 0 0 0.415686 0 0 0 1 0"/><feBlend in2="effect1_innerShadow_18_6570" result="effect2_innerShadow_18_6570"/></filter><filter id="f2164id1j" width="6.3" height="6.25" x="12.725" y="23.819" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feColorMatrix in="SourceAlpha" result="hardAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dx="-.25" dy=".25"/><feGaussianBlur stdDeviation=".25"/><feComposite in2="hardAlpha" k2="-1" k3="1" operator="arithmetic"/><feColorMatrix values="0 0 0 0 0.176471 0 0 0 0 0.12549 0 0 0 0 0.211765 0 0 0 1 0"/><feBlend in2="shape" result="effect1_innerShadow_18_6570"/></filter><filter id="f2164id1k" width="2.804" height="2.813" x="15.424" y="14.216" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur result="effect1_foregroundBlur_18_6570" stdDeviation=".25"/></filter><filter id="f2164id1l" width="8.284" height="8.304" x="15.706" y="5.74" color-interpolation-filters="sRGB" filterUnits="userSpaceOnUse"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur result="effect1_foregroundBlur_18_6570" stdDeviation=".2"/></filter><radialGradient id="f2164id1m" cx="0" cy="0" r="1" gradientTransform="matrix(0 4.3447 -1.98139 0 16.525 2.813)" gradientUnits="userSpaceOnUse"><stop stop-color="#B27C6D"/><stop offset=".868" stop-color="#523C35"/></radialGradient><radialGradient id="f2164id1n" cx="0" cy="0" r="1" gradientTransform="matrix(-1.06047 0 0 -1.04878 16.732 1.82)" gradientUnits="userSpaceOnUse"><stop stop-color="#D19580"/><stop offset="1" stop-color="#D19580" stop-opacity="0"/></radialGradient><radialGradient id="f2164id1o" cx="0" cy="0" r="1" gradientTransform="matrix(0 1.17186 -.9375 0 22.906 15.82)" gradientUnits="userSpaceOnUse"><stop offset=".307" stop-color="#A97469"/><stop offset="1" stop-color="#A97469" stop-opacity="0"/></radialGradient><radialGradient id="f2164id1p" cx="0" cy="0" r="1" gradientTransform="matrix(0 2.79688 -.76001 0 23.025 14.366)" gradientUnits="userSpaceOnUse"><stop offset=".274" stop-color="#1D0C0B"/><stop offset="1" stop-color="#AC7C6C" stop-opacity="0"/></radialGradient><radialGradient id="f2164id1q" cx="0" cy="0" r="1" gradientTransform="matrix(0 2.4375 -.82813 0 8.843 14.303)" gradientUnits="userSpaceOnUse"><stop offset=".244" stop-color="#1D0C0B"/><stop offset="1" stop-color="#1D0C0B" stop-opacity="0"/></radialGradient><radialGradient id="f2164id1r" cx="0" cy="0" r="1" gradientTransform="matrix(0 1.85923 -.85276 0 16.222 13.37)" gradientUnits="userSpaceOnUse"><stop stop-color="#B1786C"/><stop offset="1" stop-color="#6A4532"/><stop offset="1" stop-color="#735351"/></radialGradient><radialGradient id="f2164id1s" cx="0" cy="0" r="1" gradientTransform="matrix(.47677 0 0 .25583 16.235 13.17)" gradientUnits="userSpaceOnUse"><stop stop-color="#BE8370"/><stop offset="1" stop-color="#BE8370" stop-opacity="0"/></radialGradient><radialGradient id="f2164id1t" cx="0" cy="0" r="1" gradientTransform="matrix(0 -1.96417 1.31017 0 16.015 8.837)" gradientUnits="userSpaceOnUse"><stop offset=".527" stop-color="#7E4541"/><stop offset="1" stop-color="#7E4541" stop-opacity="0"/></radialGradient></defs></g></svg>
                 </div>
              </div>
           </div>
        </div>
        <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
           <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
              <div class="flex items-center justify-between mb-4">
                 <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                 <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                 View all
                 </a>
              </div>
              <div class="flow-root">
                 <ul role="list" class="divide-y divide-gray-200">
                    <li class="py-3 sm:py-4">
                       <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                             <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                          </div>
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate">
                                Neil Sims
                             </p>
                             <p class="text-sm text-gray-500 truncate">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a>
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900">
                             $320
                          </div>
                       </div>
                    </li>
                    <li class="py-3 sm:py-4">
                       <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                             <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/bonnie-green.png" alt="Neil image">
                          </div>
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate">
                                Bonnie Green
                             </p>
                             <p class="text-sm text-gray-500 truncate">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d4b1b9b5bdb894a3bdbab0a7a0b1a6fab7bbb9">[email&#160;protected]</a>
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900">
                             $3467
                          </div>
                       </div>
                    </li>
                    <li class="py-3 sm:py-4">
                       <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                             <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/michael-gough.png" alt="Neil image">
                          </div>
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate">
                                Michael Gough
                             </p>
                             <p class="text-sm text-gray-500 truncate">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="57323a363e3b17203e3933242332257934383a">[email&#160;protected]</a>
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900">
                             $67
                          </div>
                       </div>
                    </li>
                    <li class="py-3 sm:py-4">
                       <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                             <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/thomas-lean.png" alt="Neil image">
                          </div>
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate">
                                Thomes Lean
                             </p>
                             <p class="text-sm text-gray-500 truncate">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="284d45494144685f41464c5b5c4d5a064b4745">[email&#160;protected]</a>
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900">
                             $2367
                          </div>
                       </div>
                    </li>
                    <li class="pt-3 sm:pt-4 pb-0">
                       <div class="flex items-center space-x-4">
                          <div class="flex-shrink-0">
                             <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/lana-byrd.png" alt="Neil image">
                          </div>
                          <div class="flex-1 min-w-0">
                             <p class="text-sm font-medium text-gray-900 truncate">
                                Lana Byrd
                             </p>
                             <p class="text-sm text-gray-500 truncate">
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a2c7cfc3cbcee2d5cbccc6d1d6c7d08cc1cdcf">[email&#160;protected]</a>
                             </p>
                          </div>
                          <div class="inline-flex items-center text-base font-semibold text-gray-900">
                             $367
                          </div>
                       </div>
                    </li>
                 </ul>
              </div>
           </div>
           
           {{-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Acquisition Overview</h3>
              <div class="block w-full overflow-x-auto">
                 <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                       <tr>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Top Channels</th>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Users</th>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                       </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Organic Search</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">5,649</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">30%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Referral</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">4,025</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">24%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-orange-300 h-2 rounded-sm" style="width: 24%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Direct</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">3,105</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">18%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-teal-400 h-2 rounded-sm" style="width: 18%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Social</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">1251</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">12%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-pink-600 h-2 rounded-sm" style="width: 12%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Other</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">734</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">9%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-indigo-600 h-2 rounded-sm" style="width: 9%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                       <tr class="text-gray-500">
                          <th class="border-t-0 align-middle text-sm font-normal whitespace-nowrap p-4 pb-0 text-left">Email</th>
                          <td class="border-t-0 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 pb-0">456</td>
                          <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                             <div class="flex items-center">
                                <span class="mr-2 text-xs font-medium">7%</span>
                                <div class="relative w-full">
                                   <div class="w-full bg-gray-200 rounded-sm h-2">
                                      <div class="bg-purple-500 h-2 rounded-sm" style="width: 7%"></div>
                                   </div>
                                </div>
                             </div>
                          </td>
                       </tr>
                    </tbody>
                 </table>
              </div>
           </div> --}}
        </div>
     </div> 
</x-sidebar>