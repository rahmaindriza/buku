@include('layout.header')

<h3 class="judul-h3"> Edit Anggota</h3>
<form action="{{ route('anggota.update', $anggota) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-bold mb-2">NIS</label>
        <input type="text" name="nis" value="{{ $anggota->nis }}"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Nama Anggota</label>
        <input type="text" name="nama_anggota" value="{{ $anggota->nama_anggota }}"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Kelas</label>
        <input type="text" name="kelas" value="{{ $anggota->kelas }}"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full px-3 py-2 border-gray-300 rounded">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" {{ $anggota->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $anggota->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Alamat</label>
        <input type="text" name="alamat" value="{{ $anggota->alamat }}"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">No. Telepon</label>
        <input type="text" name="no_telepon" value="{{ $anggota->no_telepon }}"
               class="w-full px-3 py-2 border-gray-300 rounded">
    </div>

    <button type="submit" class="tombol-biru">Update</button>
</form>

@include('layout.footer')
