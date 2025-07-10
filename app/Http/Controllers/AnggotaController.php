<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('cari');

        if ($query) {
            $allAnggota = Anggota::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama_anggota', 'like', '%' . $query . '%');
            })->paginate(5);

            $allAnggota->appends(['cari' => $query]);
        } else {
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
            'nis' => 'required|numeric|unique:indri_anggotas,nis',
            'nama_anggota' => 'required|string|max:100',
            'kelas' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
        ]);

        Anggota::create($valdata);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $valdata = $request->validate([
            'nis' => 'required|numeric|unique:indri_anggotas,nis,' . $anggota->id,
            'nama_anggota' => 'required|string|max:100',
            'kelas' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
        ]);

        $anggota->update($valdata);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        if (Auth::user()->role != 'admin') {
            abort(403);
        }
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
