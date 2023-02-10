@extends('layout')

@section('title', 'create plat')

@section('content')
    <div class="m-6 p-6">
        <form action="{{ route('plats.update', $plat) }}" method="POST"
              enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="b-black" value="{{ old('title', $plat->title) }}">
            <input type="text" name="description" value="{{ old('description', $plat->description) }}">
            <input type="file" name="image">

            <button class="py-2 bg-blue-500 text-white text-bold text-xl hover:bg-blue-700 hover:rounded-xl">
                save
            </button>
        </form>
    </div>
@endsection
