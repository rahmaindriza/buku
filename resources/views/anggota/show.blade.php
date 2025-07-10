@include('layout.header')

<div class="flex items-center justify-between">
    <h3 class="judul-h3">Detail Anggota</h3>
    <a href="{{ route('anggota.index') }}" class="tombol-abu">← Kembali</a>
</div>

<table class="tabel-1 mt-4">
    <tbody>
        <tr>
            <td width="150px" class="px-4 py-2 font-semibold">NIS</td>
            <td width="2px" class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->nis }}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-semibold">Nama</td>
            <td class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->nama_anggota }}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-semibold">Kelas</td>
            <td class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->kelas }}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-semibold">Jenis Kelamin</td>
            <td class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-semibold">Alamat</td>
            <td class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->alamat }}</td>
        </tr>
        <tr>
            <td class="px-4 py-2 font-semibold">No. Telepon</td>
            <td class="px-4 py-2">:</td>
            <td class="px-4 py-2">{{ $anggota->no_telepon }}</td>
        </tr>
    </tbody>
</table>

@include('layout.footer')
