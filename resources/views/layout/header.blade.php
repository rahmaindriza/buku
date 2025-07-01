<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Buku</title>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Icons" />
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>

<style>
        html, body {
            height: 100%;
            margin: 0;
        }
    </style>

<body class="bg-gray-100 h-full">
    <div class="flex min-h-screen">
        {{-- sidebar --}}
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-center rext-lg font-bold bg-gray-900">
                Panel Admin
            </div>
            <nav class="flex-1">
                <ul class="space-y-2 p-4">
                    <li>
                        <a href="{{ route('dashboard')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">dashboard</span>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
 <li>
                        <a href="{{ route('kategori.index')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">folder</span>
                            <span class="ml-3">Kategori</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('penerbit.index')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">newspaper</span>
                            <span class="ml-3">Penerbit</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('buku.index')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">menu_book</span>
                            <span class="ml-3">Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.index')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">menu_book</span>
                            <span class="ml-3">Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('peminjaman.index')}}" class="flex items-center p-2 rounded
                         hover:bg-gray-700 ">
                         <span class="material-icons">menu_book</span>
                            <span class="ml-3">Peminjaman Buku</span>
                        </a>
                    </li>
                </ul>

            </nav>

                @if (Auth::check())
                    <div style="p-4 text-center">
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2
                        rounded">Logout</button>
                 </form>
            </div>
        @endif

        </aside>
         {{-- content header --}}
         <div class="flex-1  flex flex-col">
            <header class="bg-white shadow flex items-center justify-between p-4">
                    <h1 class="text-xl font-bold">Aplikasi Peminjaman Buku </h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center focus:outline-none">
                                {{-- <img src="https://via.placeholder.com/40" alt=""
                                    class="w-10 h-10 rounded-full"> --}}
                                    <img src="https://ui-avatars.com/api/?name=Rahma+Indriza" alt="Profil"
                                      class="w-10 h-10 rounded-full object-cover">

                                <span class="ml-2 text-gray-700 font-medium">{{ Auth::user()->name }}

                                </span>
                            </button>

                            {{-- dropdown menu --}}
                            <div class="absolute right-0 mt-2 w-48 bg-white  border-gray-200
                             rounded shadow-lg hidden group-hover:block">
                             <a href="#" class="block px-4 py-2 text-sm text-gray-700
                             hover:bg-gray-100">Edit Profil</a>
                             <a href="#" class="block px-4 py-2 text-sm text-gray-700
                             hover:bg-gray-100">Edit Settings</a>

                            </div>
                        </div>

                    </div>
            </header>
            {{-- main content --}}
            <main class="flex-1 p-6">
                <div class="bg-white rounded shadow p-4">
