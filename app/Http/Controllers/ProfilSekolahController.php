<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    /**
     * Tampilkan data profil sekolah.
     */
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('profil-sekolah.index', compact('profil'));
    }

    /**
     * Form tambah profil (kalau belum ada data).
     */
    public function create()
    {
        if (ProfilSekolah::count() > 0) {
            return redirect()->route('profil-sekolah.edit')
                             ->with('info', 'Data profil sudah ada. Silakan edit.');
        }

        return view('profil-sekolah.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat'         => 'required|string',
            'email'          => 'nullable|email',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['_token', 'foto', 'logo']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profil-sekolah', 'public');
        }
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profil-sekolah', 'public');
        }

        ProfilSekolah::create($data);

        return redirect()->route('profil-sekolah.index')
                         ->with('success', 'Profil sekolah berhasil disimpan.');
    }

    /**
     * Form edit profil (single data).
     */
    public function edit()
    {
        $profil = ProfilSekolah::first();

        if (!$profil) {
            return redirect()->route('profil-sekolah.create')
                             ->with('info', 'Silakan isi data profil terlebih dahulu.');
        }

        return view('profil-sekolah.edit', compact('profil'));
    }

    /**
     * Update data profil.
     */
    public function update(Request $request)
    {
        $profil = ProfilSekolah::first();

        if (!$profil) {
            return redirect()->route('profil-sekolah.create');
        }

        $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'kepala_sekolah' => 'required|string|max:255',
            'alamat'         => 'required|string',
            'email'          => 'nullable|email',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'foto', 'logo']);

        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }
            $data['foto'] = $request->file('foto')->store('profil-sekolah', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $data['logo'] = $request->file('logo')->store('profil-sekolah', 'public');
        }

        $profil->update($data);

        return redirect()->route('profil-sekolah.index')
                         ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    /**
     * Hapus data profil.
     */
    public function destroy()
    {
        $profil = ProfilSekolah::first();

        if ($profil) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $profil->delete();
        }

        return redirect()->route('profil-sekolah.index')
                         ->with('success', 'Profil sekolah berhasil dihapus.');
    }

    /**
     * Halaman publik.
     */
    public function publicIndex()
    {
        $profil = ProfilSekolah::first();
        return view('landing.profil', compact('profil'));
    }
}