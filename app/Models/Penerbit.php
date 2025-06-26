<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'indri_penerbits';
    protected $fillable = ['nama_penerbit', 'alamat', 'telepon'];

}
