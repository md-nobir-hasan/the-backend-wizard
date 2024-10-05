<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title  -->
    <title>@stack('title') {{ config('app.name') }}</title>
    <meta name="description" content="A super laravel admin panel">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
    @include('backend.partials.css')
    @stack('css')
</head>

<body class="font-sans text-base font-normal text-gray-600 bg-gray-100 dark:text-gray-400 dark:bg-black">
    <!-- wrapper -->
    <div x-data="{ sidebar: false }" class="overflow-x-hidden wrapper">

        {{-- Sidebar.blade.php --}}
        <!-- sidebar -->
        @include('backend.partials.sidebar')

        <div x-bind:aria-expanded="sidebar"
            :class="{ 'ms-64 -me-64 md:ms-0 md:me-0': sidebar, 'ms-0 me-0 md:ms-64': !(sidebar) }"
            class="flex flex-col min-h-screen transition-all duration-500 ease-in-out me-0 md:ms-64">
            <!-- Navbar -->
            {{-- navbar.blade.php  --}}
            @include('backend.partials.navbar')
            <!-- End Navbar -->
            <div class="flex flex-col min-h-screen ">
                <main class="pt-20 -mt-2 mb-1">
                    @yield('main')
                </main>
                @include('backend.partials.footer')
            </div>
        </div>
    </div>
    @include('backend.partials.js')
    @stack('js')
</body>

</html>
