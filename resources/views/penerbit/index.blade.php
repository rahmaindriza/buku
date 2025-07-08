@include('layout.header')

<h3 class="judul-h3">Penerbit</h3>

<div style="display: flex; justify-content: space-between;align-items:center;">
    {{-- Tombol tambah hanya untuk admin --}}
    @if(auth()->user()->role == 'admin')
        <a href="{{ route('penerbit.create') }}" class="tombol-biru">Tambah</a>
    @endif

    <form action="{{ route('penerbit.index') }}" method="get" class="flex items-center">
        <input type="text" name="cari" id="" class="w-full px-3 py-1 border border-gray-300 rounded"
            placeholder="Cari Nama penerbit...">
        <button type="submit" class="tombol-hijau ml-2">Cari</button>
    </form>
</div>

<table class="tabel-1">
    <thead>
        <tr>
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Penerbit</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPenerbit as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + $allPenerbit->firstItem() }}</td>
                <td class="custom_td">{{ $r->nama_penerbit }}</td>
                <td class="custom_td" width="210">
                    <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST">
                        {{-- Tombol detail selalu tampil --}}
                        <a href="{{ route('penerbit.show', $r->id) }}" class="tombol-hijau">Detail</a>

                        {{-- Edit dan Hapus hanya untuk admin --}}
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol-orange">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol-merah" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $allPenerbit->links('vendor.pagination.tailwind') }}
</div>

@include('layout.footer')
