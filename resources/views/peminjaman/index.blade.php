@include('layout.header')

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<h3 class="judul-h3">Peminjaman Buku</h3>

<div class="flex justify-between items-center flex-wrap gap-4 mb-4">
    {{-- Tombol Tambah --}}
    <a href="{{ route('peminjaman.create') }}" class="tombol-biru">Tambah</a>

    {{-- Form Pencarian --}}
    <form action="{{ route('peminjaman.index') }}" method="GET" class="flex flex-wrap gap-2">
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

<table class="w-full border border-gray-300 rounded-md overflow-hidden shadow-md">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Anggota</th>
            <th class="custom_th">Tanggal Peminjaman</th>
            <th class="custom_th">Rencana Kembali</th>
            <th class="custom_th">Status Pengembalian</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPeminjaman as $key => $row)
        @php
            $status = strtolower($row->status_pengembalian);
            $badgeColor = match($status) {
                'dikembalikan' => 'bg-blue-100 text-blue-800',
                'dipinjam'     => 'bg-yellow-100 text-yellow-800',
                'terlambat'    => 'bg-red-100 text-red-800',
                default        => 'bg-gray-100 text-gray-700',
            };
        @endphp
        <tr class="hover:bg-gray-50">
            <td class="custom_td">{{ $key + $allPeminjaman->firstItem() }}</td>
            <td class="custom_td">{{ $row->anggota->nama_anggota }}</td>
            <td class="custom_td">{{ $row->tgl_peminjaman }}</td>
            <td class="custom_td">{{ $row->tgl_rencana_kembali }}</td>
            <td class="custom_td">
                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $badgeColor }}">
                    {{ ucfirst($row->status_pengembalian) }}
                </span>
            </td>
            <td class="custom_td">
                <form action="{{ route('peminjaman.destroy', $row->id) }}" method="POST" class="flex gap-2 items-center">
                    <a href="{{ route('peminjaman.show', $row->id)}}" class="tombol-hijau">Detail</a>
                    @if(auth()->user()->role == 'admin')
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol-merah"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $allPeminjaman->links('vendor.pagination.tailwind') }}
</div>

@include('layout.footer')

<script>
    setTimeout(function () {
        const alert = document.querySelector('div.bg-green-100');
        if (alert) alert.style.display = 'none';
    }, 3000);
</script>
