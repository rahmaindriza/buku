<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'indri_bukus';
    protected $fillable = [
        'judul',
        'pengarang',
        'tahun_terbit',
        'penerbit_id',
        'kategori_id',
        'cover',




    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }

    public function penerbit(): BelongsTo
    {
        return $this->belongsTo(penerbit::class);
    }
    public function peminjaman()
    {
        return $this->belongsToMany(Peminjaman::class, 'indri_peminjamans_bukus');
    }
}
