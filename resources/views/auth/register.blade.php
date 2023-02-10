@extends('layout')

@section('title', 'register')

@section('content')
    <section id="login" class="w-ful text-gray-200 ">

        <!-- wrapper -->
        <div class=" p-20 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('register') }}" method="POST" class="w-full md:w-1/2 border @if($errors->any()) border-red-500 @else border-black @endif p-6 bg-gray-700"">

                @csrf
                <h2 class="text-2xl pb-3 font-semibold text-center">
                    Register
                </h2>
                <div>
                    <div class="flex flex-col mb-3">
                        <label for="name">Name</label>
                        <input
                            type="text" id="name" name="name"
                            class="px-3 py-2 bg-gray-800 border
                                    @error('name')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror"
                            autocomplete="off"
                            value="{{ old('name') }}"
                        >
                        @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
                            class="
                                    px-3 py-2 bg-gray-800 border
                                    @error('password')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror
                                    "
                            value="{{ old('password') }}"
                        >
                        @error('password')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-gray-200 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-green-600 hover:text-white text-xl cursor-pointer">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
