@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-red-100">

        <div class="w-full max-w-md bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold text-center mb-4">Tambah Konten Baru</h2>

            <form action="{{ route('store-content') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                <label for="image"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Unggah gambarmu!</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="image" name="image" type="file" class="hidden" multiple required/>
            </label>
        </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi Konten</label>
                    <textarea name="content" id="content" class="border border-gray-300 px-3 py-2 w-full rounded-md"></textarea>
                </div>

                <button type="submit" class="bg-red-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700">Tambah Konten</button>
            </form>

            <div class="mt-4 text-center">
                <a href="/profile" class="text-red-600 hover:text-red-700 font-semibold text-sm">Kembali</a>
            </div>
        </div>
    </div>
@endsection
