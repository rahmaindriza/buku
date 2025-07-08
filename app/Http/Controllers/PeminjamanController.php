<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $cari = $request->query('cari');
    $status = $request->query('status');

    $allPeminjaman = \App\Models\Peminjaman::query();

    // Filter berdasarkan nama anggota
    if ($cari) {
        $allPeminjaman->whereHas('anggota', function ($q) use ($cari) {
            $q->where('nama_anggota', 'like', '%' . $cari . '%');
        });
    }

    // Filter berdasarkan status pengembalian
    if ($status) {
        $allPeminjaman->where('status_pengembalian', $status);
    }

    $result = $allPeminjaman->latest()->paginate(5)->appends([
        'cari' => $cari,
        'status' => $status,
    ]);

    return view('peminjaman.index', ['allPeminjaman' => $result]);
}


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

        $anggota = Anggota::all();
        $bukus = Buku::all(); // Assuming you have a Buku model for books
        return view('peminjaman.create', compact('anggota','bukus'));
    }
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{


    $valData = $request->validate([
        'tgl_peminjaman' => 'required|date',
        'tgl_rencana_kembali' => 'required|date|after_or_equal:tgl_peminjaman',
        'anggota_id' => 'required|exists:indri_anggotas,id',
        'buku_ids' => 'required|array',
        'buku_ids.*' => 'exists:indri_bukus,id',
    ], [
        'tgl_peminjaman.after_or_equal' => 'Tanggal peminjaman tidak boleh sebelum hari ini.',
        'tgl_rencana_kembali.after_or_equal' => 'Tanggal rencana kembali tidak boleh sebelum hari ini.',
    ]);

    $peminjaman = Peminjaman::create([
        'anggota_id' => $request->anggota_id,
        'tgl_peminjaman' => $request->tgl_peminjaman,
        'tgl_rencana_kembali' => $request->tgl_rencana_kembali,
        'status_pengembalian' => 'dipinjam',
    ]);

    $peminjaman->buku()->attach($request->buku_ids);

    Alert::success('Sukses!', 'Peminjaman berhasil ditambahkan.');
    return redirect()->route('peminjaman.index');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with('anggota', 'buku')->findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        // Logic to show form for editing a specific peminjaman
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, Peminjaman $peminjaman)
{
    $request->validate([
        'tgl_kembali' => 'required|date',
    ]);

    $tglKembali = Carbon::parse($request->tgl_kembali);
    $today = Carbon::today();
    $tglPinjam = Carbon::parse($peminjaman->tgl_peminjaman);
    $tglRencana = Carbon::parse($peminjaman->tgl_rencana_kembali);

    // Validasi: tidak boleh sebelum tanggal pinjam
    if ($tglKembali->lt($tglPinjam)) {
        Alert::error('Gagal!', 'Tanggal pengembalian tidak boleh sebelum tanggal peminjaman!');
        return back();
    }

    // Validasi: tidak boleh setelah hari ini (jika hari ini adalah 26, maka input tidak boleh 27)
    if ($tglKembali->gt($today)) {
        Alert::error('Gagal!', 'Tanggal pengembalian tidak boleh lebih dari hari ini!');
        return back();
    }

    // Status: jika lewat dari rencana, maka 'Terlambat'
    $status = $tglKembali->gt($tglRencana) ? 'Terlambat' : 'DiKembalikan';

    $peminjaman->update([
        'tgl_kembali' => $tglKembali,
        'status_pengembalian' => $status,
    ]);

    Alert::success('Sukses!', 'Pengembalian buku berhasil diproses.');
    return redirect()->route('peminjaman.index');
}





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
