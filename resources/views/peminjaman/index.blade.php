
@include('layout.header')

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<h3 class="judul-h3">Peminjaman Buku</h3>
<div style="display: flex; justify-content: space-between;align-items:center;">
    <a href="{{ route('peminjaman.create') }}" class="tombol-biru">Tambah</a>
   {{-- Form Pencarian --}}
<form action="{{ route('peminjaman.index') }}" method="GET" class="flex flex-wrap gap-2 mb-4">
    <input type="text" name="cari" value="{{ request('cari') }}"
        class="px-3 py-2 border border-gray-300 rounded w-full sm:w-auto"
        placeholder="Cari nama anggota...">

    <select name="status" class="px-3 py-2 border border-gray-300 rounded w-full sm:w-auto">
        <option value="">-- Semua Status --</option>
        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
        <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
        <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
    </select>

    <button type="submit" class="tombol-hijau">Cari</button>
</form>
</div>
<table class="tabel-1">
    <thead>
        <tr class="bg-gray-100">
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Anggota</th>
            <th class="custom_th">Tanggal </th>
            <th class="custom_th">Rencana Kembali</th>
            <th class="custom_th">Status Pengembalian</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPeminjaman as $key => $row)
        <tr>
           <td class="custom_td">{{ $key + $allPeminjaman->firstItem() }}</td>
            <td class="custom_td">{{ $row->tgl_peminjaman }}</td>
           <td class="custom_td">{{ $row->tgl_rencana_kembali }}</td>
            <td class="custom_td">{{ $row->anggota->nama_anggota }}</td>
            <td class="custom_td">{{ $row->status_pengembalian }}</td>
            <td class="custom_td">
                <form action="{{ route('peminjaman.destroy', $row->id) }}"
                     method="POST">
                    <a href="{{ route('peminjaman.show', $row->id)}}"
                    class="tombol-hijau">Detail</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="tombol-merah"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>

                </form>
            </td>


        </tr>

        @endforeach
    </tbody>

</table>
<div class="mt-3">
    {{-- {{ $allBuku->links('vendor.pagination.buatanku') }} --}}
    {{ $allPeminjaman->links('vendor.pagination.tailwind') }}
</div>

@include('layout.footer')
<script>
    setTimeout(function () {
        const alert = document.querySelector('div[style*="background-color"]');
        if (alert) alert.style.display = 'none';
    }, 3000);
</script>

