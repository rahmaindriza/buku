<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    .material-symbols-rounded {
    font-variation-settings:
    'FILL' 1,
    'wght' 400,
    'GRAD' 0,
    'opsz' 24
}
</style>

@php
    function getInitials($name) {
        $words = explode(' ', $name);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }
@endphp

<body class="bg-[#e4f5fd] h-full">
    <div class="flex min-h-screen">
        {{-- sidebar --}}
        <aside class="w-64 bg-[#2B3A55] text-white flex flex-col min-h-screen shadow-lg">
    <!-- Logo/Brand -->
    <div class="p-5 text-center text-2xl font-bold bg-[#1E2A3A] tracking-wide shadow">
        PERPUSKU
    </div>

    <!-- Navigasi -->
    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-1 p-4 text-sm font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">dashboard</span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">category</span>
                    Kategori
                </a>
            </li>
            <li>
                <a href="{{ route('penerbit.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">library_books</span>
                    Penerbit
                </a>
            </li>
            <li>
                <a href="{{ route('buku.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">menu_book</span>
                    Buku
                </a>
            </li>
            <li>
                <a href="{{ route('anggota.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">group</span>
                    Anggota
                </a>
            </li>
            <li>
                <a href="{{ route('peminjaman.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">import_contacts</span>
                    Peminjaman Buku
                </a>
            </li>

            @if(Auth::check() && Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('user.index') }}"
                   class="flex items-center gap-3 p-3 rounded-md hover:bg-[#1E2A3A] transition">
                    <span class="material-symbols-rounded">supervisor_account</span>
                    Data User
                </a>
            </li>
            @endif
        </ul>
    </nav>

    <!-- Logout -->
    @if (Auth::check())
    <div class="p-4 border-t border-white/10 bg-[#1E2A3A]">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-2 rounded-md transition text-sm font-semibold">
                <span class="material-symbols-rounded">logout</span> Logout
            </button>
        </form>
    </div>
    @endif
</aside>


        {{-- content header --}}
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow flex items-center justify-between p-4">
                <h1 class="text-xl font-bold">Aplikasi Peminjaman Buku</h1>

                @if(Auth::check())
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center focus:outline-none">
                                {{-- Avatar inisial user --}}
                                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ getInitials(Auth::user()->name) }}
                                </div>
                                <span class="ml-2 text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                            </button>

                            {{-- dropdown menu --}}
                            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg hidden group-hover:block">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Settings</a>
                            </div>
                        </div>
                    </div>
                @endif
            </header>

            {{-- main content --}}
            <main class="flex-1 p-6">
                <div class="bg-white rounded shadow p-4">
                     @yield('content')
