<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = $request->query('cari');

    if ($query) {
        // Jika ada query pencarian, filter data berdasarkan nama kategori
        $allKategori = Kategori::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama_kategori', 'like', '%' . $query . '%');
        })->paginate(5);

        // Tambahkan query ke pagination
        $allKategori->appends(['cari' => $query]);

    } else {
        // Jika tidak ada query, ambil semua data kategori
        $allKategori = Kategori::latest()->paginate(5);
    }

    return view('kategori.index', compact('allKategori'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
         abort(403);
}
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 'admin') {
         abort(403);
}
        //buat validasi
       $validateData = $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        //simpan data
        Kategori::create($validateData);

        //redirect ke halaman kategori
        Alert::success('Sukses', 'Data Berhasil Ditambahkan...');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //buat validasi
       $validateData = $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        //update data
        $kategori->update($validateData);

        //redirect ke halaman kategori
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        //hapus data
        $kategori->delete();

        //redirect ke halaman kategori
        return redirect()->route('kategori.index');
    }
}
