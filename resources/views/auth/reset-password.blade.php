@extends('layout')

@section('title', 'reset password')

@section('content')
    <section id="login" class="w-ful text-gray-200 ">

        <!-- wrapper -->
        <div class=" p-20 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('password.update', $token) }}" method="POST" class="w-full md:w-1/2 border @if($errors->any()) border-red-500 @else border-black @endif p-6 bg-gray-700">

                @csrf
                <h2 class="text-2xl pb-3 font-semibold text-center">
                    Reset password
                </h2>
                <div class="flex justify-center width-full">
                    @includeWhen($errors->any(), '_error')
                    @if(session('status'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Success check your inbox</p>
                                    <p class="text-sm">{{ session('status') }}.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
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
                            class="
                                    px-3 py-2 bg-gray-800 border
                                    @error('password')
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
                    <div class="flex flex-col mb-3">
                        <label for="password_confirmation">password confirmation</label>
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
                        Reset password
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
