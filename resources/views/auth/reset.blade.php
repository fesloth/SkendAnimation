<!-- resources/views/auth/passwords/reset.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <h2 class="text-center text-lg font-bold mb-4">Reset Password</h2>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                <input id="password" type="password" name="password" required placeholder="Password Baru" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password Baru</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Konfirmasi Password Baru" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-[140px] rounded focus:outline-none focus:shadow-outline" type="submit">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
