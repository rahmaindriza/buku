@include('layout.header')

<section class="max-w-xl mx-auto bg-[#e4f5fd] shadow-md rounded-lg p-6 mt-6">
    <div class="flex items-center gap-2 mb-6">
        {{-- Icon Edit (Pencil) --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#0b445e]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
        </svg>
        <h3 class="text-2xl font-semibold text-gray-800">Edit Penerbit</h3>
    </div>

    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_penerbit" class="block text-sm font-medium text-gray-700 mb-1">Nama Penerbit</label>
            <input
                type="text"
                name="nama_penerbit"
                id="nama_penerbit"
                value="{{ $penerbit->nama_penerbit }}"
                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500"
                required
            >
        </div>

        <button type="submit"
            class="inline-flex items-center gap-2 bg-[#0072a7] hover:bg-[#0b445e] text-white px-4 py-2 rounded-md transition duration-200">
            {{-- Icon Save --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            Update
        </button>
    </form>
</section>

@include('layout.footer')
