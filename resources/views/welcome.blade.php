@include('layout.header')

{{-- Statistik data --}}
<section class="container mx-auto mb-8">
    <h2 class="text-xl font-bold">
        @if(Auth::user()->role === 'admin')
            Selamat Datang, Admin {{ Auth::user()->name }} 👋
        @else
            Selamat Datang di PERPUSKU, {{ Auth::user()->name }} 📚
        @endif
    </h2>

    <p class="font-medium mt-2">
        @if(Auth::user()->role === 'admin')
            Anda dapat mengelola seluruh data perpustakaan. Silakan gunakan menu di sebelah kiri untuk memulai.
        @else
            Anda dapat melihat buku dan melakukan peminjaman. Gunakan menu di sebelah kiri untuk mulai menggunakan PERPUSKU.
        @endif
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-6">
        <div class="bg-green-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Kategori</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlKategori'] }}</p>
        </div>

        <div class="bg-red-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Penerbit</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlPenerbit'] }}</p>
        </div>

        <div class="bg-blue-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Buku</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlSemuaBuku'] }}</p>
        </div>

        <div class="bg-yellow-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Anggota</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlAnggota'] }}</p>
        </div>
    </div>
</section>

{{-- Grafik --}}
<section class="container mx-auto mb-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Buku per Kategori</h2>
    <canvas id="grafikBukuKategori" width="400" height="100"></canvas>
</section>

{{-- Tabel user untuk disetujui (khusus admin) --}}
@if(Auth::user()->role === 'admin')
<section class="container mx-auto mt-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar User Menunggu Persetujuan</h2>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Nama</th>
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Status</th>
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($users as $u)
                    <tr>
                        <td class="px-4 py-2">{{ $u->name }}</td>
                        <td class="px-4 py-2">{{ $u->email }}</td>
                        <td class="px-4 py-2">
                            @if($u->is_approved)
                                <span class="text-green-600 font-semibold">Disetujui</span>
                            @else
                                <span class="text-red-500 font-semibold">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if(!$u->is_approved)
                                <form action="{{ route('user.approve', $u->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                        Setujui
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">Tidak ada user baru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endif

{{-- Script Chart --}}
<script>
  const ctx = document.getElementById('grafikBukuKategori');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($namaKategori) !!},
      datasets: [{
        label: 'Jumlah buku',
        data: {!! json_encode($jumlahBuku) !!},
        backgroundColor:[
            '#55efc4','#a29bfe', '#ff7675', '#3498db', '#e74c3c',
            '#7f8c8d', '#34495e', '#81ecec', '#e67e22', '#fd79a8'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@include('layout.footer')
