@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-semibold mb-4">Hai! Selamat datang di halaman Artikel</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($artikels as $artikel)
                <div class="bg-white overflow-hidden shadow-md rounded-lg relative">
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="w-full h-60 object-cover object-center">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $artikel->judul }}</h2>
                        <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($artikel->artikel, 100) }}</p>
                    </div>
                    @if (auth()->user() && (auth()->user()->role == 'admin' || auth()->user()->role == 'guru'))
                        <form action="{{ route('hapus_artikel', $artikel->id) }}" method="POST" class="absolute top-2 right-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
