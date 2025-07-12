@include('layout.header')

<div class="max-w-xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-12 border border-gray-200">
    <h3 class="text-2xl font-bold text-center text-[#5D4037] mb-6">🗂️ Tambah Kategori Baru</h3>

    <form action="{{ route('kategori.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}"
                placeholder="Contoh: Fiksi, Sains, Novel"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-gray-800 @error('nama_kategori') border-red-500 @enderror">
            @error('nama_kategori')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-[#0b445e] hover:bg-[#3d6b80] text-white font-semibold px-6 py-2 rounded-full shadow-md transition duration-300">
                ➕ Simpan Kategori
            </button>
        </div>
    </form>
</div>

@include('layout.footer')
