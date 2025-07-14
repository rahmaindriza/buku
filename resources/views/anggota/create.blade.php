@include('layout.header')

<div class="max-w-2xl mx-auto bg-[#e4f5fd] shadow-xl rounded-xl p-8 mt-12 border border-gray-200">
    <h3 class="text-2xl font-bold text-center text-[#5D4037] mb-8">👤 Tambah Anggota Baru</h3>

    <form action="{{ route('anggota.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
            <input type="text" name="nis" placeholder="Masukkan NIS"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Anggota</label>
            <input type="text" name="nama_anggota" placeholder="Masukkan Nama Anggota"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
            <input type="text" name="kelas" placeholder="Contoh: XI "
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat Lengkap"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
            <input type="text" name="no_telepon" placeholder="08xxxxxxxxxx"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#5D4037]">
        </div>

        <div class="text-center pt-4">
            <button type="submit"
                    class="bg-[#0b445e] hover:bg-[#348cb4] text-white font-semibold px-8 py-2 rounded-full shadow-md transition duration-300">
                ➕ Simpan Anggota
            </button>
        </div>
    </form>
</div>

@include('layout.footer')
