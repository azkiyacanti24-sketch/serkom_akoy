<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\ProfilSekolah;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    public function show(Request $request)
    {
        if (auth()->user()->role == 'Admin') {
            abort(403);
        }
        $guru = Guru::findOrFail($request->guru_id);
        return view('guru.detail', compact('guru'));
    }

    public function create()
{
    $mapels = MataPelajaran::all();
    return view('guru.create', compact('mapels'));
}

    public function store(Request $request)
{
    $request->validate([
        'nip' => 'required|unique:gurus,nip',
        'nama_guru' => 'required',
        'jenis_kelamin' => 'required',
        'mata_pelajaran' => 'required',
        'no_hp' => 'nullable',
        'alamat' => 'nullable',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $guru = new Guru();
    $guru->nip = $request->nip;
    $guru->nama_guru = $request->nama_guru;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->mata_pelajaran = $request->mata_pelajaran;
    $guru->no_hp = $request->no_hp;
    $guru->alamat = $request->alamat;

    // ⚠️ UPLOAD FOTO HARUS SEBELUM SAVE
    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('guru', 'public');
        $guru->foto = basename($path);
    }

    $guru->save();   // ← SAVE BELAKANGAN

    return redirect('/dashboard/guru')->with('success', 'Data guru berhasil ditambahkan.');
}

    public function edit(Request $request)
{
    $guru = Guru::findOrFail($request->guru_id);
    $mapels = MataPelajaran::all();
    return view('guru.edit', compact('guru', 'mapels'));
}

public function update(Request $request)
{
    $guru = Guru::findOrFail($request->guru_id);

    $request->validate([
        'nip' => 'required|unique:gurus,nip,' . $guru->getKey(),
        'nama_guru' => 'required',
        'jenis_kelamin' => 'required',
        'mata_pelajaran' => 'required',
        'no_hp' => 'nullable',
        'alamat' => 'nullable',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $guru->nip = $request->nip;
    $guru->nama_guru = $request->nama_guru;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->mata_pelajaran = $request->mata_pelajaran;
    $guru->no_hp = $request->no_hp;
    $guru->alamat = $request->alamat;

    if ($request->hasFile('foto')) {
        if ($guru->foto) {
            Storage::disk('public')->delete('guru/' . basename($guru->foto));
        }
        $path = $request->file('foto')->store('guru', 'public');
        $guru->foto = basename($path);
    }

    $guru->save();

    return redirect('/dashboard/guru')->with('success', 'Data guru berhasil diperbarui.');
}

public function destroy(Request $request)
{
    $guru = Guru::findOrFail($request->guru_id);

    if ($guru->foto) {
        Storage::disk('public')->delete('guru/' . basename($guru->foto));
    }

    $guru->delete();

    return redirect('/dashboard/guru')->with('success', 'Data guru berhasil dihapus.');
}

    public function landingDetail($nama)
    {
        $nama_asli = str_replace('-', ' ', $nama);
        $guru = Guru::whereRaw('LOWER(nama_guru) = ?', [strtolower($nama_asli)])->firstOrFail();
        $profil = ProfilSekolah::first();

        return view('landing.detail-guru', compact('guru', 'profil'));
    }
}