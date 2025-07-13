@include('layout.header')

<section class="max-w-2xl mx-auto bg-[#e4f5fd] shadow-md rounded-lg p-6 mt-8">
    <div class="flex items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#0b445e] mr-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
        <h3 class="text-2xl font-semibold text-gray-800">Edit Buku</h3>
    </div>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block text-gray-700 font-medium mb-1">Judul Buku</label>
            <input type="text" name="judul" id="judul" value="{{ $buku->judul }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Masukkan judul buku">
        </div>

        <div>
            <label for="pengarang" class="block text-gray-700 font-medium mb-1">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Masukkan nama pengarang">
        </div>

        <div>
            <label for="tahun_terbit" class="block text-gray-700 font-medium mb-1">Tahun Terbit</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" value="{{ $buku->tahun_terbit }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none"
                   placeholder="Contoh: 2023">
        </div>

        <div>
            <label for="penerbit_id" class="block text-gray-700 font-medium mb-1">Penerbit</label>
            <select name="penerbit_id" id="penerbit_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none">
                @foreach ($penerbit as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $buku->penerbit_id ? 'selected' : '' }}>
                        {{ $p->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="kategori_id" class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="kategori_id" id="kategori_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id == $buku->kategori_id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Gambar Sampul</label>
            @if ($buku->cover)
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Lama" class="w-24 mb-2 rounded-md shadow">
            @endif
            <input type="file" name="file_cover"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0b445e] focus:outline-none">
            <input type="hidden" name="cover_lama" value="{{ $buku->cover }}">
        </div>

        <div class="text-left">
            <button type="submit"
                    class="inline-flex items-center bg-[#0b445e] hover:bg-[#3d6b80] text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Update Buku
            </button>
        </div>
    </form>
</section>

@include('layout.footer')
