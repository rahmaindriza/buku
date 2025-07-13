@include('layout.header')

<section class="max-w-7xl mx-auto p-4 mt-6">
    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">📖 Peminjaman Buku</h3>
        <a href="{{ route('peminjaman.create') }}"
           class="inline-flex items-center bg-[#0b445e] hover:bg-[#185d7b] text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Peminjaman
        </a>
    </div>

    {{-- Form Pencarian dan Filter --}}
    <form action="{{ route('peminjaman.index') }}" method="GET" class="flex flex-wrap gap-3 mb-4">
        <input type="text" name="cari" value="{{ request('cari') }}"
               class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-64 focus:ring-2 focus:ring-[#0b445e]"
               placeholder="Cari nama anggota...">

        <select name="status"
                class="px-4 py-2 border border-gray-300 rounded-md w-full sm:w-48 focus:ring-2 focus:ring-[#0b445e]">
            <option value="">-- Semua Status --</option>
            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
            <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
        </select>

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition duration-200">
            Cari
        </button>
    </form>

    {{-- Tabel Data --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 border border-gray-300">No.</th>
                    <th class="px-4 py-3 border border-gray-300">Nama Anggota</th>
                    <th class="px-4 py-3 border border-gray-300">Tgl Peminjaman</th>
                    <th class="px-4 py-3 border border-gray-300">Rencana Kembali</th>
                    <th class="px-4 py-3 border border-gray-300">Status</th>
                    <th class="px-4 py-3 border border-gray-300 text-center">Aksi</th>
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
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="px-4 py-3 border border-gray-200">{{ $key + $allPeminjaman->firstItem() }}</td>
                        <td class="px-4 py-3 border border-gray-200">{{ $row->anggota->nama_anggota }}</td>
                        <td class="px-4 py-3 border border-gray-200">{{ $row->tgl_peminjaman }}</td>
                        <td class="px-4 py-3 border border-gray-200">{{ $row->tgl_rencana_kembali }}</td>
                        <td class="px-4 py-3 border border-gray-200">
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $badgeColor }}">
                                {{ ucfirst($row->status_pengembalian) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border border-gray-200 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('peminjaman.show', $row->id) }}"
                                   class="inline-flex items-center px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded shadow text-xs"
                                   title="Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>

                                @if(auth()->user()->role == 'admin')
                                    <form action="{{ route('peminjaman.destroy', $row->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded shadow text-xs"
                                                title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $allPeminjaman->links('vendor.pagination.tailwind') }}
    </div>
</section>

@include('layout.footer')

{{-- Auto hide success alert --}}
<script>
    setTimeout(() => {
        const alert = document.querySelector('div.bg-green-100');
        if (alert) alert.remove();
    }, 3000);
</script>
