@include('layout.header')

{{-- Statistik data --}}

<section class="container mx-auto mb-8">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

        {{-- Jumlah kategori--}}
        <div class="bg-green-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total kategori</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlKategori'] }}</p>
        </div>


     {{-- Jumlah Penerbit--}}
        <div class="bg-red-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Penerbit</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlPenerbit'] }}</p>
        </div>


     {{-- Jumlah Semua buku--}}
        <div class="bg-blue-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Buku</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlSemuaBuku'] }}</p>
        </div>


     {{-- Jumlah kategori--}}
        <div class="bg-yellow-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Anggota</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlAnggota'] }}</p>
        </div>

 </div>
</section>

<h2 class="text-xl font-bold">Selamat Datang {{ Auth::user()->name }}</h2>
<p class="font-medium">Gunakan menu di sebelah kiri untuk mengelola data seperti</p>

@include('layout.footer')
