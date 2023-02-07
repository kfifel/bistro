@extends('layout')

@section('title', 'login')

@section('content')
    <section id="login" class="w-full bg-black text-red-500 ">

        <!-- wrapper -->
        <div class=" p-20 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('login') }}" method="POST" class="w-full md:w-1/2 border border-red-500 p-6 bg-gray-900">

                @csrf
                <h2 class="text-2xl pb-3 font-semibold text-center">
                    Login
                </h2>
                <div>
                    <div class="flex flex-col mb-3">
                        <label for="email">Email</label>
                        <input
                            type="text" id="email" name="email"
                            class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500"
                            autocomplete="off"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            value="{{ old('password') }}"
                            class="px-3 py-2 bg-gray-800 border border-gray-900 focus:border-red-500 focus:outline-none focus:bg-gray-800 focus:text-red-500"
                        >
                        @error('password')
                        <div class="error">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <label for="remember">
                    remember Me
                    <input type="checkbox" id="remember" name="remember">
                </label>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-red-500 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-red-500 hover:text-white text-xl cursor-pointer">
                        Connect
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
