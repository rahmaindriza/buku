@extends('layout.header')

@section('content')
<section class="container mx-auto mb-8">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Data User Terdaftar</h2>

    {{-- Info jumlah user yang disetujui --}}
    <p class="mb-4 text-sm text-green-700">
        Total User Disetujui: {{ $users->count() }}
    </p>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($users as $index => $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">
                            Belum ada user yang disetujui.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
