@extends('layout')

@section('title', 'deleted plats')

@section('content')
    <div class="">

        <div class="flex justify-center width-full">
            @includeWhen($errors->any(), '_error')
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($plats as $plat)
                <tr class="text-gray-200">
                    <td class="border px-4 py-2">{{ $plat->title }}</td>
                    <td class="border px-4 py-2">{{ $plat->description }}</td>
                    <td class="border px-4 py-2">
                        <img src="{{ asset( $plat->image ) }}" alt="{{ $plat->title }}" class="w-24 h-24 object-cover">
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex">
                            <form action="{{ route('plats.restore', $plat->id) }}" method="POST" class="text-green-500 hover:text-green-700">
                                @csrf
                                <button>
                                    restore
                                    <i class="fas fa-undo-alt"></i>
                                </button>
                            </form>
                            <form action="{{ route('plats.forceDelete', $plat->id) }}" method="POST" class="text-red-500 hover:text-red-700 ml-4">
                                @csrf
                                @method('DELETE')
                                <button>
                                    delete forever
                                    <i class="fas fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center mt-10">
                        <p class="text-3xl font-medium text-gray-700">No Plats Found</p>
                        <p class="text-xl text-gray-500">It looks like there are no plats to display.</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
