<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">
    <title>@yield('title', 'mahlaba')</title>
</head>
<body>
    <div id="header">
        <nav class="bg-gray-600">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20" src="{{ url('images/logo.png') }}" alt="bistro">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-gray-900 text-white hover:text-white' : 'text-gray-300 hover:bg-gray-700' }} px-3 py-2 rounded-md text-sm font-medium">Home</a>

                                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-gray-900 text-white hover:text-white' : 'text-gray-300 hover:bg-gray-700' }}  px-3 py-2 rounded-md text-sm font-medium">about</a>
                                @auth
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="{{ request()->routeIs('logout') ? 'bg-gray-900 text-white hover:text-white' : 'text-gray-300 hover:bg-gray-700' }} hover:text-white px-3 py-2 rounded-md text-sm font-medium">logout</button>
                                    </form>
                                @else
                                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'bg-gray-900 text-white hover:text-white' : 'text-gray-300 hover:bg-gray-700' }} px-3 py-2 rounded-md text-sm font-medium">register</a>

                                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'bg-gray-900 text-white hover:text-white' : 'text-gray-300 hover:bg-gray-700' }} px-3 py-2 rounded-md text-sm font-medium">login</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                        <div class="ml-4 flex items-center md:ml-6">
                            <div class="relative ml-3">
                                <div>
                                    <a href="#" class="flex max-w-xs items-center rounded-full bg-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="px-4">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </nav>
    </div>

    <main class="">
        @yield('content')
    </main>
</body>
</html>
