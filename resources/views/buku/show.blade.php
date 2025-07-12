@include('layout.header')

<div class="max-w-3xl mx-auto mt-10 bg-[#e4f5fd] shadow-lg rounded-xl p-6 border border-gray-200">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-[#5D4037]">📘 Detail Buku</h3>
        <a href="{{ route('buku.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
            ← Kembali
        </a>
    </div>

    @if ($buku->cover)
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku"
                 class="w-40 h-60 object-cover rounded shadow">
        </div>
    @endif

    <div class="grid grid-cols-1 gap-4">
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Judul Buku</span>
            <span class="text-gray-800 text-right">{{ $buku->judul }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Pengarang</span>
            <span class="text-gray-800 text-right">{{ $buku->pengarang }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Tahun Terbit</span>
            <span class="text-gray-800 text-right">{{ $buku->tahun_terbit }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Penerbit</span>
            <span class="text-gray-800 text-right">{{ $buku->penerbit->nama_penerbit }}</span>
        </div>
        <div class="flex justify-between items-start">
            <span class="font-semibold text-gray-700">Kategori</span>
            <span class="text-gray-800 text-right">{{ $buku->kategori->nama_kategori }}</span>
        </div>
    </div>
</div>

@include('layout.footer')
