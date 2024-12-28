<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login'); // Arahkan ke tampilan login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' =>'required|string',
            'password' => 'required',
        ]);

         if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Kirim flash message untuk login berhasil
        return redirect()->intended('/dashboard')->with([
            'status' => 'success',
            'message' => 'Anda berhasil login. Selamat datang kembali!'
        ]);
    }
        return back()->with([
        'status' => 'error',
        'message' => 'Username atau password salah.'
    ])->onlyInput('Username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
