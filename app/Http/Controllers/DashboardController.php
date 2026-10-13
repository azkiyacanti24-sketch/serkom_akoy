<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekstrakulikuler;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        $totalGuru = Guru::count();
        $totalSiswa = Siswa::count();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalEkstra = Ekstrakulikuler::count();
        $totalUser = User::count();

        $guruTerbaru = Guru::orderByDesc('id')->take(5)->get();
        $siswaTerbaru = Siswa::orderByDesc('id')->take(5)->get();

        return view('index', compact(
            'profil',
            'totalGuru',
            'totalSiswa',
            'totalBerita',
            'totalGaleri',
            'totalEkstra',
            'totalUser',
            'guruTerbaru',
            'siswaTerbaru'
        ));
    }
}