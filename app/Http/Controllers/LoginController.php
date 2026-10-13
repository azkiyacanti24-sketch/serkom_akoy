<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'Admin') {
                return redirect('/dashboard')
                    ->with('success', 'Berhasil login sebagai Admin!');
            }

            return redirect('/dashboard')
                ->with('success', 'Berhasil login sebagai Operator!');
        }

        return back()
            ->withInput()
            ->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Anda berhasil logout!');
    }
}