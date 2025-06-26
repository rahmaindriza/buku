<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class FBukuController extends Controller
{
    public function index()
    {
        $allBuku = Buku::all();
        return view('frontend.index', compact('allBuku'));
    }

    public function detail_buku(Buku  $buku)
    {
        //
    }
}
