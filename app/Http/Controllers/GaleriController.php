<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use App\Models\profil_sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = galeri::all();

        return view('galeri.index', compact('galeris'));
    }

    public function show(Request $request)
    {
        $galeriId = $request->galeri_id ?? session('galeri_id');

        if (!$galeriId) {
            return redirect('/dashboard/galeri')
                ->with('error', 'Pilih galeri dulu.');
        }

        $galeri = galeri::findOrFail($galeriId);

        return view('galeri.detail', compact('galeri'));
    }

    public function landingDetail(Request $request)
    {
        $galeri = galeri::findOrFail($request->galeri_id);
        $profil = profil_sekolah::first();

        return view('galeri.landing-detail', compact('galeri', 'profil'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'nullable',
            'kategori' => 'required|in:Foto,Video',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,mp4,webm,ogg,mov,avi,mkv|max:51200',
            'link_video' => 'nullable|url',
        ]);

        $namaGambar = null;
        $namaVideo = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galeri', $namaFile, 'public');

            if ($request->kategori === 'Foto') {
                $namaGambar = 'galeri/' . $namaFile;
            } else {
                $namaVideo = 'galeri/' . $namaFile;
            }
        }

        if ($request->kategori === 'Video' && $request->link_video) {
            $namaVideo = $request->link_video;
        }

        galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->keterangan ?? '',
            'gambar' => $namaGambar,
            'video' => $namaVideo,
        ]);

        return redirect('/dashboard/galeri')
            ->with('success', 'Data galeri berhasil ditambahkan!');
    }

    // EDIT pakai parameter $id (dari URL)
    public function edit(Request $request)
{
    $galeri = Galeri::findOrFail($request->galeri_id);
    return view('galeri.edit', compact('galeri'));
}

public function update(Request $request)
{
    $galeri = Galeri::findOrFail($request->galeri_id);

    $request->validate([
        'judul'     => 'required',
        'deskripsi' => 'nullable',
        'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'video'     => 'nullable',
    ]);

    $galeri->judul = $request->judul;
    $galeri->deskripsi = $request->deskripsi;
    $galeri->video = $request->video;

    if ($request->hasFile('gambar')) {
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }
        $path = $request->file('gambar')->store('galeri', 'public');
        $galeri->gambar = $path;
    }

    $galeri->save();

    return redirect('/dashboard/galeri')->with('success', 'Galeri berhasil diperbarui.');
}

public function destroy(Request $request)
{
    $galeri = Galeri::findOrFail($request->galeri_id);

    if ($galeri->gambar) {
        Storage::disk('public')->delete($galeri->gambar);
    }

    $galeri->delete();

    return redirect('/dashboard/galeri')->with('success', 'Galeri berhasil dihapus.');
}
}