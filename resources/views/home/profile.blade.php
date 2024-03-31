<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-black font-open-sans">
    @if (auth()->user()->profile_image)
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-2 mt-4">
                <a href="/"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
        </nav>
        <div class="container mx-auto px-4 py-16 ml-40">
            <div class="flex items-center">
                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Picture"
                    class="w-52 h-52 rounded-full object-cover mb-4 lg:mr-8 lg:mb-0">
                <div>
                    <h3 class="text-3xl font-bold mb-2 text-font">{{ auth()->user()->nama }}</h3>
                    <p class="text-md mb-3 text-font">{{ auth()->user()->bio }}</p>
                    <div class="flex gap-3 mb-3">
                        @if (isset($instagramLink) && !empty($instagramLink))
                            <p class="text-md mb-3">
                                <span class="fab fa-instagram text-pink-700"></span> <a href="{{ $instagramLink }}"
                                    target="_blank" class="text-font hover:underline">Instagram</a>
                            </p>
                        @endif
                        @if (isset($youtubeLink) && !empty($youtubeLink))
                            <p class="text-md mb-3">
                                <span class="fab fa-youtube text-red-600"></span> <a href="{{ $youtubeLink }}"
                                    target="_blank" class="text-font hover:underline">Youtube</a>
                            </p>
                        @endif
                        @if (isset($discordID) && !empty($discordID))
                            <p class="text-md mb-3">
                                <span class="fab fa-discord text-blue-900"></span> <a href="{{ $discordID }}"
                                    target="_blank" class="text-font hover:underline">Discord</a>
                            </p>
                        @endif
                    </div>
                    <button class="bg-[#E7C4C4] text-font py-2 px-4 rounded-lg hover:bg-hoverTheme">
                        <a href="{{ route('edit-profile') }}" class="text-white">Edit <i
                                class="fas fa-pencil ml-1"></i></a>
                    </button>
                </div>
            </div>
        </div>
        <script src="../node_modules/preline/dist/preline.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @else
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-2">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('img/navbar_logo.jpeg') }}" alt="Default Avatar" width="60" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SkendAnimation</span>
                </a>
            </div>
        </nav>
        <div class="container mx-auto px-4 py-16 lg:px-0">
            <div class="lg:flex lg:items-center justify-center">
                <span class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center mb-4 lg:mr-8 lg:mb-0">
                    <i class="fas fa-camera text-3xl text-white"></i>
                </span>
                <div>
                    <h3 class="text-3xl font-bold mb-2">{{ auth()->user()->nama }}</h3>
                    <p class="text-xl mb-3">{{ auth()->user()->work_description }}</p>
                    @if (auth()->user()->bio)
                    @else
                        <p class="text-md mb-3">
                            Anda belum ada bio
                            <a href="/profile-create" class="text-blue-500 hover:underline">Tambah Bio</a>
                        </p>
                    @endif
                    <div class="text-left">
                        <h3 class="text-3xl font-bold mb-2">{{ auth()->user()->nama }}</h3>
                        <p class="text-xl mb-3">{{ auth()->user()->bio }}</p>
                        <button class="bg-blue-200 text-blue-500 py-2 px-4 rounded-lg hover:bg-blue-100">
                            <a href="{{ route('edit-profile') }}">Edit Profile</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../node_modules/preline/dist/preline.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @endif
</body>

</html>
