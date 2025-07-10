@include('layout.header')

<h3 class="judul-h3"> Tambah Anggota</h3>
<form action="{{ route('anggota.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block font-bold mb-2">NIS</label>
        <input type="text" name="nis" placeholder="Masukkan NIS"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Nama Anggota</label>
        <input type="text" name="nama_anggota" placeholder="Masukkan Nama Anggota"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Kelas</label>
        <input type="text" name="kelas" placeholder="Masukkan Kelas"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full px-3 py-2 border-gray-300 rounded">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Alamat</label>
        <input type="text" name="alamat" placeholder="Masukkan Alamat Anggota"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">No. Telepon</label>
        <input type="text" name="no_telepon" placeholder="Masukkan No Telepon"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <button type="submit" class="tombol-biru">Submit</button>
</form>

@include('layout.footer')
