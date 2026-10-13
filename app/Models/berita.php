<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'isi',
        'foto',
        'tanggal',
    ];
}