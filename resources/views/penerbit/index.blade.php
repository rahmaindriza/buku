@include('layout.header')
<h3 class="judul-h3">Penerbit</h3>
<div style="display: flex; justify-content: space-between;align-items:center;">
    <a href="{{ route('penerbit.create') }}" class="tombol-biru">Tambah</a>
    <form action="{{ route('penerbit.index') }}" method="get" class="flex items-center">
        <input type="text" name="cari" id="" class="w-full px-3 py-1 border border-gray-300 rounded"
            placeholder="Cari Nama penrbit...">
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
                        <a href="{{ route('penerbit.show', $r->id) }}" class="tombol-hijau">Detail</a>
                        <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol-orange">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol-merah">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-3">
    {{-- {{ $allBuku->links('vendor.pagination.buatanku') }} --}}
    {{ $allPenerbit->links('vendor.pagination.tailwind') }}
</div>
@include('layout.footer')
