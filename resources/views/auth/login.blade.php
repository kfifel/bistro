@extends('layout')

@section('title', 'login')

@section('content')

    <div class="w-40">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col">
            @csrf

            <label for="email">Email</label>
            <input
                class="
                    @error('email')
                        error-border
                     @enderror"
                type="text"
                name="email"
                value="{{ old('email') }}"
                id="email"
            >

            @error('email')
            <div class="error">
                {{ $message }}
            </div>
            @enderror

            <label for="password">Password</label>
            <input
                class="
                    @error('password')
                        error-border
                    @enderror"
                type="password"
                name="password"
                id="password"
            >

            @error('password')
            <div class="error">
                {{ $message }}
            </div>
            @enderror

            <label for="remember">
                remember Me
                <input type="checkbox" id="remember" name="remember">
            </label>

            <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">Login</button>

        </form>
    </div>

@endsection
