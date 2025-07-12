@extends('frontend.master')
@section('title', 'Katalog Buku')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-cover bg-center text-white py-30" style="background-image: url('{{ asset('img/perpustakaan.jpg') }}');">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative container max-w-6xl mx-auto text-center px-4 z-10">
        <h1 class="text-2xl md:text-4xl font-bold mb-4 drop-shadow-lg">Selamat Datang di</h1>
        <h2 class="text-8xl md:text-8xl font-extrabold mb-6 tracking-wide drop-shadow-xl">RI-Library</h2>
        <p class="text-lg md:text-xl font-medium drop-shadow-md">Jelajahi koleksi buku terbaik kami dengan mudah dan cepat.</p>
    </div>
</section>

<!-- Carousel Section -->
<section class="bg-[#e4f5fd] py-10">
    <div class="container max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-[#5D4037] mb-6">Koleksi Terbaru</h2>
        <div class="relative">
            <div class="flex overflow-x-auto space-x-6 pb-4 scrollbar-hide snap-x snap-mandatory">
                @foreach ($koleksiTerbaru as $b)

                <div class="flex-shrink-0 w-60 bg-white shadow-md hover:shadow-xl transition duration-300 rounded-lg snap-start">
                    @if ($b->cover)
                        <img src="{{ asset('storage/' . $b->cover) }}" class="w-full h-40 object-cover rounded-t-lg">
                    @else
                        <img src="{{ asset('img/default_cover.jpg') }}" class="w-full h-40 object-cover rounded-t-lg">
                    @endif
                    <div class="p-4">
                        <h3 class="text-[#5D4037] font-semibold text-sm leading-tight mb-1">
                            <a href="{{ route('detail-buku', $b->id) }}">{{ $b->judul }}</a>
                        </h3>
                        <p class="text-xs text-gray-600">{{ $b->pengarang }}</p>
                        <p class="text-xs text-gray-500">Tahun: {{ $b->tahun_terbit }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Hide Scrollbar --}}
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

{{-- Kenapa Harus Memilih Kami --}}
<section class="container max-w-6xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold text-center text-[#5D4037] mb-6">Kenapa Harus Memilih Kami?</h2>
    <p class="text-[#5D4037] max-w-3xl mx-auto text-md mb-8">
        Kami menyediakan layanan perpustakaan yang lengkap, mudah diakses, dan didukung oleh tim profesional yang siap membantu Anda menemukan buku impian Anda. Ayo temukan buku pilihan anda dan ekspresi kan hobi anda sekarang juga. Berikut adalah beberapa alasan mengapa Anda harus memilih kami sekarang:</p>

    </p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Card 1 --}}
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition duration-300">
            <div class="w-16 h-16 mx-auto mb-4 text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 4v16h2V6h9v14h2V4H6z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-[#5D4037]">Koleksi Lengkap</h3>
            <p class="text-gray-700 text-sm">Kami menyediakan berbagai macam kategori buku dari banyak penerbit dan penulis terkemuka.</p>
        </div>

        {{-- Card 2 --}}
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition duration-300">
            <div class="w-16 h-16 mx-auto mb-4 text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-[#5D4037]">Pencarian Mudah</h3>
            <p class="text-gray-700 text-sm">Fitur pencarian dan filter membantu Anda menemukan buku dengan cepat dan efisien.</p>
        </div>

        {{-- Card 3 --}}
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition duration-300">
            <div class="w-16 h-16 mx-auto mb-4 text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 13v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16-2a4 4 0 00-8 0m4 4v2m-4-6v2" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-[#5D4037]">Layanan Ramah</h3>
            <p class="text-gray-700 text-sm">Tim kami siap membantu Anda dengan pelayanan yang cepat, ramah, dan profesional.</p>
        </div>
    </div>
</section>

@endsection
