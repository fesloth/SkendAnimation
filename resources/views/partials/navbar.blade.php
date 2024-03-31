<nav class="bg-white border-gray-200 dark:bg-gray-900 max-sm:hidden">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2 ">
        <a href="./" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/navbar_logo.jpeg') }}" alt="Default Avatar" width="60" />
            <span class="text-2xl font-bold whitespace-nowrap dark:text-white">SkendAnimation</span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Picture"
                    class="w-10 h-10 rounded-full">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-md text-gray-900 dark:text-white">{{ $user->nama }}</span>
                    <hr class="mb-1">
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ $user->email }}</span>
                    <span
                        class="block text-sm 
              {{ $user->status === 'Guru'
                  ? 'text-blue-500'
                  : ($user->status === 'Murid'
                      ? 'text-yellow-300'
                      : ($user->status === 'Admin'
                          ? 'text-purple-500'
                          : 'text-green-500')) }} truncate dark:text-gray-400">{{ $user->status }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-address-card"></i> Profile Settings</a>
                    </li>
                    <li>
                        <a href="#" onclick="openLogoutDialog()"
                            class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 dark:hover:bg-red-600 dark:text-red-200 dark:hover:text-white">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 {{ request()->is('/') ? 'text-theme' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-hoverTheme md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Beranda</a>
                </li>
                <li>
                    <a href="/produk"
                        class="block py-2 px-3 {{ request()->is('produk') ? 'text-theme' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-hoverTheme md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Produk</a>
                </li>
                <li>
                    <a href="/blog"
                        class="block py-2 px-3 {{ request()->is('blog') ? 'text-theme' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-hoverTheme md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Blog</a>
                </li>
                <li>
                    <a href="/artikel"
                        class="block py-2 px-3 {{ request()->is('artikel') ? 'text-theme' : 'text-gray-900' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-hoverTheme md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Artikel</a>
                </li>
            </ul>
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
</nav>
<script>
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
