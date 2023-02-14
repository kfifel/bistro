@extends('layout')

@section('title', 'create plat')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['plats', 'edit'] ]  )
@endsection
@section('content')

    <h1 class="text-2xl text-white py-3">Edit Plats</h1>

    <div class="m-6 p-6">
        <form action="{{ route('plats.update', $plat) }}" method="POST"
              enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="b-black" value="{{ old('title', $plat->title) }}">
            <textarea
                name="description"
                rows="6"
            >
                {{ old('description', $plat->description) }}
            </textarea>
            <input type="file" name="image">

            <button class="py-2 bg-orange-600 text-white text-bold text-xl hover:bg-orange-700 ">
                save
            </button>
        </form>
    </div>
@endsection
