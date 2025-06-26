<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'indri_peminjamans';
    protected $guarded = [];

    // protected $fillable = [
    //     'tgl_peminjaman',
    //     'tgl_kembali',
    //     'status_pengembalian',
    //     'anggota_id',
    // ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'indri_peminjamans_bukus', 'peminjaman_id', 'buku_id');
    }
}
