
<aside id="sidebar-menu" x-description="Mobile menu" x-bind:aria-expanded="sidebar" :class="{ 'w-64 md:-ms-64': sidebar, 'w-64 -ms-64 md:ms-0': !(sidebar) }" class="fixed sidebar-dark w-64 h-screen transition-all duration-500 ease-in-out bg-white shadow-sm -ms-64 md:ms-0">
    <div class="h-full overflow-y-auto scrollbars">
      <!--logo-->
      <div class="py-5 text-center mh-18">
        <a href="/#" class="relative">
          <h2 class="px-4 overflow-hidden text-2xl font-semibold text-gray-200 max-h-9 hidden-compact">
            <!-- <img class="inline-block h-auto -mt-1 w-7 me-2" src="{{asset('src/img/logo.png')}}"> -->
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1 w-7 h-7 me-2" viewBox="0 0 300.000000 300.000000">
              <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                <path class="text-pink-500" d="M1225 2825 c-546 -115 -959 -534 -1065 -1080 -28 -147 -28 -373 0
                -520 81 -419 350 -774 728 -964 115 -58 120 -58 65 3 -27 29 -65 84 -85 122
                -68 131 -90 236 -89 428 0 229 44 470 167 923 41 149 74 275 74 278 0 4 -102
                5 -227 3 -198 -4 -236 -7 -290 -25 -35 -12 -63 -18 -63 -14 0 4 22 43 49 87
                58 93 123 157 177 175 22 6 124 14 234 16 l195 5 33 112 c91 305 200 431 405
                465 43 7 31 9 -73 9 -94 1 -152 -5 -235 -23z"/>
                <path class="text-indigo-500" d="M1695 2763 c-48 -77 -122 -231 -179 -375 -25 -65 -46 -120 -46 -123
                0 -7 995 -6 1069 1 34 4 61 12 61 18 0 6 -30 46 -65 88 -170 201 -426 361
                -687 428 -110 29 -111 28 -153 -37z"/>
                <path class="text-indigo-500" d="M2660 2104 c-33 -36 -54 -47 -120 -67 -21 -6 -256 -12 -595 -16
                l-560 -6 -51 -180 c-62 -215 -116 -445 -144 -608 -74 -435 -37 -655 124 -740
                62 -32 189 -30 274 5 174 72 337 212 410 353 l20 40 24 -50 c32 -70 32 -162
                -1 -229 -48 -97 -216 -250 -383 -347 -86 -51 -170 -85 -261 -109 l-69 -17 94
                -6 c469 -33 947 205 1214 605 229 342 291 790 163 1173 -24 70 -76 192 -94
                217 -10 16 -14 14 -45 -18z"/>
              </g>
            </svg><span class="text-gray-700">{{config('app.name')}}</span>
          </h2>
          <h2 class="hidden mx-auto text-3xl font-semibold logo-compact">
            <!-- <img class="inline-block h-auto -mt-1 w-7" src="{{asset('src/img/logo.png')}}"> -->
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1 w-7 h-7" viewBox="0 0 300.000000 300.000000">
              <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none">
                <path class="text-pink-500" d="M1225 2825 c-546 -115 -959 -534 -1065 -1080 -28 -147 -28 -373 0
                -520 81 -419 350 -774 728 -964 115 -58 120 -58 65 3 -27 29 -65 84 -85 122
                -68 131 -90 236 -89 428 0 229 44 470 167 923 41 149 74 275 74 278 0 4 -102
                5 -227 3 -198 -4 -236 -7 -290 -25 -35 -12 -63 -18 -63 -14 0 4 22 43 49 87
                58 93 123 157 177 175 22 6 124 14 234 16 l195 5 33 112 c91 305 200 431 405
                465 43 7 31 9 -73 9 -94 1 -152 -5 -235 -23z"/>
                <path class="text-indigo-500" d="M1695 2763 c-48 -77 -122 -231 -179 -375 -25 -65 -46 -120 -46 -123
                0 -7 995 -6 1069 1 34 4 61 12 61 18 0 6 -30 46 -65 88 -170 201 -426 361
                -687 428 -110 29 -111 28 -153 -37z"/>
                <path class="text-indigo-500" d="M2660 2104 c-33 -36 -54 -47 -120 -67 -21 -6 -256 -12 -595 -16
                l-560 -6 -51 -180 c-62 -215 -116 -445 -144 -608 -74 -435 -37 -655 124 -740
                62 -32 189 -30 274 5 174 72 337 212 410 353 l20 40 24 -50 c32 -70 32 -162
                -1 -229 -48 -97 -216 -250 -383 -347 -86 -51 -170 -85 -261 -109 l-69 -17 94
                -6 c469 -33 947 205 1214 605 229 342 291 790 163 1173 -24 70 -76 192 -94
                217 -10 16 -14 14 -45 -18z"/>
              </g>
            </svg>
          </h2>
        </a>
      </div>

      <!-- Sidebar menu -->
      <ul id="side-menu" x-data="{ selected : 1 }" class="w-full float-none flex flex-col font-medium ps-1.5">
        <li class="relative">
            <a class="active block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="{{route('dashboard')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 me-2 bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                  </svg>
                  Dashboard</a>
          </li>

          {{-- Dashboard dropdown menu  --}}
        {{-- <li class="relative">
          <a :class="{ 'text-indigo-500': selected == 1 }" @click="selected !== 1 ? selected = 1 : selected = null" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500" href="javascript:;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 me-2 bi bi-house-door" viewBox="0 0 16 16">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
            </svg>
            <!-- <i class="me-2 fas fa-home"></i> -->
            <span>Dashboards</span>
            <!-- caret -->
            <span class="inline-block float-right rtl:float-left">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transform transition duration-300 mt-1.5 bi bi-chevron-down" :class="{ 'rotate-0': selected == 1, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 1) }" width=".8rem" height=".8rem" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
              </svg>
              <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': selected == 1, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 1) }"></i> -->
            </span>
          </a>

          <!-- dropdown menu -->
          <ul x-show="selected == 1"
          x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
          class="block rounded rounded-t-none top-full z-50 ps-7 py-0.5 text-start mb-1 font-normal">
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index.html">CMS</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-analytics.html">Analytics</a>
            </li>
            <li class="relative">
              <a class="active block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-ecommerce.html">Ecommerce</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-projects.html">Projects</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-crm.html">CRM</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-hosting.html">Hosting</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-saas.html">Saas</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-sales.html">Sales</a>
            </li>
            <li class="relative">
              <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/index-marketing.html">Marketing</a>
            </li>
          </ul>
        </li> --}}
        @foreach ($sidebar_lists as $sidebar_list)
            <x-sidebar-list :sidebarList="$sidebar_list" :ml="$loop->iteration"/>
        @endforeach

        <!-- dropdown -->
        {{-- <li class="relative">
          <a  :class="{ 'text-indigo-500': selected == 10 }" @click="selected !== 10 ? selected = 10 : selected = null" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500" href="javascript:;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-4 h-4 me-2 bi bi-list-nested" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <!-- <i class="me-2 fas fa-stream"></i> -->
           <span>Multi Level</span>
            <!-- caret -->
            <span class="inline-block float-right rtl:float-left">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transform transition duration-300 mt-1.5 bi bi-chevron-down" :class="{ 'rotate-0': selected == 10, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 10) }" width=".8rem" height=".8rem" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
              </svg>
              <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': selected == 10, 'ltr:-rotate-90 rtl:rotate-90': !(selected == 10) }"></i> -->
            </span>
          </a>
          <ul x-show="selected == 10"
          x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
          class="block rounded rounded-t-none top-full z-50 ps-7  py-0.5 text-start mb-1 font-normal">
            <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.outside="open = false">
             <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" id="mobiledrop-91" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500" href="javascript:;">
                Second Level
                <!-- caret -->
                <span class="inline-block float-right rtl:float-left">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transform transition duration-300 mt-1.5 bi bi-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }" width=".8rem" height=".8rem" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
                  <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
                </span>
              </a>
              <ul class="block rounded rounded-t-none top-full z-50 ps-7  py-0.5 text-start mb-1 font-normal" x-show="open"
              x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
              role="menu" aria-orientation="vertical" aria-labelledby="mobiledrop-91">
                <li class="relative">
                  <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/#">Item 1</a>
                </li>
                <li class="relative">
                  <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/#">Item 2</a>
                </li>
              </ul>
            </li>
            <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.outside="open = false">
              <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" id="mobiledrop-92" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500" href="javascript:;">
                Third Level
                <!-- caret -->
                <span class="inline-block float-right rtl:float-left">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transform transition duration-300 mt-1.5 bi bi-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }" width=".8rem" height=".8rem" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
                  <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
                </span>
              </a>
              <ul class="block rounded rounded-t-none top-full z-50 ps-7  py-0.5 text-start mb-1 font-normal" x-show="open"
              x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
              role="menu" aria-orientation="vertical" aria-labelledby="mobiledrop-92">
                <li class="relative">
                  <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/#">Item 1</a>
                </li>
                <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.outside="open = false">
                  <a :class="{ 'text-indigo-500': open }" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" id="mobiledrop-93" class="[&.active]:text-indigo-500 block py-2.5 px-6 hover:text-indigo-500" href="javascript:;">
                    <span> Item 2 </span>
                    <!-- caret -->
                    <span class="inline-block float-right rtl:float-left">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="transform transition duration-300 mt-1.5 bi bi-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }" width=".8rem" height=".8rem" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                      </svg>
                      <!-- <i class="transition duration-300 transform fas fa-chevron-down" :class="{ 'rotate-0': open, 'ltr:-rotate-90 rtl:rotate-90': !open }"></i> -->
                    </span>
                  </a>
                  <ul class="block rounded rounded-t-none top-full z-50 ps-7  py-0.5 text-start mb-1 font-normal" x-show="open"
                  x-transition:enter="transition-all duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                  role="menu" aria-orientation="vertical" aria-labelledby="mobiledrop-93">
                    <li class="relative">
                      <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/#">Item 2.1</a>
                    </li>
                    <li class="relative">
                      <a class="block w-full py-2 px-6 clear-both whitespace-nowrap [&.active]:text-indigo-500 hover:text-indigo-500" href="/#">Item 2.2</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

          </ul>
        </li> --}}
      </ul>

    </div>
</aside>
