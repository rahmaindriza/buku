<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
   public function index(Request $request)
{
    $query = $request->query('cari');

    if ($query) {
        // Jika ada pencarian, filter berdasarkan nama anggota
        $allAnggota = Anggota::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama_anggota', 'like', '%' . $query . '%');
        })->paginate(5);

        // Tambahkan query ke pagination
        $allAnggota->appends(['cari' => $query]);
    } else {
        // Ambil semua data jika tidak ada pencarian
        $allAnggota = Anggota::latest()->paginate(5);
    }

    return view('anggota.index', compact('allAnggota'));
}


    public function create()
    {
        return view('anggota.create');
    }
    public function store(Request $request)
    {
        $valdata = $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        Anggota::create($valdata);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }
    public function show(Anggota $anggota)
    {
        // dd($anggota->nama_anggota);
        return view('anggota.show', compact('anggota'));
    }
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }
    public function update(Request $request, Anggota $anggota)
    {
        $valdata = $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $anggota->update($valdata);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

}
