@include('layout.header')

<div class="max-w-4xl mx-auto mt-8 bg-[#e4f5fd] rounded-lg shadow-lg p-6 border border-black-200">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-[#5D4037]">📚 Detail Peminjaman</h2>
        <a href="{{ route('peminjaman.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
            ← Kembali
        </a>
    </div>

    <div class="space-y-2 text-sm text-gray-800 mb-6">
        <p><span class="font-semibold text-gray-600">👤 Nama Anggota:</span> {{ $peminjaman->anggota->nama_anggota }}</p>
        <p><span class="font-semibold text-gray-600">📅 Tanggal Peminjaman:</span> {{ $peminjaman->tgl_peminjaman }}</p>
        <p><span class="font-semibold text-gray-600">📌 Status Pengembalian:</span>
            <span class="px-2 py-1 rounded-full text-white
                {{ $peminjaman->status_pengembalian == 'Dikembalikan' ? 'bg-green-500' : ($peminjaman->status_pengembalian == 'Terlambat' ? 'bg-red-500' : 'bg-yellow-500') }}">
                {{ $peminjaman->status_pengembalian }}
            </span>
        </p>
        <p><span class="font-semibold text-gray-600">📆 Rencana Pengembalian:</span> {{ $peminjaman->tgl_rencana_kembali }}</p>
    </div>

    <div class="overflow-x-auto mt-6">
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-[#EFEBE9] text-[#4E342E]">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border text-left">Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman->buku as $key => $buku)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $buku->judul }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($peminjaman->status_pengembalian == 'DiPinjam')
    <div class="mt-10 bg-[#FBE9E7] p-6 rounded-lg shadow-inner border">
        <h3 class="text-xl font-semibold text-[#D84315] mb-4">🔁 Form Pengembalian Buku</h3>
        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium mb-1">Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" value="{{ date('Y-m-d') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-orange-200">
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                Proses Pengembalian
            </button>
        </form>
    </div>
    @endif
</div>

@include('layout.footer')
