@extends('layout.header')

@section('content')
<section class="max-w-6xl mx-auto p-4 mt-6 mb-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">👤 Data User Terdaftar</h2>
        <p class="text-sm text-green-700 mt-1">
            Total User Disetujui: <span class="font-semibold">{{ $users->count() }}</span>
        </p>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left border border-gray-400">
            <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
                <tr>
                    <th class="px-4 py-3 border border-gray-400">No</th>
                    <th class="px-4 py-3 border border-gray-400">Nama</th>
                    <th class="px-4 py-3 border border-gray-400">Email</th>
                    <th class="px-4 py-3 border border-gray-400">Tanggal Daftar</th>
                    <th class="px-4 py-3 border border-gray-400 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($users as $index => $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                            <a href="{{ route('user.show', $user->id) }}"
                               class="inline-flex items-center px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded text-xs shadow transition"
                               title="Detail">
                                Detail
                            </a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs shadow transition"
                                        title="Hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500 border border-gray-300">
                            Belum ada user yang disetujui.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
