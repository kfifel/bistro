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
    <div id="header" class="w-full flex flex-column justify-around items-center bg-teal-400">
        <img src="{{ url('./images/logo.png') }}" alt="logo" class=" h-20 w-20">
        <nav>
            <ul class="flex gap-6">
                <a href="{{ route('home') }}" class="px-6 py-2 {{ request()->routeIs('home') ? 'bg-orange-700 text-white ' : 'hover:bg-orange-600 hover:text-white' }}">
                    <li>home</li>
                </a>
                <a href="{{ route('about') }}" class="px-6 py-2 {{ request()->routeIs('about') ? 'bg-orange-700 text-white ' : 'hover:bg-orange-600 hover:text-white' }}">
                    <li>about us</li>
                </a>
                <a href="{{ route('login') }}" class="px-6 py-2 {{ request()->routeIs('login') ? 'bg-orange-700 text-white ' : 'hover:bg-orange-600 hover:text-white' }}">
                    <li>Login</li>
                </a>
                <a href="{{ route('register') }}" class="px-6 py-2 {{ request()->routeIs('register') ? 'bg-orange-700 text-white ' : 'hover:bg-orange-600 hover:text-white' }}">
                    <li>register</li>
                </a>
            </ul>
        </nav>

        <a href="#">Hello Mr <strong>User's name</strong></a>
    </div>
    <main class="bg-gray-400">
        @yield('content')
    </main>
</body>
</html>
