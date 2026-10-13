<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profil_siswa extends Model
{
    protected $table ='profil_siswa';

    protected $fillable = [
        'nama_siswa',
        'nik',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto',
    ];
}
