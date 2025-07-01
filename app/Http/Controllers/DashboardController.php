<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'jmlKategori' => Kategori::count(),
            'jmlPenerbit' => Penerbit::count(),
            'jmlSemuaBuku' => Buku::count(),
            'jmlAnggota' => Anggota::count(),
        ];
        return view('welcome',compact('data'));
    }
}
