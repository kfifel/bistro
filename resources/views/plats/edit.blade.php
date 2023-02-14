@extends('layout')

@section('title', 'create plat')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['plats', 'edit'] ]  )
@endsection
@section('content')

    <div class="flex justify-center width-full mt-4">
        @includeWhen($errors->any(), '_error')
    </div>
    <h1 class="text-2xl text-white py-3">Edit Plats</h1>

    <div class="m-6 p-6">
        <form action="{{ route('plats.update', $plat) }}" method="POST"
              enctype="multipart/form-data" class="flex flex-col gap-6 text-white">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label for="title">title:</label>
                <input type="text" name="title" id="title" class="px-3 py-2 bg-gray-800 border
                                    @error('title')
                                    border-red-500 bg-gray-800 text-red-500
                                    @else
                                    border-gray-900 outline-none
                                    @enderror" value="{{ old('title', $plat->title) }}">
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
                    {{ old('description', $plat->description) }}
                </textarea>
                @error('description')
                <div class="text-orange-700">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image">image :</label><br>
                <input type="file" name="image" id="image" class="hover:bg-orange-600 ">
            </div>

            <button class="py-2 bg-orange-600 text-white text-bold text-xl hover:bg-orange-700 ">
                save
            </button>
        </form>
    </div>
@endsection
