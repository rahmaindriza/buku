<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class penerbitController extends Controller
{
     /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = $request->query('cari');

    if ($query) {
        // Jika ada query pencarian, filter data berdasarkan nama penerbit
        $allPenerbit = Penerbit::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama_penerbit', 'like', '%' . $query . '%');
        })->paginate(5);

        // Tambahkan query ke pagination
        $allPenerbit->appends(['cari' => $query]);
    } else {
        // Jika tidak ada query, ambil semua data penerbit
        $allPenerbit = Penerbit::latest()->paginate(5);
    }

    return view('penerbit.index', compact('allPenerbit'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
         abort(403);
    }
        return view('penerbit.create');
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
            'nama_penerbit' => 'required|string|max:100',
        ]);
        //simpan data
        penerbit::create($validateData);

        //redirect ke halaman penerbit
        Alert::success('Sukses', 'Data Berhasil Ditambahkan...');
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penerbit $penerbit)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penerbit $penerbit)
    {
        //buat validasi
       $validateData = $request->validate([
            'nama_penerbit' => 'required|string|max:100',
        ]);
        //update data
        $penerbit->update($validateData);

        //redirect ke halaman penerbit
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penerbit $penerbit)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        //hapus data
        $penerbit->delete();

        //redirect ke halaman penerbit
        return redirect()->route('penerbit.index');
    }
}
