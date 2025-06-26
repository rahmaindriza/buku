@include('layout.header')
    <h3 class="judul-h3"> Edit Anggota</h3>
    <form action="{{ route('anggota.update', $anggota) }}" method="POST">
        @csrf
        @method('PUT')
   <div class="mb-4">

        <label for="" class="block font-bold mb-2">Nama Anggota</label>
        <input type="text" name="nama_anggota" id="" value="{{$anggota->nama_anggota}}"
         class="w-full px-3 py-2 border-gray-300 rounded" >
    </div>
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Alamat</label>
       <input type="text" name="alamat" value="{{$anggota->alamat}}"
        class="w-full px-3 py-2 border-gray-300 rounded">
    </div>
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">No. Telepon</label>
       <input type="text" name="no_telepon" value="{{$anggota->no_telepon}}"
        class="w-full px-3 py-2 border-gray-300 rounded">
    </div>
        <button type="submit" class="tombol-biru">Update</button>
    </form>

@include('layout.footer')

