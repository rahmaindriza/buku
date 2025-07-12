@extends('layout.header')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">📋 Detail User</h2>

        <div class="space-y-4 text-base text-gray-700">
            <div class="flex justify-between items-center">
                <span class="font-semibold">👤 Nama:</span>
                <span>{{ $user->name }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="font-semibold">📧 Email:</span>
                <span>{{ $user->email }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="font-semibold">🗓️ Tanggal Daftar:</span>
                <span>{{ $user->created_at->format('d M Y') }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="font-semibold">✅ Status Disetujui:</span>
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $user->is_approved ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $user->is_approved ? 'Sudah Disetujui' : 'Belum Disetujui' }}
                </span>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('user.index') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition duration-200">
                ← Kembali ke Daftar User
            </a>
        </div>
    </div>
</section>
@endsection
