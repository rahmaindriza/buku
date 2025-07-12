@include('layout.header')

<div class="max-w-2xl mx-auto mt-10 bg-[#e4f5fd] shadow-lg rounded-xl p-6 border border-gray-200">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-[#5D4037]">👤 Detail Anggota</h3>
        <a href="{{ route('anggota.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
            ← Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">NIS</span>
            <span class="text-gray-800">{{ $anggota->nis }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Nama</span>
            <span class="text-gray-800">{{ $anggota->nama_anggota }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Kelas</span>
            <span class="text-gray-800">{{ $anggota->kelas }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Jenis Kelamin</span>
            <span class="text-gray-800">{{ $anggota->jenis_kelamin }}</span>
        </div>
        <div class="flex justify-between items-start border-b pb-2">
            <span class="font-semibold text-gray-700">Alamat</span>
            <span class="text-gray-800 text-right">{{ $anggota->alamat }}</span>
        </div>
        <div class="flex justify-between items-start">
            <span class="font-semibold text-gray-700">No. Telepon</span>
            <span class="text-gray-800">{{ $anggota->no_telepon }}</span>
        </div>
    </div>
</div>

@include('layout.footer')
