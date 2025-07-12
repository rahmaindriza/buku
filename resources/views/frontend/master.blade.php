<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Homepage') - RI Library</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#e4f5fd] text-[#3E2723]">

    {{-- Navbar --}}
    <nav class="bg-[#0b445e] text-white py-4 shadow-md">
        <div class="container max-w-6xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('homepage')}}" class="text-2xl font-bold">RI-Library</a>
            <div class="space-x-4 text-sm sm:text-base">
                <a href="{{ route('homepage') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    <footer class="bg-[#0b445e] text-white mt-12">
    <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        {{-- Tentang --}}
        <div>
            <h3 class="text-xl font-bold mb-4">Tentang RI-Library</h3>
            <p class="text-sm text-gray-300 leading-relaxed">
                RI-Library adalah platform katalog buku digital yang memudahkan Anda menemukan dan menjelajahi berbagai koleksi buku terbaik dari penerbit dan penulis terpercaya.
            </p>
        </div>

        {{-- Navigasi Cepat --}}
        <div>
            <h3 class="text-xl font-bold mb-4">Navigasi Cepat</h3>
            <ul class="space-y-2 text-sm text-gray-200">
                <li><a href="{{ route('homepage') }}" class="hover:underline hover:text-yellow-400 transition">Beranda</a></li>
                <li><a href="{{ route('login') }}" class="hover:underline hover:text-yellow-400 transition">Login</a></li>
                {{-- Tambahkan rute lain jika ada --}}
            </ul>
        </div>

        {{-- Kontak --}}
        <div>
            <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
            <ul class="text-sm text-gray-300 space-y-2">
                <li><i class="fas fa-map-marker-alt mr-2 text-yellow-400"></i> Padang, Indonesia</li>
                <li><i class="fas fa-envelope mr-2 text-yellow-400"></i> rilibrary@example.com</li>
                <li><i class="fas fa-phone mr-2 text-yellow-400"></i> +62 812 3456 7890</li>
            </ul>
        </div>

    </div>

    <div class="border-t border-[#5D4037] text-center py-4 text-sm text-gray-400 bg-[#0b445e]">
        &copy; 2025 Rahma Indriza Syafitri. All rights reserved.
    </div>
</footer>



</body>
</html>
