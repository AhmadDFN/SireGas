<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Metode untuk menampilkan formulir login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Metode untuk menangani permintaan login
    public function login(Request $request)
    {
        // dd($request);
        // Validasi data input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Coba melakukan otentikasi
        if (Auth::attempt($credentials)) {
            // Jika berhasil, arahkan ke halaman beranda
            return redirect()->route('dashboard');
        } else {
            // Jika gagal, arahkan kembali dengan pesan error
            return back()->withErrors(['username' => 'Username atau password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

    public function generateAkun()
    {

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $code = '';

        for ($i = 0; $i < 13; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        $User = User::create([
            'username' => 'zada',
            'email_verified_at' => date("Y-m-d h:i:s"),
            'password' => Hash::make('123'),
            'remember_token' => $code,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        return view('auth.login');
    }
}
