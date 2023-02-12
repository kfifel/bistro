@extends('layout')

@section('title', 'Plats')

@section('breadcrumbs')
    @include('layouts.breadcrumbs', [ 'breadcrumbs' => ['Plats', 'Overview'] ]  )
@endsection

@section('content')
    @if ( auth()->user() !== null && auth()->user()->isAdmin)
        <div>
            <a href="{{ route('plats.create') }}">
                <button class="py-1 px-4 bg-blue-600 m-4 text-white"> add plat</button>
            </a>
        </div>
    @endif
    <div>
        <h1 class="text-2xl text-white py-6">Plats ({{ count($plats) }})</h1>
    </div>
    <div class="flex flex-wrap">
        @forelse($plats as $plat)
            <div class="m-7 max-w-sm min-w-sm" id="card-items">
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="card-image">
                        <a href="{{ route('plats.show', [$plat]) }}">
                            <img class="rounded-t-lg" src="{{ asset("$plat->image") }}" alt="plat image"
                                 id="card-image"/>
                        </a>
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $plat->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ strlen($plat->description) < 80 ? $plat->description : substr($plat->description, 0, 80).'...'  }}
                        </p>
                        <a href="{{ route('plats.show', [$plat]) }}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10. 293 3. 293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4. 293-4. 293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
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
