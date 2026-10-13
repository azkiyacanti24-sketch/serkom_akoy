<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    protected $table = 'ekstrakulikulers';

    protected $fillable = [
        'nama_ekstrakulikuler',
        'deskripsi',
        'gambar',
    ];
}