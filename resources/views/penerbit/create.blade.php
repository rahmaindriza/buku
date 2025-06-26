@include('layout.header')
<h3 class="judul-h3">Buat Penerbit</h3>
<form action="{{ route('penerbit.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="block font-bold mb-2">Nama Kategori:</label>
        <input type="text" name="nama_penerbit" value="{{ old('nama_penerbit' )}}" id=""
         placeholder="Masukkan Nama Penerbit"
        class="w-full px-3 py-2 border-gray-300 rounded
        @error('nama_penerbit')
        input-invalid
        @enderror">
        @error('nama_penerbit')
        <div class="mt-1 text-red-500 text-sm">{{ $message}}</div>

        @enderror


    </div>
    <button type="submit" class="tombol-biru">Submit</button>
</form>

@include('layout.footer')
