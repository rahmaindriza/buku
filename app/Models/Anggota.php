<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'indri_anggotas';
    protected $guarded = [];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

}
