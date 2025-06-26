@include('layout.header')

<div class="bg-white rounded shadow p-4">
    <h2 class="text-2xl font-bold mb-2">Selamat Datang di Aplikasi Peminjaman Buku</h2>
    <p class="text-gray-700">Halo <strong>{{ Auth::user()->name }}</strong>, selamat menggunakan sistem manajemen peminjaman buku.</p>
    <div class="mt-4">
        <p>Gunakan menu di sebelah kiri untuk mengelola data seperti:</p>
        <ul class="list-disc ml-6 text-gray-700">
            <li>Kategori Buku</li>
            <li>Penerbit</li>
            <li>Daftar Buku</li>
            <li>Anggota</li>
            <li>Transaksi Peminjaman</li>
        </ul>
    </div>
</div>

@include('layout.footer')

