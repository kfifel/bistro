@extends('layout')

@section('title', 'create plat')

@section('content')
    <section id="login" class="w-ful text-gray-200 ">

        <!-- wrapper -->
        <div class=" p-20 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('plats.store') }}" method="POST"
                  class="w-full md:w-1/2 border
                           @if($errors->any()) border-red-500
                           @else border-black
                           @endif
                           p-6 bg-gray-700">

            @csrf
            <div class="flex flex-col">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="b-black" value="{{ old('title') }}">
                @error('title')
                <div class="text-orange-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="description">description:</label>
                <textarea
                    name="description"
                    rows="6"
                    id="description"
                    class="
                    w-full
                    @error('description')
                    'border bg-red-600'
                    @enderror
                    "
                >
                    {{ old('description') }}
                </textarea>
                @error('description')
                <div class="text-orange-700">{{ $message }}</div>
                @enderror
            </div>
            <input type="file" name="image">

            <button class="py-2 bg-orange-500 text-white text-bold text-xl hover:bg-orange-600">
                save
            </button>
        </form>
    </div>
@endsection
