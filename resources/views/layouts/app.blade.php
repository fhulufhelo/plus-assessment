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
    <body class="antialiased font-sans bg-bar-gray overflow-hidden">
    <div>
        <div style="min-height: 640px;">
            <div x-data="{ open: false }"
                 @keydown.window.escape="open = false"
                 class="relative h-screen flex overflow-hidden bg-bar-gray">

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
                         class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-secondary" style="display: none;">

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

                                <a href="/users" class="bg-primary text-secondary group flex items-center px-2 py-2 text-base font-medium">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 29.3333H25.3333C26.0406 29.3333 26.7189 29.0524 27.219 28.5523C27.719 28.0522 28 27.3739 28 26.6667V5.33332C28 4.62608 27.719 3.9478 27.219 3.4477C26.7189 2.94761 26.0406 2.66666 25.3333 2.66666H6.66667C5.95942 2.66666 5.28115 2.94761 4.78105 3.4477C4.28095 3.9478 4 4.62608 4 5.33332V26.6667C4 27.3739 4.28095 28.0522 4.78105 28.5523C5.28115 29.0524 5.95942 29.3333 6.66667 29.3333H8ZM16 6.66532C18.196 6.66532 20 8.46666 20 10.6653C20 12.8627 18.196 14.6667 16 14.6667C13.804 14.6667 12 12.8627 12 10.6653C12 8.46666 13.804 6.66532 16 6.66532ZM8 23C8 20.0413 11.6067 17 16 17C20.3933 17 24 20.0413 24 23V24H8V23Z" fill="black"/>
                                    </svg>
                                    Users
                                </a>

                                <a href="#" class="text-white hover:text-white hover:bg-primary group flex items-center px-2 py-2 text-base font-medium" >
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.80002 3.20001C8.1635 3.20001 7.55306 3.45287 7.10297 3.90296C6.65288 4.35304 6.40002 4.96349 6.40002 5.60001V26.4C6.40002 27.0365 6.65288 27.647 7.10297 28.0971C7.55306 28.5472 8.1635 28.8 8.80002 28.8H23.2C23.8365 28.8 24.447 28.5472 24.8971 28.0971C25.3472 27.647 25.6 27.0365 25.6 26.4V5.60001C25.6 4.96349 25.3472 4.35304 24.8971 3.90296C24.447 3.45287 23.8365 3.20001 23.2 3.20001H8.80002ZM20.144 11.1872L20 11.2H12C11.8001 11.2004 11.6073 11.1259 11.4596 10.9912C11.3118 10.8565 11.2199 10.6714 11.2018 10.4723C11.1838 10.2732 11.2409 10.0746 11.362 9.91548C11.4831 9.75641 11.6593 9.64843 11.856 9.61281L12 9.60001H20C20.1999 9.59964 20.3927 9.67414 20.5405 9.80883C20.6882 9.94351 20.7802 10.1286 20.7982 10.3277C20.8163 10.5268 20.7592 10.7255 20.6381 10.8845C20.517 11.0436 20.3407 11.1516 20.144 11.1872ZM20.144 16.7872L20 16.8H12C11.8001 16.8004 11.6073 16.7259 11.4596 16.5912C11.3118 16.4565 11.2199 16.2714 11.2018 16.0723C11.1838 15.8732 11.2409 15.6746 11.362 15.5155C11.4831 15.3564 11.6593 15.2484 11.856 15.2128L12 15.2H20C20.1999 15.1996 20.3927 15.2741 20.5405 15.4088C20.6882 15.5435 20.7802 15.7286 20.7982 15.9277C20.8163 16.1268 20.7592 16.3255 20.6381 16.4845C20.517 16.6436 20.3407 16.7516 20.144 16.7872ZM20.144 22.3872L20 22.4H12C11.8001 22.4004 11.6073 22.3259 11.4596 22.1912C11.3118 22.0565 11.2199 21.8714 11.2018 21.6723C11.1838 21.4732 11.2409 21.2746 11.362 21.1155C11.4831 20.9564 11.6593 20.8484 11.856 20.8128L12 20.8H20C20.1999 20.7996 20.3927 20.8741 20.5405 21.0088C20.6882 21.1435 20.7802 21.3286 20.7982 21.5277C20.8163 21.7268 20.7592 21.9255 20.6381 22.0845C20.517 22.2436 20.3407 22.3516 20.144 22.3872Z" fill="white"/>
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
                        <div class="flex flex-col flex-grow bg-secondary pt-5 pb-4 overflow-y-auto">
                            <div class="flex items-center flex-shrink-0 px-4">
                                <img class="h-8 w-auto" src="https://plusnarrative.com/2021/wp-content/themes/plusnarrative/public/img/logo-plusnarrative.svg" alt="plusnarrative logo">
                            </div>
                            <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                                <div class="px-2 space-y-1">

                                    <a href="/users" class="bg-primary text-secondary group flex items-center px-2 py-2 text-sm leading-6 font-medium" x-state:on="Current" x-state:off="Default" aria-current="page" x-state-description="Current: &quot;bg-cyan-800 text-white&quot;, Default: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 29.3333H25.3333C26.0406 29.3333 26.7189 29.0524 27.219 28.5523C27.719 28.0522 28 27.3739 28 26.6667V5.33332C28 4.62608 27.719 3.9478 27.219 3.4477C26.7189 2.94761 26.0406 2.66666 25.3333 2.66666H6.66667C5.95942 2.66666 5.28115 2.94761 4.78105 3.4477C4.28095 3.9478 4 4.62608 4 5.33332V26.6667C4 27.3739 4.28095 28.0522 4.78105 28.5523C5.28115 29.0524 5.95942 29.3333 6.66667 29.3333H8ZM16 6.66532C18.196 6.66532 20 8.46666 20 10.6653C20 12.8627 18.196 14.6667 16 14.6667C13.804 14.6667 12 12.8627 12 10.6653C12 8.46666 13.804 6.66532 16 6.66532ZM8 23C8 20.0413 11.6067 17 16 17C20.3933 17 24 20.0413 24 23V24H8V23Z" fill="black"/>
                                        </svg>
                                        Users
                                    </a>

                                    <a href="#" class="text-white hover:text-white hover:bg-primary group flex items-center px-2 py-2 text-sm leading-6 font-medium" x-state-description="undefined: &quot;bg-cyan-800 text-white&quot;, undefined: &quot;text-cyan-100 hover:text-white hover:bg-cyan-600&quot;">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.80002 3.20001C8.1635 3.20001 7.55306 3.45287 7.10297 3.90296C6.65288 4.35304 6.40002 4.96349 6.40002 5.60001V26.4C6.40002 27.0365 6.65288 27.647 7.10297 28.0971C7.55306 28.5472 8.1635 28.8 8.80002 28.8H23.2C23.8365 28.8 24.447 28.5472 24.8971 28.0971C25.3472 27.647 25.6 27.0365 25.6 26.4V5.60001C25.6 4.96349 25.3472 4.35304 24.8971 3.90296C24.447 3.45287 23.8365 3.20001 23.2 3.20001H8.80002ZM20.144 11.1872L20 11.2H12C11.8001 11.2004 11.6073 11.1259 11.4596 10.9912C11.3118 10.8565 11.2199 10.6714 11.2018 10.4723C11.1838 10.2732 11.2409 10.0746 11.362 9.91548C11.4831 9.75641 11.6593 9.64843 11.856 9.61281L12 9.60001H20C20.1999 9.59964 20.3927 9.67414 20.5405 9.80883C20.6882 9.94351 20.7802 10.1286 20.7982 10.3277C20.8163 10.5268 20.7592 10.7255 20.6381 10.8845C20.517 11.0436 20.3407 11.1516 20.144 11.1872ZM20.144 16.7872L20 16.8H12C11.8001 16.8004 11.6073 16.7259 11.4596 16.5912C11.3118 16.4565 11.2199 16.2714 11.2018 16.0723C11.1838 15.8732 11.2409 15.6746 11.362 15.5155C11.4831 15.3564 11.6593 15.2484 11.856 15.2128L12 15.2H20C20.1999 15.1996 20.3927 15.2741 20.5405 15.4088C20.6882 15.5435 20.7802 15.7286 20.7982 15.9277C20.8163 16.1268 20.7592 16.3255 20.6381 16.4845C20.517 16.6436 20.3407 16.7516 20.144 16.7872ZM20.144 22.3872L20 22.4H12C11.8001 22.4004 11.6073 22.3259 11.4596 22.1912C11.3118 22.0565 11.2199 21.8714 11.2018 21.6723C11.1838 21.4732 11.2409 21.2746 11.362 21.1155C11.4831 20.9564 11.6593 20.8484 11.856 20.8128L12 20.8H20C20.1999 20.7996 20.3927 20.8741 20.5405 21.0088C20.6882 21.1435 20.7802 21.3286 20.7982 21.5277C20.8163 21.7268 20.7592 21.9255 20.6381 22.0845C20.517 22.2436 20.3407 22.3516 20.144 22.3872Z" fill="white"/>
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
