<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'nsm',
        'alamat',
        'telp',
        'email',
        'website',
        'nama_yayasan',
        'visi',
        'misi',
    ];
}