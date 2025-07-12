@include('layout.header')

<div class="max-w-3xl mx-auto bg-white shadow-xl rounded-xl p-8 mt-12 border border-gray-200">
    <h3 class="text-3xl font-bold mb-6 text-[#5D4037] text-center">📚 Tambah Buku Baru</h3>

    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            {{-- Judul --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-2 text-gray-800 @error('judul') border-red-500 @enderror"
                    placeholder="Contoh: Laskar Pelangi">
                @error('judul')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Pengarang --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pengarang</label>
                <input type="text" name="pengarang" value="{{ old('pengarang') }}"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-2 text-gray-800 @error('pengarang') border-red-500 @enderror"
                    placeholder="Nama Penulis">
                @error('pengarang')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tahun Terbit --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-2 text-gray-800 @error('tahun_terbit') border-red-500 @enderror"
                    placeholder="Misal: 2023">
                @error('tahun_terbit')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar Sampul --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Sampul</label>
                <input type="file" name="file_cover"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-[7px] text-gray-700 bg-white">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            {{-- Penerbit --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                <select name="penerbit_id"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-2 bg-white text-gray-800 @error('penerbit_id') border-red-500 @enderror">
                    <option value="">-- Pilih Penerbit --</option>
                    @foreach ($penerbit as $p)
                        <option value="{{ $p->id }}" {{ old('penerbit_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_penerbit }}
                        </option>
                    @endforeach
                </select>
                @error('penerbit_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id"
                    class="w-full rounded-lg border border-gray-300 focus:ring-[#5D4037] focus:border-[#5D4037] px-4 py-2 bg-white text-gray-800 @error('kategori_id') border-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol --}}
        <div class="text-center pt-4">
            <button type="submit"
                class="bg-[#5D4037] hover:bg-[#4E342E] text-white font-semibold px-6 py-2 rounded-full shadow-md transition duration-300">
                💾 Simpan Buku
            </button>
        </div>
    </form>
</div>

@include('layout.footer')
