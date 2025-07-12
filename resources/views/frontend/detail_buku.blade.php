@extends('frontend.master')
@section('title', 'Detail Buku')

@section('content')

<section class="container max-w-6xl mx-auto px-4 py-10">
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

        {{-- Cover Buku --}}
        <div>
            <div class="relative">
                @if ($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku"
                        class="w-full rounded-lg shadow-lg object-cover">
                @else
                    <img src="{{ asset('img/default_cover.jpg') }}" alt="Default Cover"
                        class="w-full rounded-lg shadow-lg object-cover">
                @endif

                {{-- Badge Tahun --}}
                @if($buku->tahun_terbit == date('Y'))
                    <span class="absolute top-3 left-3 bg-green-600 text-white text-xs px-3 py-1 rounded-full">Baru!</span>
                @endif
            </div>
        </div>

        {{-- Informasi Buku --}}
        <div class="space-y-4">
            <h2 class="text-3xl font-extrabold text-[#4e342e]">{{ $buku->judul }}</h2>

            <div class="space-y-2 text-sm text-[#3e2723]">
                <p><span class="font-semibold">📚 Pengarang:</span> {{ $buku->pengarang }}</p>
                <p><span class="font-semibold">🏷️ Kategori:</span> {{ $buku->kategori->nama_kategori }}</p>
                <p><span class="font-semibold">🏢 Penerbit:</span> {{ $buku->penerbit->nama_penerbit }}</p>
                <p><span class="font-semibold">📅 Tahun Terbit:</span> {{ $buku->tahun_terbit }}</p>
            </div>

            <p class="text-gray-700 leading-relaxed text-sm">
                Buku ini merupakan salah satu koleksi unggulan dari RI Library. Ditulis oleh penulis berpengalaman, buku ini menawarkan wawasan menarik dan cocok untuk semua kalangan pembaca.
            </p>

            {{-- Tombol Kembali --}}
            <a href="{{ route('homepage') }}"
                class="inline-block mt-4 bg-[#0b445e] text-white px-6 py-2 rounded-lg shadow hover:bg-[#37667b] transition duration-300">
                ← Kembali ke Katalog
            </a>
        </div>
    </div>
</section>

@endsection
