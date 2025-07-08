<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // Tampilkan semua user yang telah disetujui (hanya oleh admin)
    public function index()
{
    $users = User::where('role', 'user')
                ->where('is_approved', 1) // filter user yang disetujui
                ->orderBy('created_at', 'desc')
                ->get();

    return view('user.index', compact('users'));
}

    // Proses menyetujui user yang mendaftar
    public function approve($id)
{
    $user = User::findOrFail($id);
    $user->is_approved = true;
    $user->save();

    Alert::success('Berhasil', 'User telah disetujui.');
    return redirect()->route('user.index'); // ubah ke route data user
}


}
