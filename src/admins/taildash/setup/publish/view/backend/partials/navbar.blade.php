<nav :class="{ 'start-64 -end-64 md:start-0 md:end-0': sidebar, 'start-0 end-0 md:start-64': !(sidebar) }"
    class="fixed end-0 start-0 z-50 mt-0 flex flex-row flex-nowrap items-center justify-between bg-white px-6 py-2 shadow-sm transition-all duration-500 ease-in-out dark:bg-gray-800 md:start-64"
    id="desktop-menu">

    <!-- sidenav button-->
    <script>
        function resetColors() {
            // Get all radio inputs with name 'primary_color'
            const radios = document.querySelectorAll('input[name="primary_color"]');

            // Loop through each radio input and set checked to false
            radios.forEach(radio => {
                radio.checked = false;
            });

            // Optionally call the themeSettingUpdate function with a default value or empty
            themeSettingUpdate(null, 'primary_color'); // Adjust as necessary
        }

        function themeSettingUpdate(This, field) {

            let value = '';

            if (field == 'direction') {
                value = 'ltr';
            }

            if (This && This.checked) {
                value = This.value
            }

            console.log('field: ' + field, 'value: ' + value);
            axios.post("{{ route('admin.theme_setting.update') }}", {
                [field]: value
            }).then((res) => {
                if (res.status == 200) {
                    alert(res.data.msg);
                }
            }).catch((error) => {
                if (error.response && error.response.data.errors) {
                    // Loop through the errors and display only the first error message
                    Object.keys(error.response.data.errors).forEach((key) => {
                        let firstMessage = error.response.data.errors[key][0]; // Get the first message
                        alert(firstMessage); // Display the first message for each field
                    });
                } else {
                    console.error(error); // Log any other errors
                }
            });
        }
    </script>

    <button id="navbartoggle" type="button"
        class="inline-flex items-center justify-center text-gray-800 hover:text-gray-600 focus:outline-none focus:ring-0 dark:text-gray-300 dark:hover:text-gray-200"
        aria-controls="sidebar-menu" @click="sidebar = !sidebar">
        <span class="sr-only">Mobile menu</span>
        <svg x-description="Icon sidebar" x-state:on="Menu sidebar" x-state:off="Menu closed" class="hidden h-8 w-8"
            :class="{ 'block': sidebar, 'hidden': !(sidebar) }" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 16 16">
            <path class="hidden md:block" fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            <path class="md:hidden"
                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
        </svg>

        <svg x-description="Icon closed" x-state:on="Menu sidebar" x-state:off="Menu closed" class="block h-8 w-8"
            :class="{ 'hidden': sidebar, 'block': !(sidebar) }" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 16 16">
            <path class="md:hidden" fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            <path class="hidden md:block"
                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
        </svg>
        <!-- <i class="fas fa-bars text-2xl"></i> -->
    </button>

    <!-- Search -->
    <form class="mx-5 hidden sm:inline-block md:hidden lg:inline-block">
        <div class="relative flex w-full flex-wrap items-stretch">
            <input type="text"
                class="relative max-w-full flex-shrink flex-grow overflow-x-auto rounded-s border border-gray-100 bg-gray-100 px-4 py-2 text-sm leading-5 text-gray-800 focus:border-gray-200 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:focus:border-gray-600"
                placeholder="Search…" aria-label="Search">
            <div class="-me-px flex">
                <button
                    class="-ms-1 flex items-center rounded-e border border-indigo-500 bg-indigo-500 px-4 py-2 leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <!-- <i class="fas fa-search"></i> -->
                </button>
            </div>
        </div>
    </form>

    <!-- menu -->
    <ul class="ms-auto mt-2 flex">

        {{-- This Icon for user Home manue --}}
        <li class="relative flex items-center">
            <a href="{{ route('home') }}" target="_blank" class="flex rounded-full px-3 text-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-house-door me-1 inline-block h-6 w-6" viewBox="0 0 16 16">
                    <path
                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z">
                    </path>
                </svg>
            </a>
        </li>
        <!-- Customizer (Only for demo purpose) -->
        <li x-data="{ open: false }" class="relative">
            <a href="javascript:;" class="flex rounded-full px-4 py-3 text-sm focus:outline-none"
                aria-controls="mobile-canvas" @click="open = !open">
                <span class="sr-only">Customizer</span>
                <svg x-description="Icon closed" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                    <path
                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                </svg>
                <!-- <i class="fas fa-cog text-2xl"></i> -->
            </a>

            <!-- Right Offcanvas -->
            <div class="fixed inset-0 z-50 h-full w-full" id="mobile-canvas" x-description="Mobile menu" x-show="open"
                style="display: none;">
                <!-- bg open -->
                <span class="fixed inset-x-0 top-0 h-full w-full bg-gray-900 bg-opacity-70"></span>

                <nav id="mobile-nav"
                    class="scrollbars show fixed end-0 top-0 z-40 flex h-full w-72 flex-col overflow-auto bg-white dark:bg-gray-800"
                    x-show="open" @click.away="open=false" x-description="Mobile menu" role="menu"
                    aria-orientation="vertical" aria-labelledby="navbartoggle"
                    x-transition:enter="transition-transform duration-300"
                    x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full"
                    x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full">
                    <div class="border-b border-gray-200 bg-indigo-500 p-6 text-gray-100 dark:border-gray-700">
                        <div class="flex flex-row justify-between">
                            <h3 class="text-md font-bold">Customizer</h3>
                            <button @click="open = false" type="button" class="inline-block h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-x-lg inline-block text-gray-100" viewBox="0 0 16 16" id="x-lg">
                                    <path
                                        d="M1.293 1.293a1 1 0 011.414 0L8 6.586l5.293-5.293a1 1 0 111.414 1.414L9.414 8l5.293 5.293a1 1 0 01-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 01-1.414-1.414L6.586 8 1.293 2.707a1 1 0 010-1.414z">
                                    </path>
                                </svg>
                                <!-- <i class="fas fa-times"></i> -->
                            </Button>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 px-6 py-3 dark:border-gray-700">
                        <p class="text-semibold text-base">Color Scheme</p>
                        <div class="flex flex-row">
                            <div
                                class="relative me-3 mt-0.5 inline-block w-8 select-none py-3 align-middle transition duration-200 ease-in">
                                <input type="checkbox" onclick="themeSettingUpdate(this,'color_scheme')"
                                    @checked($theme_setting->color_scheme == 'dark') value="dark" name="lightdark" id="lightdark"
                                    class="toggle-checkbox absolute block h-5 w-5 cursor-pointer appearance-none rounded-full border-2 bg-white dark:border-gray-700 dark:bg-gray-900" />
                                <label for="lightdark"
                                    class="toggle-label block h-5 cursor-pointer overflow-hidden rounded-full bg-gray-300 dark:bg-gray-700"></label>
                            </div>
                            <p class="self-center text-sm text-gray-500">Light and Dark</p>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 px-6 py-3 dark:border-gray-700">
                        <p class="text-semibold text-base">Sidebar Color</p>
                        <div class="flex flex-row">
                            <div
                                class="relative me-3 mt-0.5 inline-block w-8 select-none py-3 align-middle transition duration-200 ease-in">
                                <input type="checkbox" @checked($theme_setting->sidebar_color == 'sidebar-dark')
                                    onclick="themeSettingUpdate(this,'sidebar_color')" value="sidebar-dark"
                                    name="sidebar_color" id="sidecolor"
                                    class="toggle-checkbox absolute block h-5 w-5 cursor-pointer appearance-none rounded-full border-2 bg-white dark:border-gray-700 dark:bg-gray-900" />
                                <label for="sidecolor"
                                    class="toggle-label block h-5 cursor-pointer overflow-hidden rounded-full bg-gray-300 dark:bg-gray-700"></label>
                            </div>
                            <p class="self-center text-sm text-gray-500">Light and Dark</p>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 px-6 py-3 dark:border-gray-700">
                        <p class="text-semibold text-base">Direction</p>
                        <div class="flex flex-row">
                            <div
                                class="relative me-3 mt-0.5 inline-block w-8 select-none py-3 align-middle transition duration-200 ease-in">
                                <input type="checkbox" onclick="themeSettingUpdate(this,'direction')" value="rtl"
                                    @checked($theme_setting->direction == 'rtl') name="rtlmode" id="rtlmode"
                                    class="toggle-checkbox absolute block h-5 w-5 cursor-pointer appearance-none rounded-full border-2 bg-white dark:border-gray-700 dark:bg-gray-900" />
                                <label for="rtlmode"
                                    class="toggle-label block h-5 cursor-pointer overflow-hidden rounded-full bg-gray-300 dark:bg-gray-700"></label>
                            </div>
                            <p class="self-center text-sm text-gray-500">LTR and RTL</p>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 px-6 py-3 dark:border-gray-700">
                        <p class="text-semibold text-base">Layout</p>
                        <div class="relative mb-3">
                            <a href="javascript:;"
                                class="mt-2 inline-block self-center rounded bg-gray-100 px-2.5 py-2 text-sm text-gray-500 hover:bg-gray-200 hover:text-indigo-500 dark:bg-gray-900 dark:bg-opacity-20 dark:hover:bg-opacity-60">Default</a>
                            {{-- <a href="/layout-compact.html" class="inline-block py-2 px-2.5 mt-2 rounded text-sm text-gray-500 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20 dark:hover:bg-opacity-60 hover:text-indigo-500 hover:bg-gray-200 self-center">Compact</a>
                <a href="/layout-topnav.html" class="inline-block py-2 px-2.5 mt-2 rounded text-sm text-gray-500 bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20 dark:hover:bg-opacity-60 hover:text-indigo-500 hover:bg-gray-200 self-center">Topnav</a> --}}
                        </div>
                    </div>
                    <div id="customcolor" class="border-b border-gray-200 px-6 py-3 dark:border-gray-700">
                        <p class="text-semibold text-base">Primary Color</p>
                        <div class="relative my-3">

                            <input id="custred" title="red" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-red"
                                @checked($theme_setting->primary_color == 'theme-red')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-red-500 p-3 hover:opacity-90">

                            <input id="custyellow" title="yellow" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-yellow"
                                @checked($theme_setting->primary_color == 'theme-yellow')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-yellow-500 p-3 hover:opacity-90">

                            <input id="custgreen" title="green" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-green"
                                @checked($theme_setting->primary_color == 'theme-green')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-green-500 p-3 hover:opacity-90">

                            <input id="custblue" title="blue" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-blue"
                                @checked($theme_setting->primary_color == 'theme-blue')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-blue-500 p-3 hover:opacity-90">

                            <input id="custpurple" title="purple" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-purple"
                                @checked($theme_setting->primary_color == 'theme-purple')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-purple-500 p-3 hover:opacity-90">

                            <input id="custpink" title="pink" type="radio" name="primary_color"
                                onclick="themeSettingUpdate(this,'primary_color')" value="theme-pink"
                                @checked($theme_setting->primary_color == 'theme-pink')
                                class="me-1 inline-block h-2 w-2 cursor-pointer rounded-full bg-pink-500 p-3 hover:opacity-90">

                            <div id="custindigo" title="reset color" class="inline-block cursor-pointer align-middle"
                                @click="resetColors()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </nav>
            </div>
        </li>
        <!-- End Customizer (Only for demo purpose) -->


        <!-- messages -->
        {{-- message <li x-data="{ open: false }" class="relative">
            <a href="javascript:;" title="Message" class="flex rounded-full px-4 py-3 text-sm focus:outline-none"
                id="messages" @click="open = ! open">
                <div class="relative inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope h-6 w-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z">
                        </path>
                    </svg>
                    <!-- <i class="fas fa-envelope text-2xl"></i> -->
                    <span
                        class="absolute -end-1 -top-2 flex justify-center rounded-full bg-pink-500 px-1 text-center text-xs text-white"><span
                            class="align-self-center">3</span></span>
                </div>
            </a>

            <div x-show="open" @click.outside="open = false"
                x-transition:enter="transition-all duration-200 ease-out"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute -end-24 top-full z-50 w-72 rounded border bg-white py-0.5 text-start shadow-md dark:border-gray-700 dark:bg-gray-800 sm:-end-28 md:end-0"
                style="display: none;">
                <div class="border-b border-gray-200 p-3 font-normal dark:border-gray-700">
                    <div class="relative">
                        <div class="font-bold">Messages</div>
                        <div x-data="{ open: false }" class="absolute end-0 top-0">
                            <a @click="open = ! open" href="javascript:;" class="me-2 inline-block"
                                title="Search message">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-search inline-block h-4 w-4" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                                <!-- <i class="fas fa-search"></i> -->
                            </a>
                            <div x-show="open" @click.outside="open = false"
                                class="absolute end-0 z-10 origin-top-right rounded bg-white dark:bg-gray-700"
                                style="min-width:16rem">
                                <form class="inline-block w-full">
                                    <div class="relative flex w-full flex-wrap items-stretch">
                                        <input type="text"
                                            class="relative max-w-full flex-shrink flex-grow overflow-x-auto rounded-s border border-gray-100 bg-gray-100 px-4 py-2 text-sm leading-5 text-gray-800 focus:border-gray-200 focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:focus:border-gray-600"
                                            placeholder="Search messages…" aria-label="Search">
                                        <div class="-me-px flex">
                                            <button
                                                class="-ms-1 flex items-center rounded-e border border-indigo-500 bg-indigo-500 px-4 py-2 leading-5 text-gray-100 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white hover:ring-0 focus:border-indigo-600 focus:bg-indigo-600 focus:outline-none focus:ring-0"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65"
                                                        y2="16.65"></line>
                                                </svg>
                                                <!-- <i class="fas fa-search"></i> -->
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="/#" class="me-2 inline-block" title="Mark all as read">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-envelope-open inline-block h-4 w-4" viewBox="0 0 16 16">
                                    <path
                                        d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.818l5.724 3.465L8 8.917l1.276.766L15 6.218V5.4a1 1 0 0 0-.53-.882l-6-3.2zM15 7.388l-4.754 2.877L15 13.117v-5.73zm-.035 6.874L8 10.083l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738zM1 13.117l4.754-2.852L1 7.387v5.73zM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2z" />
                                </svg>
                                <!-- <i class="fas fa-envelope-open"></i> -->
                            </a>
                            <a href="/#" class="me-2 inline-block" title="New message">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-pencil-square inline-block h-4 w-4" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                <!-- <i class="fas fa-edit"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scrollbars show max-h-60 overflow-y-auto">

                    <a href="">
                        <div
                            class="flex flex-row flex-wrap items-center border-b border-gray-200 bg-gray-50 py-2 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:bg-opacity-40 dark:hover:bg-opacity-20">
                            <div class="w-1/4 max-w-full flex-shrink px-2 text-center">
                                <div class="relative">
                                    <img src="{{ asset('src/img/avatar/avatar2.png') }}"
                                        class="mx-auto h-10 w-10 rounded-full" alt="Daniel Esteban">
                                    <span title="online"
                                        class="absolute -bottom-0.5 end-2 flex h-3 w-3 justify-center rounded-full border border-white bg-green-500 text-center"></span>
                                </div>
                            </div>
                            <div class="w-3/4 max-w-full flex-shrink px-2">
                                <div class="text-sm font-bold">Daniel Esteban</div>
                                <div class="mt-1 text-sm text-gray-500">What do you think about this project?</div>
                                <div class="mt-1 text-sm text-gray-500">12m ago</div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="p-3 text-center font-normal">
                    <a href="/#" class="hover:underline">Show all Messages</a>
                </div>
            </div>
        </li> message --}}

        <!-- notification -->
        {{-- noty <li x-data="{ open: false }" class="relative">
            <a title="Notification" href="javascript:;"
                class="flex rounded-full px-4 py-3 text-sm focus:outline-none" id="notify" @click="open = ! open">
                <div class="relative inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell h-6 w-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                    <!-- <i class="fas fa-bell text-2xl"></i> -->
                    <span
                        class="absolute -end-1 -top-2 flex justify-center rounded-full bg-pink-500 px-1 text-center text-xs text-white"><span
                            class="align-self-center">1</span></span>
                </div>
            </a>

            <div x-show="open" @click.outside="open = false"
                x-transition:enter="transition-all duration-200 ease-out"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute -end-16 top-full z-50 w-72 rounded border bg-white py-0.5 text-start shadow-md dark:border-gray-700 dark:bg-gray-800 md:end-0"
                style="display: none;">
                <div class="border-b border-gray-200 p-3 font-normal dark:border-gray-700">
                    <div class="relative">
                        <div class="font-bold">Notifications</div>
                        <div class="absolute end-0 top-0">
                            <a href="/#" class="me-2 inline-block" title="Clear all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-trash inline-block h-4 w-4" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                                <!-- <i class="fas fa-trash-alt"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="scrollbars show max-h-60 overflow-y-auto">
                    <a class="relative" href="/#">
                        <div
                            class="flex flex-row flex-wrap items-center border-b border-gray-200 bg-gray-50 py-2 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-900 dark:bg-opacity-40 dark:hover:bg-opacity-20">
                            <div class="w-1/4 max-w-full flex-shrink px-2 text-center">
                                <div class="mx-auto flex h-8 w-8 justify-center rounded-full bg-indigo-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-calendar4-event h-4 w-4 self-center" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                        <path
                                            d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                    </svg>
                                    <!-- <i class="fas fa-calendar self-center"></i> -->
                                </div>
                            </div>
                            <div class="w-3/4 max-w-full flex-shrink px-2">
                                <div class="text-sm font-bold">Event will coming</div>
                                <div class="mt-1 text-sm text-gray-500">Meeting with Mr.John Navas at:10.00Am</div>
                                <div class="mt-1 text-sm text-gray-500">1h ago</div>
                            </div>
                        </div>
                    </a>
                    <a class="relative" href="/#">
                        <div
                            class="flex flex-row flex-wrap items-center border-b border-gray-200 py-2 hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:bg-opacity-20">
                            <div class="w-1/4 max-w-full flex-shrink px-2 text-center">
                                <div class="mx-auto flex h-8 w-8 justify-center rounded-full bg-indigo-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-hand-thumbs-up h-4 w-4 self-center"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                    </svg>
                                    <!-- <i class="fas fa-thumbs-up self-center"></i> -->
                                </div>
                            </div>
                            <div class="w-3/4 max-w-full flex-shrink px-2">
                                <div class="mt-1 text-sm text-gray-500"><b
                                        class="text-gray-600 dark:text-gray-400">Daniel</b> like your post: <b
                                        class="text-gray-600 dark:text-gray-400">Hello World!</b></div>
                                <div class="mt-1 text-sm text-gray-500">3h ago</div>
                            </div>
                        </div>
                    </a>
                    <a class="relative" href="/#">
                        <div
                            class="flex flex-row flex-wrap items-center border-b border-gray-200 py-2 hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:bg-opacity-20">
                            <div class="w-1/4 max-w-full flex-shrink px-2 text-center">
                                <div class="mx-auto flex h-8 w-8 justify-center rounded-full bg-indigo-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-hdd-stack h-4 w-4 self-center" viewBox="0 0 16 16">
                                        <path
                                            d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                    </svg>
                                    <!-- <i class="fas fa-server self-center"></i> -->
                                </div>
                            </div>
                            <div class="w-3/4 max-w-full flex-shrink px-2">
                                <div class="text-sm font-bold">Server maintenance</div>
                                <div class="mt-1 text-sm text-gray-500">Server maintenance at:07.00Am</div>
                                <div class="mt-1 text-sm text-gray-500">8h ago</div>
                            </div>
                        </div>
                    </a>
                    <a class="relative" href="/#">
                        <div
                            class="flex flex-row flex-wrap items-center border-b border-gray-200 py-2 hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-900 dark:hover:bg-opacity-20">
                            <div class="w-1/4 max-w-full flex-shrink px-2 text-center">
                                <div class="mx-auto flex h-8 w-8 justify-center rounded-full bg-indigo-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chat-left h-4 w-4 self-center"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    </svg>
                                    <!-- <i class="fas fa-comment self-center"></i> -->
                                </div>
                            </div>
                            <div class="w-3/4 max-w-full flex-shrink px-2">
                                <div class="mt-1 text-sm text-gray-500"><b
                                        class="text-gray-600 dark:text-gray-400">Carlos</b> comment in your post: <b
                                        class="text-gray-600 dark:text-gray-400">Hello World!</b></div>
                                <div class="mt-1 text-sm text-gray-500">1d ago</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-3 text-center font-normal">
                    <a href="/#" class="hover:underline">Show all Notifications</a>
                </div>
            </div>
        </li> noty --}}

        <!-- profile -->
        <li x-data="{ open: false }" class="relative">
            <a href="javascript:;" class="flex rounded-full px-3 text-sm focus:outline-none" id="user-menu-button"
                @click="open = ! open">
                <div class="relative">
                    @if (auth()->user()->img)
                        <img class="h-10 w-10 rounded-full border border-gray-700 bg-gray-700"
                            src="{{ auth()->user()->img }}" alt="{{ auth()->user()->name }}">
                    @else
                        <x-profile-avatar class="h-[48px] w-[48px]" />
                    @endif

                    <span title="online"
                        class="absolute -bottom-0.5 end-1 flex h-3 w-3 justify-center rounded-full border border-white bg-green-500 text-center"></span>
                </div>
                <span class="ms-1 hidden self-center md:block">{{ auth()->user()->name }}</span>
            </a>
            <ul x-show="open" @click.outside="open = false"
                x-transition:enter="transition-all duration-200 ease-out"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition-all duration-200 ease-in"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute end-0 top-full z-50 min-w-[12rem] origin-top-right rounded border bg-white py-0.5 text-start shadow-md dark:border-gray-700 dark:bg-gray-800"
                style="display: none;">
                <li class="relative">
                    <div class="-mx-4 flex flex-row flex-wrap items-center px-3 py-4">
                        <div class="w-1/3 max-w-full flex-shrink px-4">
                            @if (auth()->user()->img)
                                <img class="h-10 w-10 rounded-full border border-gray-700 bg-gray-700"
                                    src="{{ auth()->user()->img }}" alt="{{ auth()->user()->name }}">
                            @else
                                <x-profile-avatar class="h-14 w-14" />
                            @endif
                        </div>
                        <div class="w-2/3 max-w-full flex-shrink px-4 ps-1">
                            <div class="font-bold"><a href="/#"
                                    class="text-gray-800 hover:text-indigo-500 dark:text-gray-300">{{ auth()->user()->name }}</a>
                            </div>
                            <div class="text-gray mt-1 text-sm">{{ auth()->user()->profession }}</div>
                        </div>
                    </div>
                </li>

                <li class="relative">
                    <hr class="my-0 border-t border-gray-200 dark:border-gray-700">
                </li>

                <li class="relative">
                    <a class="clear-both block w-full whitespace-nowrap px-6 py-2 hover:text-indigo-500"
                        href="{{ route('admin.profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-gear me-2 inline h-4 w-4" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                        <!-- <i class="fas fa-cog me-2"></i> --> Settings &amp; Privacy
                    </a>
                </li>
                <!-- Help and support  -->
                {{-- support <li class="relative">
                    <a class="clear-both block w-full whitespace-nowrap px-6 py-2 hover:text-indigo-500"
                        href="/#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-question-circle me-2 inline h-4 w-4" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                        </svg>
                        <!-- <i class="fas fa-question-circle me-2"></i> --> Help &amp; Support
                    </a>
                </li> support --}}

                <li class="relative">
                    <hr class="my-0 border-t border-gray-200 dark:border-gray-700">
                </li>
                <li class="relative">
                    <form action="{{ route('admin.profile.logout') }}" method="POST">
                        @csrf
                        <button class="clear-both block w-full whitespace-nowrap px-6 py-2 hover:text-indigo-500"
                            href="/#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-box-arrow-in-right me-2 inline h-4 w-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            Sign out
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>

</nav>
