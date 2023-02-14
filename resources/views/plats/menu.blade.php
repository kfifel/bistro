@extends('layout')

@section('title', 'Plats')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['plats', 'Overview'] ]  )
@endsection
@section('content')

    <h1 class="text-2xl text-white py-3">Plats ({{ $plats->count() }})</h1>
    @if ( auth()->user() !== null && auth()->user()->isAdmin)
        <div class="flex justify-between mb-4 my-6">
            <a href="{{ route('plats.create') }}">
                <button class="px-6 py-2 text-white bg-orange-600 rounded-sm hover:bg-orange-700 focus:outline-none focus:ring-4">
                    Add Plat
                </button>
            </a>
            <a href="{{ route('plats.deleted') }}">
                <button class="px-6 py-2 text-white bg-orange-600 rounded-sm hover:bg-orange-700 focus:outline-none focus:ring-4">
                    Trashed Plats
                </button>
            </a>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($plats as $plat)
            <div class="shadow-md rounded-lg bg-white">
                <a href="{{ route('plats.show', [$plat]) }}">
                    <img class="w-full h-64 object-cover object-center rounded-sm" src="{{ asset($plat->image) }}" alt="{{ $plat->title }}">
                </a>
                <div class="p-5">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">{{ $plat->title }}</h5>
                    <p class="text-gray-700">
                        {{ strlen($plat->description) < 80 ? $plat->description : substr($plat->description, 0, 80).'...'  }}
                    </p>
                    <a href="{{ route('plats.show', [$plat]) }}"
                       class="inline-flex items-center text-sm font-medium text-center text-white bg-orange-600 rounded-lg px-3 py-2 hover:bg-orange-700 focus:outline-none focus:ring-4">
                        Read more
                        <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.293 3. 293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4. 293-4. 293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div
                class="p-4 mb-4 text-sm w-full text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                role="alert">
                <span class="font-medium">Ops!</span> there is no plat yet.
            </div>
        @endforelse
    </div>
@endsection
