@extends('layout')

@section('title', 'Profile')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['profile'] ]  )
@endsection

@section('content')

<div class="flex flex-col sm:flex-row m-5">
    <section id="login" class="w-full text-gray-200 ">

        <!-- wrapper -->
        <div class=" flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('profile.update') }}" method="POST" class="w-full md:w-3/4 border @if($errors->any()) border-red-500 @else border-black @endif p-6 bg-gray-700">

                @csrf
                @method('PUT')
                <h2 class="text-2xl pb-3 font-semibold text-center">
                    Update Profile
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
                            value="{{ old('name', Auth::user()->name) }}"
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
                            value="{{ old('email', Auth::user()->email) }}"
                        >
                        @error('email')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-gray-200 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-green-600 hover:text-white text-xl cursor-pointer">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </section>
    <section id="login" class="w-full text-gray-200 ">

        <!-- wrapper -->
        <div class="flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('profile.update.password') }}" method="POST" class="w-full md:w-3/4 border @if($errors->any()) border-red-500 @else border-black @endif p-6 bg-gray-700">

                @csrf
                @method('PUT')
                <h2 class="text-2xl pb-3 font-semibold text-center">
                    Update password
                </h2>
                <div>
                    <div class="flex flex-col mb-3">
                        <label for="password">Current password</label>
                        <input
                            type="password" id="password" name="password"
                            class="px-3 py-2 bg-gray-800 border
                                    @error('password')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror"
                            autocomplete="off"
                        >
                        @error('password')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="newPassword">New password</label>
                        <input
                            type="password" id="newPassword" name="newPassword"
                            class=" px-3 py-2 bg-gray-800 border
                                    @error('newPassword')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror
                            "
                            autocomplete="off"
                        >
                        @error('newPassword')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="password_confirmation">Password confirmation</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="
                                    px-3 py-2 bg-gray-800 border
                                    @error('password_confirmation')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror
                                    "
                        >
                        @error('password_confirmation')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="w-full pt-3">
                    <button type="submit" class="w-full bg-gray-900 border border-gray-200 px-4 py-2 transition duration-50 focus:outline-none font-semibold hover:bg-green-600 hover:text-white text-xl cursor-pointer">
                        Update password
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
