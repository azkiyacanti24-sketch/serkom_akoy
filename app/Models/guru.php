<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';

    protected $fillable = [
    'nip',
    'nama_guru',
    'jenis_kelamin',
    'mata_pelajaran',
    'no_hp',
    'alamat',
    'foto',    // ← HARUS ADA
];
}