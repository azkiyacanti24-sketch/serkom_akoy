<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'nama_sekolah',
        'nsm',
        'npsn',
        'alamat',
        'telp',
        'email',
        'website',
        'nama_yayasan',
        'tahun_didirikan',
        'akreditasi',
        'sambutan',
        'kepala_sekolah',
        'logo',
        'foto',
        'visi',
        'misi',
    ];
}