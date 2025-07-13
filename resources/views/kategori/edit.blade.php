@include('layout.header')

<section class="max-w-xl mx-auto bg-[#e4f5fd] shadow-md rounded-lg p-6 mt-8">
    <div class="flex items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#0b445e] mr-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
        <h3 class="text-2xl font-semibold text-gray-800">Edit Kategori</h3>
    </div>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   id="nama_kategori"
                   value="{{ $kategori->nama_kategori }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0b445e]"
                   placeholder="Masukkan nama kategori">
        </div>

        <div class="text-right">
            <button type="submit"
                    class="inline-flex items-center bg-[#0b445e] hover:bg-[#3d6b80] text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Update Kategori
            </button>
        </div>
    </form>
</section>

@include('layout.footer')
