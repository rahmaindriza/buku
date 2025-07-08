@extends('layout.header')

@section('content')
<section class="container mx-auto mb-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Detail User</h2>

    <div class="bg-white rounded shadow p-6 space-y-4">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Tanggal Daftar:</strong> {{ $user->created_at->format('d M Y') }}</p>
        <p><strong>Status Disetujui:</strong>
            @if($user->is_approved)
                <span class="text-green-600 font-semibold">Sudah Disetujui</span>
            @else
                <span class="text-red-600 font-semibold">Belum Disetujui</span>
            @endif
        </p>
    </div>

    <div class="mt-6">
        <a href="{{ route('user.index') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-200">
            ← Kembali ke Daftar User
        </a>
    </div>
</section>
@endsection
