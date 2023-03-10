<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
    <title>@yield('title', 'mahlaba')</title>
</head>
<body>
<div class="bg_black">

</div>
    <div id="header">
        <nav class="bg-gray-600">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="">
                    <div class="flex justify-between items-center">
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20" src="{{ url('images/logo.png') }}" alt="bistro">
                        </div>
                        <div class="">
                            <div class="ml-10 flex items-baseline space-x-4 ">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('home') }}"
                                   class="{{ request()->routeIs('home')
                                            ? 'bg-orange-600 text-white hover:text-white'
                                            : 'text-orange-600 hover:bg-gray-700' }}
                                            px-3 py-2 rounded-md text-sm font-medium flex justify-center items-center gap-1">
                                    <i class="fas fa-solid fa-home "></i>
                                    <span class="hidden md:block">Home</span>
                                </a>

                                <a href="{{ route('plats.index') }}"
                                   class="{{ request()->routeIs('plats.index')
                                    ? 'bg-orange-600 text-white hover:text-white'
                                    : 'text-orange-600 hover:bg-gray-700' }}
                                    px-3 py-2 rounded-md text-sm font-medium flex justify-center items-center gap-2">
                                        <i class="fas fa-solid fa-utensils "></i>
                                        <span class="hidden md:block">Plats</span>
                                </a>

                                <a href="{{ route('about') }}"
                                   class="{{ request()->routeIs('about')
                                    ? 'bg-orange-600 text-white hover:text-white'
                                    : 'text-orange-600 hover:bg-gray-700' }}
                                     px-3 py-2 rounded-md text-sm font-medium flex justify-center items-center gap-2">
                                    <i class="fas fa-solid fa-info"></i>
                                    <span class="hidden md:block">About</span>
                                </a>
                            </div>
                        </div>
                    @auth
                        <div class="flex">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="{{ request()->routeIs('logout') ? 'bg-orange-600 text-white hover:text-white' : 'text-orange-600 hover:bg-gray-700' }} hover:text-white px-3 py-2 rounded-md text-sm font-medium flex justify-center items-center gap-2">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="hidden md:block">logout</span>
                                </button>
                            </form>
                            <div class="ml-4 flex items-center md:ml-6">
                                <div class="relative ml-3">
                                    <div>
                                        <a href="{{ route('profile.index') }}" class="flex max-w-xs items-center rounded-full bg-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="px-4 text-white">{{ Auth::user()->name }}</span>
                                            <img class="h-8 w-8 rounded-full" src="https://imgs.search.brave.com/TJbEC2gu0jg48EgjTbPXP8dKFUXxopHDI9yURY4DoW8/rs:fit:200:200:1/g:ce/aHR0cDovL3d3dy5u/ZXdkZXNpZ25maWxl/LmNvbS9wb3N0cGlj/LzIwMDkvMDkvZ2Vu/ZXJpYy11c2VyLXBy/b2ZpbGVfMzU0MTg0/LnBuZw" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'bg-orange-600 text-white hover:text-white' : 'text-orange-600 hover:bg-gray-700' }} px-3 py-2 rounded-md text-sm font-medium">Register</a>

                            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-orange-600    text-white hover:text-white' : 'text-orange-600 hover:bg-gray-700' }} px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        </div>
                    @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main class=" p-6">

        @yield('breadcrumbs')

        @if(session('success'))
            <div id="toast-success" class="flex items-center w-full p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 mt-4" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('success') }}.</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @elseif(session('error'))
            <div id="toast-danger" class="flex items-center w-full p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 mt-4" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif


        @yield('content')

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>
