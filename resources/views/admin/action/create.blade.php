@extends('layouts.app')

@section('content')
    <div class="w-full max-w-md mx-auto h-screen mt-12 px-8 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-font dark:text-white mb-4">Buat Artikel Baru</h2>
        <form action="{{ route('artikelAdmin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="gambar"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Upload gambar</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="gambar" name="gambar" type="file" class="hidden" multiple required/>
            </label>
            </div>

            <div class="mb-4">
                <label for="artikel" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                <textarea name="artikel" id="artikel" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-theme hover:bg-hoverTheme focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Post Artikel</button>
            </div>
        </form>

        <a href="./" class="text-font hover:underline">Kembali</a>
    </div>
@endsection
