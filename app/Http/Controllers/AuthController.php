<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }


    public function autentikasi(Request $request)
    {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            Alert::error('Login Gagal', 'Data yang dimasukkan tidak valid!');
            return back()->withErrors($validator)->withInput();
        }

        // Mengambil kredensial
        $credentials = $request->only('username', 'password');

        // Proses login
        if (Auth::guard('admin')->attempt($credentials)) {
            Alert::success('Login Berhasil', 'Hai, Admin!');
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal login
        Alert::error('Login Gagal', 'Username atau password salah!');
        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput();
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Proses logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Alert setelah logout
        Alert::info('Logout Berhasil', 'Anda telah keluar dari sistem.');
        return redirect('/admin/login');
    }
}
