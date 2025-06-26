@include('layout.header')
    <h3 class="judul-h3"> Tambah Anggota</h3>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
   <div class="mb-4">

        <label for="" class="block font-bold mb-2">Nama Anggota:</label>
        <input type="text" name="nama_anggota" id="" placeholder="Masukkan Nama Anggota"
        class="w-full px-3 py-2 border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Alamat</label>
       <input type="text" name="alamat" id="" placeholder="Masukkan Alamat Anggota"
        class="w-full px-3 py-2 border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">No. Telepon</label>
       <input type="text" name="no_telepon" id="" placeholder="Masukkan No telepon "
        class="w-full px-3 py-2 border-gray-300 rounded">
    </div>
        <button type="submit" class="tombol-biru">Submit</button>
    </form>

@include('layout.footer')

