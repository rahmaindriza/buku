@include('layout.header')

<h3 class="text-xl font-bold mb-4">Buat Buku</h3>

<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="block font-bold mb-2">Judul Buku:</label>
        <input type="text" name="judul" value="{{ old('judul') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded @error('judul') border-red-500 @enderror"
            placeholder="Masukkan Judul Buku">
        @error('judul')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Pengarang:</label>
        <input type="text" name="pengarang" value="{{ old('pengarang') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded @error('pengarang') border-red-500 @enderror"
            placeholder="Masukkan Nama Pengarang">
        @error('pengarang')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}"
            class="w-full px-3 py-2 border border-gray-300 rounded @error('tahun_terbit') border-red-500 @enderror"
            placeholder="Masukkan Tahun Terbit">
        @error('tahun_terbit')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Penerbit:</label>
        <select name="penerbit_id" class="w-full px-3 py-2 border border-gray-300 rounded @error('penerbit_id') border-red-500 @enderror">
            <option value="">-- Pilih Penerbit --</option>
            @foreach ($penerbit as $p)
                <option value="{{ $p->id }}" {{ old('penerbit_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_penerbit }}
                </option>
            @endforeach
        </select>
        @error('penerbit_id')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Kategori:</label>
        <select name="kategori_id" class="w-full px-3 py-2 border border-gray-300 rounded @error('kategori_id') border-red-500 @enderror">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="block font-bold mb-2">Gambar Sampul (optional):</label>
        <input type="file" name="file_cover" class="w-full px-3 py-2 border border-gray-300 rounded">
    </div>

    <button type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Simpan
    </button>
</form>

@include('layout.footer')
