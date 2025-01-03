<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login'); 
    }

    public function login(Request $request)
    {
       
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha', 
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            
            return redirect()->intended('/dashboard')->with([
                'status' => 'success',
                'message' => 'Anda berhasil login. Selamat datang kembali!'
            ]);
        }

        return back()->withErrors([
            'message' => 'Username atau password salah.'
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
