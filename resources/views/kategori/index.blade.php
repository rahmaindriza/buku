@include('layout.header')

<h3 class="judul-h3">Kategori</h3>

<div style="display: flex; justify-content: space-between;align-items:center;">
    {{-- TOMBOL TAMBAH HANYA UNTUK ADMIN --}}
    @if(auth()->user()->role == 'admin')
        <a href="{{ route('kategori.create') }}" class="tombol-biru">Tambah</a>
    @endif

    <form action="{{ route('kategori.index') }}" method="get" class="flex items-center">
        <input type="text" name="cari" class="w-full px-3 py-1 border border-gray-300 rounded"
            placeholder="Cari Nama kategori...">
        <button type="submit" class="tombol-hijau ml-2">Cari</button>
    </form>
</div>

<table class="tabel-1">
    <thead>
        <tr class="bg-gray-100">
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Kategori</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allKategori as $key => $row)
            <tr>
                <td class="custom_td">{{ $key + $allKategori->firstItem() }}</td>
                <td class="custom_td">{{ $row->nama_kategori }}</td>
                <td class="custom_td">
                    {{-- Semua role boleh lihat detail --}}
                    <a href="{{ route('kategori.show', $row->id) }}" class="tombol-hijau ">Detail</a>

                    {{-- Tombol edit & hapus hanya untuk admin --}}
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('kategori.edit', $row->id) }}" class="tombol-orange">Edit</a>
                        <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline;">
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
    {{ $allKategori->links('vendor.pagination.tailwind') }}
</div>

@include('layout.footer')
