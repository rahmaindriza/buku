@include('layout.header')

<div class="max-w-xl mx-auto mt-10 bg-[#e4f5fd] shadow-lg rounded-lg p-6 border border-gray-200">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-[#5D4037]">🏢 Detail Penerbit</h3>
        <a href="{{ route('penerbit.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
            ← Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="flex justify-between items-center border-b pb-3">
            <span class="font-semibold text-gray-700">Nama Penerbit</span>
            <span class="text-gray-800 text-right">{{ $penerbit->nama_penerbit }}</span>
        </div>
    </div>
</div>

@include('layout.footer')
