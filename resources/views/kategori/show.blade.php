@include('layout.header')

<section class="max-w-2xl mx-auto bg-[#e4f5fd] shadow-md rounded-lg p-6 mt-6">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            {{-- Icon Folder dari Heroicons --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#0b445e]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
            </svg>
            <h3 class="text-2xl font-semibold text-gray-800">Detail Kategori</h3>
        </div>
        <a href="{{ route('kategori.index') }}"
           class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-200">
            ← Kembali
        </a>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <dl class="space-y-4">
            <div class="flex">
                <dt class="w-48 font-medium text-gray-700">Nama Kategori</dt>
                <dd class="text-gray-900">: {{ $kategori->nama_kategori }}</dd>
            </div>
        </dl>
    </div>
</section>

@include('layout.footer')
