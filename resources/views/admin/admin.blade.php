@extends('layouts.app')

@section('content')
    <nav class="bg-[white] border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-2">
            <a href="/" class="flex items-center space-x-3 max-sm:space-x-1 rtl:space-x-reverse">
                <img src="{{ asset('img/navbar_logo.jpeg') }}" alt="Default Avatar" width="60" class="max-sm:w-12" />
                <span
                    class="self-center text-2xl font-bold whitespace-nowrap dark:text-white max-sm:text-base">SkendAnimation</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="/" class="text-sm  text-gray-500 dark:text-white hover:underline">Beranda</a>
                <a href="/artikelAdmin/create" class="text-sm  text-gray-500 dark:text-white hover:underline">Buat Artikel</a>
                <a href="#" onclick="openLogoutDialog()" class="text-red-700 hover:underline text-sm">
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="flex flex-col items-center justify-center mt-32 max-sm:mt-10">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center max-sm:text-2xl">Admin Dashboard</h2>

        <div class="overflow-x-auto max-w-full">
            <table class="bg-white border border-gray-300 shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-3 max-sm:text-sm border font-bold bg-[B76A6A] text-white">ID</th>
                        <th class="py-2 px-3 max-sm:text-sm border font-bold bg-[B76A6A] text-white">Nama</th>
                        <th class="py-2 px-3 max-sm:text-sm border font-bold bg-[B76A6A] text-white">Email</th>
                        <th class="py-2 px-3 max-sm:text-sm border font-bold bg-[B76A6A] text-white">Status</th>
                        <th class="py-2 px-3 max-sm:text-sm border font-bold bg-[B76A6A] text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="max-sm:text-center">
                            <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->id }}</td>
                            <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->nama }}</td>
                            <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->email }}</td>
                            <td class="py-2 px-3 max-sm:p-1 max-sm:text-sm border">{{ $user->status }}</td>
                            <td
                                class="py-2 px-3 max-sm:p-1 max-sm:text-sm border flex flex-row gap-2 justify-center items-center max-sm:flex max-sm:flex-col max-sm:gap-2">
                                <button onclick="window.location.href='{{ route('edit.user', ['id' => $user->id]) }}'"
                                    class="bg-yellow-300 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-yellow-400 focus:outline-none focus:shadow-outline-blue">
                                    <i class="fas fa-edit mr-2 max-sm:mr-0"></i>
                                    <p class="max-sm:hidden">Edit</p>
                                </button>

                                <button onclick="confirmDelete('{{ route('delete.user', ['id' => $user->id]) }}')"
                                    class="bg-red-600 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <i class="fas fa-trash-alt mr-2 max-sm:mr-0"></i>
                                    <p class="max-sm:hidden">Hapus</p>
                                </button>

                                <button onclick="window.location.href='{{ route('report.user', ['id' => $user->id]) }}'"
                                    class="bg-orange-500 text-white px-4 py-2 flex justify-center items-center rounded-md hover:bg-orange-600 focus:outline-none focus:shadow-outline-orange">
                                    <i class="fas fa-exclamation-circle mr-2 max-sm:mr-0"></i>
                                    <p class="max-sm:hidden">Laporkan</p>
                                </button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<div id="confirmation-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div id="alert-additional-content-2"
            class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Apakah Anda yakin ingin menghapus user ini?
            </div>
            <div class="flex">
                <button type="button" onclick="deleteUser('URL_DEL_USER')"
                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Hapus
                </button>
                <button type="button" onclick="closeConfirmationDialog()"
                    class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<div id="logout-dialog" class="hidden fixed inset-0 z-10 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div id="alert-additional-content-logout"
            class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Apakah Anda yakin ingin keluar?
            </div>
            <div class="flex">
                <button type="button" onclick="confirmLogout()"
                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Keluar
                </button>
                <button type="button" onclick="closeLogoutDialog()"
                    class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        var confirmationDialog = document.getElementById("confirmation-dialog");
        if (confirmationDialog) {
            confirmationDialog.style.display = "block";
        }

        var deleteButton = confirmationDialog.querySelector('.bg-red-800');
        deleteButton.onclick = function() {
            window.location.href = url;
        };
    }

    function closeConfirmationDialog() {
        var confirmationDialog = document.getElementById("confirmation-dialog");
        if (confirmationDialog) {
            confirmationDialog.style.display = "none";
        }
    }

    function confirmLogout() {
        document.getElementById('logout-form').submit();
    }

    function closeLogoutDialog() {
        var logoutDialog = document.getElementById("logout-dialog");
        if (logoutDialog) {
            logoutDialog.style.display = "none";
        }
    }

    function openLogoutDialog() {
        var logoutDialog = document.getElementById("logout-dialog");
        if (logoutDialog) {
            logoutDialog.style.display = "block";
        }
    }
</script>
