<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function show(Request $request)
    {
        $siswa = Siswa::findOrFail($request->siswa_id);
        return view('siswa.detail', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|unique:siswas,nis',
            'nama_siswa'    => 'required',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk'   => 'required',
        ]);

        Siswa::create($request->all());

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $siswa = Siswa::findOrFail($request->siswa_id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request)
    {
        $siswa = Siswa::findOrFail($request->siswa_id);

        $request->validate([
            'nis'           => 'required|unique:siswas,nis,' . $siswa->id,
            'nama_siswa'    => 'required',
            'kelas'         => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk'   => 'required',
        ]);

        $siswa->update($request->except('_token', 'siswa_id'));

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $siswa = Siswa::findOrFail($request->siswa_id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}