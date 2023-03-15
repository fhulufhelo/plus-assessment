<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gray-800 overflow-hidden">
    <div>
        <div style="min-height: 640px;">
            <div x-data="{ open: false }"
                 @keydown.window.escape="open = false"
                 class="relative h-screen flex overflow-hidden bg-gray-800">

                <div
                    x-show="open"
                    class="fixed inset-0 flex z-40 lg:hidden"
                    x-ref="dialog"
                    aria-modal="true"
                    style="display: none;">

                    <div x-show="open"
                         x-transition:enter="transition-opacity ease-linear duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition-opacity ease-linear duration-300"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true" style="display: none;">
                    </div>

                    <div x-show="open"
                         x-transition:enter="transition ease-in-out duration-300 transform"
                         x-transition:enter-start="-translate-x-full"
                         x-transition:enter-end="translate-x-0"
                         x-transition:leave="transition ease-in-out duration-300 transform"
                         x-transition:leave-start="translate-x-0"
                         x-transition:leave-end="-translate-x-full"
                         class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-900" style="display: none;">

                        <div x-show="open"
                             x-transition:enter="ease-in-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="ease-in-out duration-300"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute top-0 right-0 -mr-12 pt-2" style="display: none;">
                            <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="open = false">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="https://plusnarrative.com/2021/wp-content/themes/plusnarrative/public/img/logo-plusnarrative.svg" alt="plusnarrative logo">
                        </div>
                        <nav class="mt-5 flex-shrink-0 h-full divide-y divide-gray-800 overflow-y-auto" aria-label="Sidebar">
                            <div class="px-2 space-y-1">

                                <a href="/users" class="bg-red-500 text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                    </svg>
                                    Users
                                </a>

                                <a href="#" class="text-white hover:text-white hover:bg-red-600 group flex items-center px-2 py-2 text-base font-medium rounded-md" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-4 flex-shrink-0 h-6 w-6 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>

                                    Pages
                                </a>
                            </div>
                        </nav>
                    </div>

                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>


                <!-- Static sidebar for desktop -->
                <div class="hidden lg:flex lg:flex-shrink-0">
                    <div class="flex flex-col w-64">
                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="flex flex-col flex-grow bg-gray-900 pt-5 pb-4 overflow-y-auto">
                            <div class="flex items-center flex-shrink-0 px-4">
                                <img class="h-8 w-auto" src="https://plusnarrative.com/2021/wp-content/themes/plusnarrative/public/img/logo-plusnarrative.svg" alt="plusnarrative logo">
                            </div>
                            <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                                <div class="px-2 space-y-1">

                                    <a href="/users" class="bg-red-500 text-gray-900 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" x-state:on="Current" x-state:off="Default" aria-current="page" x-state-description="Current: &quot;bg-cyan-800 text-white&quot;, Default: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-900">
                                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                        </svg>
                                        Users
                                    </a>

                                    <a href="#" class="text-white hover:text-white hover:bg-red-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-4 flex-shrink-0 h-6 w-6 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                        </svg>
                                        Pages
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="flex-1 overflow-auto focus:outline-none">
                    <div class="relative z-10 flex-shrink-0 flex lg:border-none">
                        <button type="button" class="px-4 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden" @click="open = true">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                            </svg>
                        </button>

                    </div>
                    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
                        {{ $slot }}
                    </main>
                </div>
            </div>

        </div>
    </div>
    @livewireScripts
    </body>
</html>
