@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
    <div class="img">
        <img src="{{ asset('img/banner_home.jpeg') }}" />
    </div>
    <div class="description w-full md:w-1/2 mt-4">
        <h2 class="text-2xl font-semibold mb-4">Profile Jurusan Animasi SMKN 2 Banjarmasin</h2>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/3vG9Yer7cPk?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p class="mt-4 text-gray-800 leading-relaxed">Program keahlian Animasi merupakan salah satu program keahlian yang sudah ada di SMKN 2 Banjarmasin. Animasi adalah sebuah program keahlian yang mempelajari dasar – dasar kemampuan dan keilmuan menjadi seorang animator. Di Program Keahlian Animasi siswa akan mempelajari strategi menggambar.</p>
        <p class="mt-4 text-gray-800 leading-relaxed">Kurikulum program keahlian Animasi mengadopsi unit-unit kompetensi yang tercantum dalam Skema Sertifikasi KKNI Level II Kompetensi Animasi. Penyusunan kurikulum Animasi juga melibatkan industri. SMK Negeri 2 Banjarmasin melibatkan industri partner di Kalimantan Selatan dan luar kalimantan dalam penyusunan kurikulum operasional ini. Jadi kurikulum yang dirancang juga selalu berpedoman atas saran, masukan, dan kebutuhaan Dunia Kerja dan Industri.</p>
        <p class="mt-4 text-gray-800 leading-relaxed">Guru Produktif Animasi berjumlah 4 orang dimana selain memiliki pendidikan sesuai dengan yang disyaratkan, Guru Produktif Animasi juga berlatar belakang pernah bekerja di industri dan memiliki predikat asesor kompetensi.</p>
        <p class="mt-4 text-gray-800 leading-relaxed">Sarana praktik dan belajar dirancang dengan standar industri seperti RPS dan studio animasi, sehingga para lulusan SMK Negeri 2 Banjarmasin diharapkan menjadi insan profesional dalam bidang animasi baik di dalam maupun di luar negeri, memiliki kepribadian, dan karakter industri.</p>
        <p class="mt-4 text-gray-800 leading-relaxed">Kurikulum dan proses pembelajaran dirancang untuk mendorong peserta didik untuk aktif, kreatif, mandiri, percaya diri, dan menjadi generasi yang berbasis pada Profil Pelajar Pancasila dan Budaya Kerja. Kegiatan praktik baik sekolah maupun praktik kerja industri dipersiapkan dengan baik untuk membentuk mental yang kuat dan mengasah keterampilan serta keahlian peserta didik. Hal ini bertujuan untuk menyiapkan lulusan yang siap bekerja, melanjutkan ke jenjang Pendidikan yang lebih tinggi, atau berwirausaha.</p>
        <p class="mt-4 italic text-gray-600">Ketua Program Keahlian : Nor Riduan, S.Kom</p>
    </div>
</div>


<div class="lg:hidden">
    <div
        class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium">
            <button type="button"
                class="cursor-pointer inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500">Beranda</span>
            </button>
            <button type="button"
                class="cursor-pointer inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ route('produk') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" />
                    </svg>
                </a>
                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500">Produk</span>
            </button>
            <button type="button"
                class="cursor-pointer inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d=" M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0
                        1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829
                        6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0
                        0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd" />
                </svg>


                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500">Blog</span>
            </button>
            <button type="button"
                class="cursor-pointer inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <svg class="w-6 h-6 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M15.514 3.293a1 1 0 0 0-1.415 0L12.151 5.24a.93.93 0 0 1 .056.052l6.5 6.5a.97.97 0 0 1 .052.056L20.707 9.9a1 1 0 0 0 0-1.415l-5.193-5.193ZM7.004 8.27l3.892-1.46 6.293 6.293-1.46 3.893a1 1 0 0 1-.603.591l-9.494 3.355a1 1 0 0 1-.98-.18l6.452-6.453a1 1 0 0 0-1.414-1.414l-6.453 6.452a1 1 0 0 1-.18-.98l3.355-9.494a1 1 0 0 1 .591-.603Z"
                        clip-rule="evenodd" />
                </svg>

                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500">Artikel</span>
            </button>
            <button type="button"
                class="cursor-pointer inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ route('profile') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Picture"
                        class="w-7 h-7 rounded-full top-6">
                    <span
                        class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-theme dark:group-hover:text-blue-500">Profile</span>
                </a>
            </button>
        </div>
    </div>
</div>

@endsection