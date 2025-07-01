@include('layout.header')

{{-- Statistik data --}}

<section class="container mx-auto mb-8">


<h2 class="text-xl font-bold">Selamat Datang {{ Auth::user()->name }}</h2>
<p class="font-medium">Gunakan menu di sebelah kiri untuk mengelola data </p>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-6">

        {{-- Jumlah kategori--}}
        <div class="bg-green-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total kategori</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlKategori'] }}</p>
        </div>


     {{-- Jumlah Penerbit--}}
        <div class="bg-red-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Penerbit</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlPenerbit'] }}</p>
        </div>


     {{-- Jumlah Semua buku--}}
        <div class="bg-blue-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Buku</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlSemuaBuku'] }}</p>
        </div>


     {{-- Jumlah kategori--}}
        <div class="bg-yellow-300 shadow rounded p-6 text-center border border-blue-500">
            <h2 class="text-xl font-bold text-gray-800">Total Anggota</h2>
            <p class="text-4xl font-extrabold text-blue-800">{{ $data['jmlAnggota'] }}</p>
        </div>

 </div>
</section>

{{--Grafik--}}
<section class="container mx-auto mb-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Buku per Kategori</h2>
    <canvas id="grafikBukuKategori" width="400" height="100"></canvas>
</section>



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
            '#55efc4','#a29bfe', '#ff7675', '#3498db', '#e74c3c', '#7f8c8d', '#34495e', '#81ecec', '#e67e22', '#fd79a8'

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
