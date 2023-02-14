@extends('layout')

@section('content')

    <div class="max-w-lg mx-auto mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <img class="w-full h-70 object-cover object-center" src="{{ asset($plat->image) }}" alt="{{ $plat->title }}">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-900">{{ $plat->title }}</h2>
            <p class="mt-2 text-gray-600">{{ $plat->description }}</p>
        </div>
        @if(Auth::user()->isAdmin)
            <div class="flex justify-between px-6 py-4 bg-gray-100">
                <form action="{{ route('plats.destroy', $plat) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">Delete</button>
                </form>
                <a href="{{ route('plats.edit', $plat) }}">
                    <button class="btn bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">Edit</button>
                </a>
            </div>
        @endif
    </div>

@endsection
