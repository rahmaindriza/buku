@include('layout.header')

<section class="max-w-2xl mx-auto bg-[#e4f5fd] shadow-md rounded-lg p-6 mt-8">
    <div class="flex items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#0b445e] mr-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 15c2.262 0 4.376.501 6.263 1.395M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <h3 class="text-2xl font-semibold text-gray-800">Edit Anggota</h3>
    </div>

    <form action="{{ route('anggota.update', $anggota) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-medium mb-1">NIS</label>
            <input type="text" name="nis" value="{{ $anggota->nis }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Masukkan NIS">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama Anggota</label>
            <input type="text" name="nama_anggota" value="{{ $anggota->nama_anggota }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Masukkan nama lengkap">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Kelas</label>
            <input type="text" name="kelas" value="{{ $anggota->kelas }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Contoh: XII RPL 2">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ $anggota->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $anggota->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ $anggota->alamat }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Masukkan alamat">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">No. Telepon</label>
            <input type="text" name="no_telepon" value="{{ $anggota->no_telepon }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Contoh: 081234567890">
        </div>

        <div class="text-left">
            <button type="submit"
                    class="inline-flex items-center bg-[#0b445e] hover:bg-[#3d6b80] text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Update Anggota
            </button>
        </div>
    </form>
</section>

@include('layout.footer')
