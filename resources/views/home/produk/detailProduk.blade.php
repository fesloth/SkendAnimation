@extends('layouts.app')

@section('content')
    <div class="container mx-auto h-screen mt-10">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="relative h-full p-4">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $product->gambar_produk) }}"
                    alt="{{ $product->nama }}">
            </div>
            <div class="px-6 h-16">
                <h4 class="font-semibold text-gray-800">{{ $product->title }}</h4>
                @if ($product->deskripsi)
                    <p class="mt-2 text-gray-600">{{ $product->deskripsi }}</p>
                @else
                    @if (auth()->check() && $product->user_id === auth()->user()->id)
                        <a href="#" class="mt-2 text-blue-500 hover:underline">Isi Deskripsi</a>
                    @else
                        <p class="mt-2 text-gray-600">Tidak ada deskripsi</p>
                    @endif
                @endif
            </div>
        </div>
        <div class="mt-4 text-center">
            <a href="/produk" class="text-blue-500 hover:underline">Kembali</a>
        </div>
    </div>
@endsection
