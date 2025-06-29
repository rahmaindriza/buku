
@extends('frontend.master')
@section('title', 'Katalog Buku')

@section('content')


   {{--section Detail Buku --}}
<section class="container max-w-6x1 mx-auto  py-6">
    <div class="bg-white shadow-lg p-6 flex rounded-lg flex-col md:flex-row gap-6">
                <div class="w-full md:w-full">
                    @if ($buku->cover)
                        <img src="{{ asset('storage/' . $buku->cover)}}" alt="Cover Buku"
                            class="w-full h-auto rouded-md object-cover">
                    @else
                        <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover Buku"
                           class="w-full h-auto rouded-md object-cover">
                    @endif
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-blue-800">{{ $buku->judul }}</h2>
                    <p class="text-gray-600 text-sm">Pengarang: {{ $buku->pengarang}}</p>
                    <p class="text-gray-600 text-sm">Kategori: {{ $buku->kategori->nama_kategori}}</p>
                    <p class="text-gray-600 text-sm">Penerbit: {{ $buku->penerbit->nama_penerbit}}</p>
                    <p class="text-gray-600 text-sm">Tahun: {{ $buku->tahun_terbit}}</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                         Lorem Ipsum has been the industry's standard dummy
                          ever since the 1500s, when an unknown printer took
                          a galley of type and scrambled it to make a type specimen book.</p>

                        <a href="{{ route('homepage') }}"
                             class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg
                            hover:bg-blue-800">Kembali ke Homepage</a>
                </div>
            </div>


    </section>
 @endsection

