<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RI Library</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- navbar --}}
    <nav class="bg-blue-600 text-white py-4">
        <div class="container max-w-6x1 mx-auto flex justify-between items-center">
            <a href="{{ route('homepage')}}" class="text-2x1 font-bold">RI-Libarary</a>
            <div>
                <a href="{{ route('homepage') }}" class="px-4">Homepage</a>
                <a href="{{ route('login') }}">Login Admin</a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="bg-blue-500 text-white py-12">
        <div class="container max-w-6x1 mx-auto text-center">
            <h1 class="text-4x1 font-bold mb-4">Selamat Datang di RI Library</h1>
            <h1 class="text-6x1 font-bold mb-4">RI-Library</h1>
            <P class="text-lg">Jelajahi berbagai koleksi buku-buku terbaik dari kami.</P>
         </div>
    </section>

    {{--section filter dan pencarian--}}
    <section class="container max-w-6x1 mx-auto px-4 py-6">
        <form action="{{ route('homepage') }}" method="get">
            <select name="kategori" class="p-2 border rounded">
                <option value="">Semua kategori</option>
                @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : ''}}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>

            <select name="penerbit" class="p-2 border rounded">
                <option value="">Semua Penerbit</option>
                @foreach ($penerbit as $p)
                <option value="{{ $p->id }}" {{ request('penerbit') == $p->id ? 'selected' : ''}}>
                    {{ $p->nama_penerbit }}
                </option>
                @endforeach
            </select>

            <input type="text" name="search" class="p-2 border rounded" placeholder="Masukkan kata kunci..." value="{{ request('search') }}">

            <button type="submit" class="bg-blue-600 px-5 py-2 rounded">Terapkan</button>
    </section>

    {{-- section katalog --}}
    <section class="container max-w-6x1 mx-auto py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($buku as $b)
            <div class="bg-white shadow-lg p-6 flex rounded-lg items-center space-x-4">
                <div class="flex-shrink-0">
                    @if ($b->cover)
                        <img src="{{ asset('storage/' . $b->cover)}}" alt="Cover Buku"
                            class="w16 h-18 rouded-md object-cover">
                    @else
                        <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover Buku"
                            class="w-16 h-18 rouded-md object-cover">
                    @endif
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-blue-800">{{ $b->judul}}</h2>
                    <p class="text-gray-600 text-sm">Pengarang: {{ $b->pengarang}}</p>
                     <p class="text-gray-600 text-sm">Kategori: {{ $b->kategori->nama_kategori}}</p>
                    <p class="text-gray-600 text-sm">Penerbit: {{ $b->penerbit->nama_penerbit}}</p>
                    <p class="text-gray-600 text-sm">Tahun: {{ $b->tahun_terbit}}</p>
                </div>
            </div>

            @endforeach
        </div>
        <div class="mt-6">{{ $buku->links() }}</div>
    </section>

    <footer class="text-center bg-blue-800 py-5 text-white">
        <p>Copyright &copy; 2025 Rahma Indriza Syafitri</p>

    </footer>


</body>
</html>
