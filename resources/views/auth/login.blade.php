@extends('layout')

@section('title', 'login')

@section('content')
    <section id="login" class="w-full  text-gray-200 ">

        <!-- wrapper -->
        <div class=" p-20 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('login') }}" method="POST" class="w-full md:w-1/2 border @if($errors->any()) border-red-500 @else border-black @endif p-6 bg-gray-700">

                <div class="flex justify-center width-full">
                    @includeWhen($errors->any(), '_error')
                </div>
                @csrf
                <h2 class="text-3xl pb-3 font-semibold text-center">
                    Login
                </h2>
                <div>
                    <div class="flex flex-col mb-3">
                        <label for="email">Email</label>
                        <input
                            type="text" id="email" name="email"
                            class=" px-3 py-2 bg-gray-800 border
                                    @error('email')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror
                                    "
                            autocomplete="off"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                        <div class="text-red-600">
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
                            class="px-3 py-2 bg-gray-800 border
                            @error('email')
                            border-red-500 bg-gray-800 text-red-500
                            @else
                            border-gray-900 outline-none
                            @enderror
                            "
                        >
                        @error('password')
                        <div class="text-red-600">
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
                    <button type="submit" class="w-full bg-gray-900 border border-gray-200 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-green-600 hover:text-white text-xl cursor-pointer">
                        Connect
                    </button>
                </div>
                <div class="flex justify-between text-orange-500 pt-4">
                    <a href="{{ route('password.request') }}">forget password</a>
                    <a href="{{ route('register') }}">sign up</a>
                </div>
            </form>
        </div>
    </section>

@endsection
