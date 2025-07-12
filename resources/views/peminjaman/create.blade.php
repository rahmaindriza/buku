@include('layout.header')

<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-xl p-8 mt-10 border border-gray-200">
    <h3 class="text-2xl font-bold text-center text-[#5D4037] mb-8">📚 Transaksi Peminjaman Buku</h3>

    <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Pilih Anggota -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">👤 Pilih Anggota</label>
            <select name="anggota_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#5D4037] focus:outline-none">
                @foreach ($anggota as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_anggota }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Peminjaman -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📅 Tanggal Peminjaman</label>
            <input type="date" name="tgl_peminjaman"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#5D4037] focus:outline-none"
                value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
        </div>

        <!-- Tanggal Rencana Pengembalian -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📆 Tanggal Rencana Pengembalian</label>
            <input type="date" name="tgl_rencana_kembali"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#5D4037] focus:outline-none"
                required min="{{ date('Y-m-d') }}">
        </div>

        <!-- Katalog Buku -->
        <div>
            <h4 class="text-lg font-semibold text-[#5D4037] mb-3">📖 Pilih Buku yang Dipinjam</h4>
            <div class="overflow-y-scroll h-64 border border-gray-300 p-4 rounded-md bg-gray-50">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach ($bukus as $buku)
                        <div class="bg-white rounded-lg p-3 shadow-sm flex flex-col items-center hover:shadow-md transition">
                            @if ($buku->cover)
                                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover"
                                    class="w-20 h-28 object-cover rounded mb-2">
                            @else
                                <img src="{{ asset('img/default_cover.jpg') }}" alt="Cover"
                                    class="w-20 h-28 object-cover rounded mb-2">
                            @endif
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="buku_ids[]" value="{{ $buku->id }}" class="text-[#5D4037]">
                                <span class="text-sm text-center text-gray-700">{{ $buku->judul }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="text-center pt-4">
            <button type="submit"
                class="bg-[#0b445e] hover:bg-[#5589a1] text-white font-semibold px-8 py-2 rounded-full shadow-md transition duration-300">
                💾 Simpan Peminjaman
            </button>
        </div>
    </form>
</div>

@include('layout.footer')
