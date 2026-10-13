<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('ekstrakulikuler.index', compact('ekstrakulikuler'));
    }

    public function create()
    {
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekstrakulikuler' => 'required|string|max:255',
            'deskripsi'            => 'required|string',
            'gambar'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = new Ekstrakulikuler();
        $data->nama_ekstrakulikuler = $request->nama_ekstrakulikuler;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $data->gambar = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        $data->save();

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan!');
    }

    public function show(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:ekstrakulikulers,id',
        ]);

        $ekstrakulikuler = Ekstrakulikuler::findOrFail($request->id);
        return view('ekstrakulikuler.detail', compact('ekstrakulikuler'));
    }

    public function landingDetail($nama)
    {
        $nama_asli = str_replace('-', ' ', $nama);
        $ekstrakulikuler = Ekstrakulikuler::whereRaw('LOWER(nama_ekstrakulikuler) = ?', [strtolower($nama_asli)])->firstOrFail();
        $profil = ProfilSekolah::first();

        return view('landing.detail-ekstrakulikuler', compact('ekstrakulikuler', 'profil'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'ekstrakulikuler_id' => 'required|exists:ekstrakulikulers,id',
        ]);

        $data = Ekstrakulikuler::findOrFail($request->ekstrakulikuler_id);
        return view('ekstrakulikuler.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ekstrakulikuler_id'   => 'required|exists:ekstrakulikulers,id',
            'nama_ekstrakulikuler' => 'required|string|max:255',
            'deskripsi'            => 'required|string',
            'gambar'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = Ekstrakulikuler::findOrFail($request->ekstrakulikuler_id);
        $data->nama_ekstrakulikuler = $request->nama_ekstrakulikuler;
        $data->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            if ($data->gambar) {
                Storage::disk('public')->delete($data->gambar);
            }
            $data->gambar = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        $data->save();

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil diubah!');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'ekstrakulikuler_id' => 'required|exists:ekstrakulikulers,id',
        ]);

        $data = Ekstrakulikuler::findOrFail($request->ekstrakulikuler_id);

        if ($data->gambar) {
            Storage::disk('public')->delete($data->gambar);
        }

        $data->delete();

        return redirect()
            ->route('ekstrakulikuler.index')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }
}