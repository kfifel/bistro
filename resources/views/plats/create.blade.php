@extends('layout')

@section('title', 'create plat')

@section('content')
    <div class="">
        <form action="{{ route('plats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" class="b-black" value="{{ old('title') }}">
            <input type="text" name="description" value="{{ old('description') }}">
            <input type="file" name="image">

            <button>save</button>
        </form>
    </div>
@endsection
