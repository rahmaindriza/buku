<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class AuthManualController extends Controller
{
    // Tampilkan halaman login & register
    public function index()
    {
        return view('manual-auth.login'); // Pastikan form login & register digabung di view ini
    }

    // Proses login
    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek apakah sudah disetujui admin
           if (Auth::user()->role === 'user' && !Auth::user()->is_approved) {
                 Auth::logout();
                Auth::logout();
         Alert::error('Akun belum disetujui!', 'Silakan tunggu persetujuan dari admin sebelum login.');
        return back()->with('error', 'Akun Anda belum disetujui oleh admin.');

        }


            Alert::success('Selamat!', 'Anda Telah Berhasil Masuk sistem!');
            return redirect()->route('dashboard');
        }

        Alert::toast('Username atau Password anda salah!', 'error')->autoClose(5000);
        return back();
    }

    // Proses registrasi user baru
    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default user
            'is_approved' => false, // harus disetujui dulu
        ]);

        Alert::success('Berhasil Mendaftar', 'Silakan tunggu persetujuan admin sebelum bisa login.');
        return redirect()->route('login');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::toast('Anda Telah Logout!', 'success')->autoClose(5000);
        return redirect()->route('homepage');
    }
}
