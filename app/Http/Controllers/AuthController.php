<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // proses tampilan /auth/login.blade.php
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // tangkap request dari form, lalu lakukan validasi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ], 
        // konfigurasi pesan error
        [
            'required' => ':attribute harus diisi!',
            'email' => 'Email tidak valid!',
            'min' => ':attribute harus minimal 8 karakter!',
        ]);

        // pengecekan remember me
        $remember = $request->remember === "on";

        // jika validasi berhasil, maka lakukan proses login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login berhasil! Selamat datang kembali, ' . Auth::user()->name . '.');
        }

        // jika akun tidak ada di database / login gagal, maka kembalikan ke halaman login dengan pesan error
        return back()->with('error', 'Email atau Password salah!')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // proses logout dan pembersihan token login & session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // arahkan ke halaman login kembali
        return redirect()->route('login');
    }
}
