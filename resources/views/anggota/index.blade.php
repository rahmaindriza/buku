@include('layout.header')

<h3 class="judul-h3">Anggota</h3>

<div style="display: flex; justify-content: space-between;align-items:center;">
    {{-- Tambah bisa untuk admin dan user --}}
    <a href="{{ route('anggota.create') }}" class="tombol-biru">Tambah</a>

    <form action="{{ route('anggota.index') }}" method="get" class="flex items-center">
        <input type="text" name="cari" class="w-full px-3 py-1 border border-gray-300 rounded"
            placeholder="Cari Nama Anggota...">
        <button type="submit" class="tombol-hijau ml-2">Cari</button>
    </form>
</div>

<table class="tabel-1">
    <thead>
        <tr class="bg-gray-100">
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Anggota</th>
            <th class="custom_th">Alamat</th>
            <th class="custom_th">No. Telepon</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allAnggota as $key => $row)
            <tr>
                <td class="custom_td">{{ $key + $allAnggota->firstItem() }}</td>
                <td class="custom_td">{{ $row->nama_anggota }}</td>
                <td class="custom_td">{{ $row->alamat }}</td>
                <td class="custom_td">{{ $row->no_telepon }}</td>
                <td class="custom_td" width="210px">
                    {{-- Aksi: Detail & Edit selalu tampil --}}
                    <a href="{{ route('anggota.show', $row->id) }}" class="tombol-hijau">Detail</a>
                    <a href="{{ route('anggota.edit', $row->id) }}" class="tombol-orange">Edit</a>

                    {{-- Tombol hapus hanya untuk admin --}}
                    @if(auth()->user()->role == 'admin')
                        <form action="{{ route('anggota.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol-merah"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $allAnggota->links('vendor.pagination.tailwind') }}
</div>

@include('layout.footer')
