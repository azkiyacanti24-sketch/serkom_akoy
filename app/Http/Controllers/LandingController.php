<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;

class LandingController extends Controller
{
    public function index()
    {
        $profil           = ProfilSekolah::first();
        $gurus            = Guru::take(4)->get();
        $beritas          = Berita::latest()->take(3)->get();
        $galeris          = Galeri::latest()->take(4)->get();
        $ekstrakulikulers = Ekstrakulikuler::take(4)->get();
        $siswas           = Siswa::latest()->take(8)->get();
        $totalSiswa       = Siswa::count();

        return view('landing.home', compact(
            'profil', 'gurus', 'beritas', 'galeris',
            'ekstrakulikulers', 'siswas', 'totalSiswa'
        ));
    }

    public function profil()
    {
        $profil = ProfilSekolah::first();
        return view('landing.profil', compact('profil'));
    }

    public function guru()
    {
        $profil = ProfilSekolah::first();
        $gurus  = Guru::all();
        return view('landing.semua-guru', compact('profil', 'gurus'));
    }

    public function semuaGuru()
    {
        $profil = ProfilSekolah::first();
        $gurus  = Guru::all();
        return view('landing.semua-guru', compact('profil', 'gurus'));
    }

    public function berita()
    {
        $profil  = ProfilSekolah::first();
        $beritas = Berita::latest()->get();
        return view('landing.semua-berita', compact('profil', 'beritas'));
    }

    public function galeri()
    {
        $profil  = ProfilSekolah::first();
        $galeris = Galeri::latest()->get();
        return view('landing.semua-galeri', compact('profil', 'galeris'));
    }

    public function ekstrakulikuler()
    {
        $profil           = ProfilSekolah::first();
        $ekstrakulikulers = Ekstrakulikuler::all();
        return view('landing.semua-ekstrakulikuler', compact('profil', 'ekstrakulikulers'));
    }
}