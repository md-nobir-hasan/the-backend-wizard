@extends('backend.layouts.app')

@push('title')
Dashboard -
@endpush

@push('css')

@endpush

@push('js')
@vite([
    'resources/js/admin/chart/chart.min.js',
    'resources/js/admin/chart/ecommerce.js',
])
@endpush
@section('main')
    <div class="py-2 mx-auto sm:px-2">
        <!-- row -->
        <div class="flex flex-row flex-wrap">
            <div class="flex-shrink w-full max-w-full px-4">
                <p class="mt-3 mb-5 text-xl font-bold">Ecommerce</p>
            </div>
            <div class="flex-shrink w-full max-w-full px-4 mb-6 sm:w-1/2 lg:w-1/4">
                <div class="h-full bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div x-data="{ tooltips: false }" class="relative px-6 pt-6 text-sm font-semibold">
                        Total Orders
                        <div x-on:mouseover="tooltips = true" x-on:mouseleave="tooltips = false"
                            class="text-green-500 ltr:float-right rtl:float-left">
                            +12%
                            <div class="absolute top-auto mb-3 bottom-full"
                                x-show.transition.origin.top="tooltips" style="display: none;">
                                <div
                                    class="z-40 w-32 p-2 -mb-1 text-sm leading-tight text-center text-white bg-black rounded-lg shadow-lg">
                                    Since last month
                                </div>
                                <div
                                    class="absolute bottom-0 w-1 p-1 -mb-2 transform -rotate-45 bg-black ltr:ml-6 rtl:mr-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between px-6 py-4">
                        <div
                            class="relative self-center text-center text-pink-500 bg-pink-100 rounded-full w-14 h-14 dark:bg-pink-900 dark:bg-opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute w-8 h-8 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bi bi-cart3"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="self-center text-3xl">421</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <a class="text-sm hover:text-indigo-500" href="/#">View more...</a>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full px-4 mb-6 sm:w-1/2 lg:w-1/4">
                <div class="h-full bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div x-data="{ tooltips: false }" class="relative px-6 pt-6 text-sm font-semibold">
                        Total Sales
                        <div x-on:mouseover="tooltips = true" x-on:mouseleave="tooltips = false"
                            class="text-green-500 ltr:float-right rtl:float-left">
                            +15%
                            <div class="absolute top-auto mb-3 bottom-full"
                                x-show.transition.origin.top="tooltips" style="display: none;">
                                <div
                                    class="z-40 w-32 p-2 -mb-1 text-sm leading-tight text-center text-white bg-black rounded-lg shadow-lg">
                                    Since last month
                                </div>
                                <div
                                    class="absolute bottom-0 w-1 p-1 -mb-2 transform -rotate-45 bg-black ltr:ml-6 rtl:mr-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between px-6 py-4">
                        <div
                            class="relative self-center text-center text-yellow-500 bg-yellow-100 rounded-full w-14 h-14 dark:bg-yellow-900 dark:bg-opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute w-8 h-8 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bi bi-credit-card"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                <path
                                    d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                            </svg>
                        </div>
                        <h2 class="self-center text-3xl"><span>$</span>31K</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <a class="text-sm hover:text-indigo-500" href="/#">View more...</a>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full px-4 mb-6 sm:w-1/2 lg:w-1/4">
                <div class="h-full bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div x-data="{ tooltips: false }" class="relative px-6 pt-6 text-sm font-semibold">
                        New Customers
                        <div x-on:mouseover="tooltips = true" x-on:mouseleave="tooltips = false"
                            class="text-pink-500 ltr:float-right rtl:float-left">
                            -5%
                            <div class="absolute top-auto mb-3 bottom-full" x-cloak
                                x-show.transition.origin.top="tooltips">
                                <div
                                    class="z-40 w-32 p-2 -mb-1 text-sm leading-tight text-center text-white bg-black rounded-lg shadow-lg">
                                    Since last month
                                </div>
                                <div
                                    class="absolute bottom-0 w-1 p-1 -mb-2 transform -rotate-45 bg-black ltr:ml-6 rtl:mr-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between px-6 py-4">
                        <div
                            class="relative self-center text-center text-green-500 bg-green-100 rounded-full w-14 h-14 dark:bg-green-900 dark:bg-opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute w-8 h-8 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bi bi-person"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>
                        <h2 class="self-center text-3xl">1.2K</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <a class="text-sm hover:text-indigo-500" href="/#">View more...</a>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full px-4 mb-6 sm:w-1/2 lg:w-1/4">
                <div class="h-full bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div x-data="{ tooltips: false }" class="relative px-6 pt-6 text-sm font-semibold">
                        Users Online <span
                            class="w-2 h-2 mt-1 bg-green-500 rounded-full ltr:float-right rtl:float-left animate-pulse"></span>
                    </div>
                    <div class="flex flex-row justify-between px-6 py-4">
                        <div
                            class="relative self-center text-center text-indigo-500 bg-indigo-100 rounded-full w-14 h-14 dark:bg-indigo-900 dark:bg-opacity-40">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="absolute w-8 h-8 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bi bi-people"
                                viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                            </svg>
                        </div>
                        <h2 class="self-center text-3xl">602</h2>
                    </div>
                    <div class="px-6 pb-6">
                        <a class="text-sm hover:text-indigo-500" href="/#">View more...</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="flex flex-row flex-wrap">
            <div class="flex-shrink w-full max-w-full px-4 mb-6 lg:w-1/2">
                <!-- visitor -->
                <div class="p-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row justify-between pb-6">
                        <div class="flex flex-col">
                            <h3 class="text-base font-bold">Monthly Sales</h3>
                            <span class="text-sm text-gray-500">Monthly Traffic and Sales</span>
                        </div>
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = ! open"
                                class="text-gray-500 transition-colors duration-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none hover:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-6 h-6 bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute z-10 origin-top-right bg-white border border-gray-200 rounded ltr:right-0 rtl:left-0 rounded-t-non dark:bg-gray-800 dark:border-gray-700"
                                style="min-width:12rem">
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Daily</a>
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Weekly</a>
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Yearly</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <canvas class="max-w-100" id="BarChart"></canvas>
                    </div>
                </div>

                <!-- Paid ads -->
                <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="relative">
                        <table class="w-full text-sm table-sm ltr:text-left rtl:text-right">
                            <thead>
                                <tr class="border-b dark:border-gray-700">
                                    <th>
                                        Platform
                                    </th>
                                    <th>
                                        Visitors
                                    </th>
                                    <th>
                                        Ads budget
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Facebook Ads
                                    </td>
                                    <td>
                                        1,520
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="ltr:mr-2 rtl:ml-2">78%</span>
                                            <div class="relative w-full">
                                                <div
                                                    class="flex h-2 overflow-hidden text-xs bg-indigo-300 rounded">
                                                    <div style="width:78%"
                                                        class="flex flex-col justify-center text-center text-white bg-indigo-500 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Google Ads
                                    </td>
                                    <td>
                                        980
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="ltr:mr-2 rtl:ml-2">65%</span>
                                            <div class="relative w-full">
                                                <div
                                                    class="flex h-2 overflow-hidden text-xs bg-pink-300 rounded">
                                                    <div style="width:65%"
                                                        class="flex flex-col justify-center text-center text-white bg-pink-500 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Microsoft Ads
                                    </td>
                                    <td>
                                        540
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="ltr:mr-2 rtl:ml-2">55%</span>
                                            <div class="relative w-full">
                                                <div
                                                    class="flex h-2 overflow-hidden text-xs bg-yellow-300 rounded">
                                                    <div style="width:55%"
                                                        class="flex flex-col justify-center text-center text-white bg-yellow-500 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tiktok Ads
                                    </td>
                                    <td>
                                        350
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <span class="ltr:mr-2 rtl:ml-2">40%</span>
                                            <div class="relative w-full">
                                                <div
                                                    class="flex h-2 overflow-hidden text-xs bg-gray-400 rounded">
                                                    <div style="width:40%"
                                                        class="flex flex-col justify-center text-center text-white bg-gray-700 shadow-none whitespace-nowrap">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full px-4 mb-6 lg:w-1/2">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row justify-between pb-6">
                        <div class="flex flex-col">
                            <h3 class="text-base font-bold">Traffic Source</h3>
                            <span class="text-sm text-gray-500">Monthly traffic source</span>
                        </div>
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = ! open"
                                class="text-gray-500 transition-colors duration-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none hover:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-6 h-6 bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute z-10 origin-top-right bg-white border border-gray-200 rounded ltr:right-0 rtl:left-0 rounded-t-non dark:bg-gray-800 dark:border-gray-700"
                                style="min-width:12rem">
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Daily</a>
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Weekly</a>
                                <a class="block px-3 py-2 hover:bg-gray-100 focus:bg-gray-100 dark:hover:bg-gray-900 dark:hover:bg-opacity-20 dark:focus:bg-gray-900"
                                    href="/#">Yearly</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-full mx-auto text-center sm:w-2/3 lg:w-full">
                        <canvas class="max-w-100" id="DoughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="flex flex-row flex-wrap">
            <!-- revenue -->
            <div class="flex-shrink w-full max-w-full px-4 mb-6 lg:w-2/3">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row justify-between pb-6">
                        <div class="flex flex-col">
                            <h3 class="text-base font-bold">Revenue</h3>
                            <span class="text-sm font-semibold text-gray-500">Today's Earning: <span
                                    class="text-green-500">$1,570.30</span></span>
                        </div>
                    </div>
                    <div class="relative">
                        <canvas class="max-w-100" id="LineChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- product -->
            <div class="flex-shrink w-full max-w-full px-4 mb-6 lg:w-1/3">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="mb-2">
                        <table class="w-full text-sm table-sm ltr:text-left rtl:text-right">
                            <thead>
                                <tr class="border-b dark:border-gray-700">
                                    <th>
                                        Best Seller
                                    </th>
                                    <th>
                                        Sales
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="/#" class="hover:text-indigo-500">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('src/img/products/product1.jpg') }}"
                                                        alt="product images">
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4">
                                                    <div class="leading-5">
                                                        Nike Women's Race Running Shoe
                                                    </div>
                                                    <div class="text-xs leading-5 text-gray-500">
                                                        Women shoes
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="leading-5 text-green-700">$4,345</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/#" class="hover:text-indigo-500">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('src/img/products/product2.jpg') }}"
                                                        alt="product images">
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4">
                                                    <div class="leading-5">
                                                        Nike Womens Free RN Flyknit 2018
                                                    </div>
                                                    <div class="text-xs leading-5 text-gray-500">
                                                        Women shoes
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="leading-5 text-green-700">$3,235</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/#" class="hover:text-indigo-500">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('src/img/products/product3.jpg') }}"
                                                        alt="product images">
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4">
                                                    <div class="leading-5">
                                                        Nike Women's Sneaker Running Shoes
                                                    </div>
                                                    <div class="text-xs leading-5 text-gray-500">
                                                        Women shoes
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="leading-5 text-green-700">$1,545</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="/#" class="hover:text-indigo-500">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('src/img/products/product4.jpg') }}"
                                                        alt="product images">
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4">
                                                    <div class="leading-5">
                                                        Nike Women's Gymnastics Tennis Shoes
                                                    </div>
                                                    <div class="text-xs leading-5 text-gray-500">
                                                        Women shoes
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="leading-5 text-green-700">$1,045</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="flex flex-row flex-wrap">
            <div class="flex-shrink w-full max-w-full px-4 mb-6">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row justify-between pb-2">
                        <div class="flex flex-col">
                            <h3 class="text-base font-bold">Latest Orders</h3>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="w-full text-gray-500 table-sorter table-bordered-bottom dark:text-gray-400">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-900 dark:bg-opacity-40">
                                    <th>
                                        Order ID
                                    </th>
                                    <th class="hidden lg:table-cell">
                                        Customer
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th class="hidden lg:table-cell">
                                        Date Added
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th data-sortable="false">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12637</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                John Thomas
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, USA
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-pink-700 bg-pink-100 rounded-full dark:bg-opacity-80">
                                            Paid</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 09, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$79</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12636</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Daniel
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                San Francisco, USA
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-purple-700 bg-purple-100 rounded-full dark:bg-opacity-80">
                                            Processing</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 09, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$119</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12635</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Vinjay Khan
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                New Delhi, India
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-yellow-700 bg-yellow-100 rounded-full dark:bg-opacity-80">
                                            Packing</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 09, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$58</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12634</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                David Arya
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                Jakarta, Indonesia
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-green-700 bg-green-100 rounded-full dark:bg-opacity-80">
                                            Shipped</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 09, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$79</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12633</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                William Stone
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                London, UK
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 09, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$158</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12632</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Danile
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$128</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12631</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Romano
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$98</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12630</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Yonanda
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$138</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12629</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Danile
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$128</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12628</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Romano
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$98</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12627</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Yonanda
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$138</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12626</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Danile
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$128</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12625</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Romano
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$98</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="leading-5 uppercase">#inv12624</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="flex flex-row flex-wrap items-center">
                                            <div
                                                class="flex-shrink w-full max-w-full mb-1 font-bold leading-5 text-gray-900 dark:text-gray-300">
                                                Yonanda
                                            </div>
                                            <div
                                                class="flex-shrink w-full max-w-full italic leading-5 text-gray-500">
                                                California, US
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div
                                            class="inline-block px-3 py-1 font-semibold leading-tight text-center text-gray-700 bg-gray-100 rounded-full dark:bg-opacity-80">
                                            Complete</div>
                                    </td>
                                    <td class="hidden lg:table-cell">
                                        <div class="leading-5">May 08, 2025</div>
                                    </td>
                                    <td>
                                        <div class="font-bold leading-5 text-green-700">$138</div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/#"
                                            class="px-3 py-2 mb-3 leading-5 text-center text-gray-100 bg-indigo-500 border border-indigo-500 rounded hover:text-white hover:bg-indigo-600 hover:ring-0 hover:border-indigo-600 focus:bg-indigo-600 focus:border-indigo-600 focus:outline-none focus:ring-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="inline w-4 h-4 bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
