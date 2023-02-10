@extends('layout')

@section('content')

<div class="m-7">


    <div class="max-w-full flex bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div>
            <img class="rounded-t-lg" src="{{ asset($plat->image) }}" alt="" />
        </div>
        <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $plat->title }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $plat->description }}</p>

            @if(Auth::user()->isAdmin)
                <div class="flex gap-4">
                    <form action="{{ route('plats.destroy', $plat) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn bg-red-700 py-1 px-4 rounded-lg my-2">Delete</button>
                    </form>
                    <a href="{{ route('plats.edit', $plat) }}">
                        <button class="btn bg-green-700 py-1 px-4 rounded-lg my-2">Edit</button>
                    </a>
                </div>
            @endif
        </div>
    </div>

</div>


@endsection
