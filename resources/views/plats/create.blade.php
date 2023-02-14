@extends('layout')

@section('title', 'create plat')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['plats', 'create'] ]  )
@endsection

@section('content')
    <section id="login" class="w-ful text-gray-200 ">
        <div class="flex justify-center width-full">
            @includeWhen($errors->any(), '_error')
        </div>
        <!-- wrapper -->
        <div class=" p-10 lg:px-20 flex flex-col md:flex-row justify-center">

            <!-- Contact Me -->
            <form action="{{ route('plats.store') }}" method="POST"
                  class="w-full md:w-1/2 border
                           @if($errors->any()) border-red-500
                           @else border-black
                           @endif
                           p-6 bg-gray-700"
                  enctype="multipart/form-data"
            >

            @csrf
            <div class="flex flex-col">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="px-3 py-2 bg-gray-800 border
                                    @error('title')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror" value="{{ old('title') }}">
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
                    w-full px-3 py-2 bg-gray-800
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
            <div>
                <label for="image">image :</label><br>
                <input type="file" name="image" id="image" class="hover:bg-orange-600 ">
            </div>

            <button class="w-full py-2 bg-orange-500 text-white text-bold text-xl hover:bg-orange-600">
                save
            </button>
        </form>
    </div>
@endsection
