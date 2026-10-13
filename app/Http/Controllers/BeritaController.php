<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'Admin') {
            $beritas = berita::all();
        } else {
            $beritas = berita::where('status', 'Publik')->get();
        }

        return view('berita.index', compact('beritas'));
    }

    public function show(Request $request)
    {
        if (auth()->user()->role == 'Admin') {
            abort(403);
        }

        $berita = berita::findOrFail($request->berita_id);

        return view('berita.detail', compact('berita'));
    }

    // DETAIL BERITA DARI LANDING PAGE
    public function landingDetail($judul)
    {
        $judul_asli = str_replace('-', ' ', $judul);
        $berita = berita::whereRaw('LOWER(judul) = ?', [strtolower($judul_asli)])->firstOrFail();
        $profil = ProfilSekolah::first();

        return view('landing.detail-berita', compact('berita', 'profil'));
    }
    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publik,Privat',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->extension();

            $foto->storeAs('berita', $namaFoto, 'public');
        } else {
            $namaFoto = null;
        }

        berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'foto' => $namaFoto
        ]);

        return redirect('/dashboard/berita');
    }

    public function edit(Request $request)
{
    $berita = Berita::findOrFail($request->berita_id);
    return view('berita.edit', compact('berita'));
}


public function update(Request $request)
{
    $berita = Berita::findOrFail($request->berita_id);

    $request->validate([
        'judul'     => 'required',
        'isi'       => 'required',
        'tanggal'   => 'required|date',
        'status'    => 'required|in:Publik,Privat',
        'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $berita->judul = $request->judul;
    $berita->isi = $request->isi;
    $berita->tanggal = $request->tanggal;
    $berita->status = $request->status;

    if ($request->hasFile('foto')) {
        if ($berita->foto) {
            Storage::disk('public')->delete('berita/' . basename($berita->foto));
        }

        $path = $request->file('foto')->store('berita', 'public');
        $berita->foto = basename($path);
    }

    $berita->save();

    return redirect('/dashboard/berita')->with('success', 'Berita berhasil diperbarui.');
}


public function destroy(Request $request)
{
    $berita = Berita::findOrFail($request->berita_id);

    if ($berita->foto) {
        Storage::disk('public')->delete('berita/' . basename($berita->foto));
    }

    $berita->delete();

    return redirect('/dashboard/berita')->with('success', 'Berita berhasil dihapus.');
}
}