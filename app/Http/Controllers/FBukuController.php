<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class FBukuController extends Controller
{
    // public function index()
    // {
    //     // $allBuku = Buku::latest()->paginate(12);
    //     $query = Buku::query();

    //     // filter kategori
    //     if(request()->has('kategori') && request('kategori') != ''){
    //         $query->where('kategori_id', request('kategori'));
    //     }

    //      // filter kategori
    //     if(request()->has('penerbit') && request('penerbit') != ''){
    //         $query->where('penerbit_id', request('penerbit'));
    //     }

    //     //filter search
    //     if(request()->has('search')){
    //         $query->where(function($q){
    //             $q->where('judul', 'like', '%' .request('search') . '%')
    //             ->orWhere('pengarang', 'like', '%' .request('search') . '%');
    //         });
    //     }

    //     $buku = $query->paginate(12);
    //     $kategori = Kategori::all();
    //     $penerbit = Penerbit::all();
    //     return view('frontend.index', compact('buku', 'kategori','penerbit'));


    // }

    public function index()
{
    $query = Buku::query();

    // filter kategori
    if (request()->has('kategori') && request('kategori') != '') {
        $query->where('kategori_id', request('kategori'));
    }

    // filter penerbit
    if (request()->has('penerbit') && request('penerbit') != '') {
        $query->where('penerbit_id', request('penerbit'));
    }

    // filter pencarian
    if (request()->has('search')) {
        $query->where(function ($q) {
            $q->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('pengarang', 'like', '%' . request('search') . '%');
        });
    }

    $buku = $query->paginate(12);

    // ambil koleksi terbaru (10 buku terbaru dari database)
    $koleksiTerbaru = Buku::latest()->take(20)->get();

    $kategori = Kategori::all();
    $penerbit = Penerbit::all();

    return view('frontend.index', compact('buku', 'kategori', 'penerbit', 'koleksiTerbaru'));
}

    public function detail_buku(Buku  $buku)
    {
        return view('frontend.detail_buku', compact('buku'));
    }
}
