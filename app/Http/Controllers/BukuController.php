<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('cari');

        if ($query) {
            // Jika ada query pencarian, filter data berdasarkan judul
            $allBuku = Buku::when( $query, function ($queryBuilder) use
            ($query) {
                 $queryBuilder->where('judul', 'like', '%' . $query . '%')
                 ->orWhere('pengarang', 'like', '%' . $query . '%')
                 ->orWhere('tahun_terbit', 'like', '%' . $query . '%');

            })->paginate(5);
            $allBuku->appends(['cari' => $query]); // Tambahkan query ke pagination

        } else {
            // Jika tidak ada query, ambil semua data buku
            $allBuku = Buku::latest()->paginate(5);
        }
        // $allBuku = Buku::all();

        return view('buku.index', compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (Auth::user()->role != 'admin') {
        abort(403);
        }
    // Validasi input
    $validateData = $request->validate([
        'judul' => 'required|string|max:100',
        'pengarang' => 'required|string|max:100',
        'tahun_terbit' => 'required|digits:4',
        'kategori_id' => 'required',
        'penerbit_id' => 'required',
        'file_cover' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
    ]);

    // Upload file cover jika ada
    if ($request->hasFile('file_cover')) {
        // Simpan file ke storage/app/public/cover dan ambil path-nya
        $coverPath = $request->file('file_cover')->store('cover', 'public');
        $validateData['cover'] = $coverPath; // simpan ke kolom "cover" di DB

          }

    // Simpan data ke database
    Buku::create($validateData);

    // Redirect ke halaman index
    Alert::success('Sukses', 'Data Berhasil Ditambahkan...');
    return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //buat validasi
       $validateData = $request->validate([
            'judul' => 'required|string|max:100',
            'pengarang' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
       ]);

        // Cek jika ada file cover baru
    if ($request->hasFile('file_cover')) {
        // Hapus file lama jika ada
        if ($buku->cover && file_exists(storage_path('app/public/' . $buku->cover))) {
            unlink(storage_path('app/public/' . $buku->cover));
        }

        // Upload file baru
        $validateData['cover'] = $request->file('file_cover')->store('cover', 'public');
    }

    // Jangan simpan file_cover (sementara field input)
    unset($validateData['file_cover']);

        //update data
        $buku->update($validateData);

        //redirect ke halaman Buku
        Alert::success('Sukses', 'Data Buku Berhasil DiPerbarui...');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if (Auth::user()->role != 'admin') {
        abort(403);
        }
        
        if($buku->cover && Storage::exists('public/' . $buku->cover)) {
            // Hapus file cover jika ada
            Storage::delete('public/' . $buku->cover);
        }

        //hapus data
        $buku->delete();

        //redirect ke halaman Buku
        return redirect()->route('buku.index');
    }
}
