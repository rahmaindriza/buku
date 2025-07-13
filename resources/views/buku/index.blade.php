@include('layout.header')

<section class="max-w-7xl mx-auto p-4 mt-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">📚 Daftar Buku</h3>

        {{-- Tombol Tambah hanya untuk admin --}}
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('buku.create') }}"
               class="inline-flex items-center bg-[#0b445e] hover:bg-[#185d7b] text-white text-sm font-medium px-4 py-2 rounded shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Buku
            </a>
        @endif
    </div>

    <form action="{{ route('buku.index') }}" method="get" class="flex items-center mb-4 space-x-2">
        <input type="text" name="cari"
               class="flex-grow px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#0b445e]"
               placeholder="Cari Judul / Pengarang / Tahun Buku...">
        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition duration-200">
            Cari
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-400 rounded-md text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 border border-gray-400">No.</th>
                    <th class="px-4 py-3 border border-gray-400">Cover</th>
                    <th class="px-4 py-3 border border-gray-400">Judul Buku</th>
                    <th class="px-4 py-3 border border-gray-400">Pengarang</th>
                    <th class="px-4 py-3 border border-gray-400">Tahun</th>
                    <th class="px-4 py-3 border border-gray-400">Penerbit</th>
                    <th class="px-4 py-3 border border-gray-400">Kategori</th>
                    <th class="px-4 py-3 text-center border border-gray-400">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allBuku as $key => $r)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">{{ $key + $allBuku->firstItem() }}</td>
                        <td class="px-4 py-3 border border-gray-300">
                            @if ($r->cover)
                                <img src="{{ asset('storage/' . $r->cover) }}" alt="Cover" class="w-16 h-20 object-cover rounded">
                            @else
                                <img src="{{ asset('img/default_cover.jpg') }}" alt="Default Cover" class="w-16 h-20 object-cover rounded">
                            @endif
                        </td>
                        <td class="px-4 py-3 border border-gray-300">{{ $r->judul }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $r->pengarang }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $r->tahun_terbit }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $r->penerbit->nama_penerbit }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $r->kategori->nama_kategori }}</td>
                        <td class="px-4 py-3 border border-gray-300 text-center space-x-2">
                            <a href="{{ route('buku.show', $r->id) }}"
                               class="inline-flex items-center px-2 py-1 bg-green-500 hover:bg-green-600 text-white rounded shadow text-xs"
                               title="Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>

                            @if(auth()->user()->role == 'admin')
                                <a href="{{ route('buku.edit', $r->id) }}"
                                   class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow text-xs"
                                   title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('buku.destroy', $r->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded shadow text-xs"
                                            title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $allBuku->links('vendor.pagination.tailwind') }}
    </div>
</section>

@include('layout.footer')
