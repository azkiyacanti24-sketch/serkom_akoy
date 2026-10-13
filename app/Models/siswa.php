<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jenis_kelamin',
        'kelas',
        'tahun_masuk',
    ];
}