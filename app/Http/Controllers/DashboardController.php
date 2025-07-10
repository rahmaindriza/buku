<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'user' && !$user->is_approved) {
            Auth::logout();
            return redirect()->route('homepage')->withErrors([
                'email' => 'Akun Anda belum disetujui oleh admin.'
            ]);
        }

        $data = [
            'jmlKategori' => Kategori::count(),
            'jmlPenerbit' => Penerbit::count(),
            'jmlSemuaBuku' => Buku::count(),
            'jmlAnggota' => Anggota::count(),
        ];

        $kategori = Kategori::withCount('bukus')->get();
        $namaKategori = $kategori->pluck('nama_kategori')->toArray();
        $jumlahBuku = $kategori->pluck('bukus_count')->toArray();

        $users = [];

        if ($user->role === 'admin') {
            // ✅ Ambil hanya user yang belum disetujui
            $users = User::where('role', 'user')
                        ->where('is_approved', false)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
        }

        return view('welcome', compact('data', 'namaKategori', 'jumlahBuku', 'users', 'user'));
    }
}
