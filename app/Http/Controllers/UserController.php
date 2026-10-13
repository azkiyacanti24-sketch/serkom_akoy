<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'role'     => 'required|in:Admin,Operator',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id_user',
        ]);

        $user = User::findOrFail($request->user_id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id'  => 'required|exists:users,id_user',
            'name'     => 'required',
            'username' => 'required',
            'role'     => 'required|in:Admin,Operator',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($request->user_id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id_user',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    // ============================================
    // PROFIL SAYA (untuk user yang sedang login)
    // ============================================

       public function profilSaya()
{
    $user = auth()->user() ?? User::first();
    $profil = \App\Models\ProfilSekolah::first();
    return view('user.profil-saya', compact('user', 'profil'));
}

public function editProfilSaya()
{
    $user = auth()->user() ?? User::first();
    $profil = \App\Models\ProfilSekolah::first();
    return view('user.edit-profil-saya', compact('user', 'profil'));
}

public function updateProfilSaya(Request $request)
{
    $user = auth()->user() ?? User::first();

    $request->validate([
        'name'          => 'required',
        'username'      => 'required|unique:users,username,' . $user->id_user . ',id_user',
        'jenis_kelamin' => 'nullable',
        'tempat_lahir'  => 'nullable',
        'tanggal_lahir' => 'nullable|date',
        'alamat'        => 'nullable',
        'no_hp'         => 'nullable',
        'email'         => 'nullable|email',
        'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->jenis_kelamin = $request->jenis_kelamin;
    $user->tempat_lahir = $request->tempat_lahir;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->alamat = $request->alamat;
    $user->no_hp = $request->no_hp;
    $user->email = $request->email;

    if ($request->hasFile('foto')) {
        if ($user->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists('user/' . basename($user->foto))) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('user/' . basename($user->foto));
        }
        $path = $request->file('foto')->store('user', 'public');
        $user->foto = basename($path);
    }

    $user->save();

    return redirect()->route('profil-saya')->with('success', 'Profil berhasil diperbarui.');
}
}