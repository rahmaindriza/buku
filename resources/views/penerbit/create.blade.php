@include('layout.header')

<div class="max-w-xl mx-auto bg-[#e4f5fd] shadow-lg rounded-xl p-8 mt-12 border border-gray-200">
    <h3 class="text-2xl font-bold text-center text-[#5D4037] mb-6">🏢 Tambah Penerbit Baru</h3>

    <form action="{{ route('penerbit.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="nama_penerbit" class="block text-sm font-medium text-gray-700 mb-1">Nama Penerbit</label>
            <input type="text" name="nama_penerbit" id="nama_penerbit" value="{{ old('nama_penerbit') }}"
                placeholder="Contoh: Gramedia, Erlangga"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5D4037] text-gray-800 @error('nama_penerbit') border-red-500 @enderror">
            @error('nama_penerbit')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-[#0072a7] hover:bg-[#0b445e] text-white font-semibold px-6 py-2 rounded-full shadow-md transition duration-300">
                ➕ Simpan Penerbit
            </button>
        </div>
    </form>
</div>

@include('layout.footer')
