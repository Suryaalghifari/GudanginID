<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('Auth.email');
    }

   public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);
    
    $status = Password::sendResetLink($request->only('email'));

    if ($status === Password::RESET_LINK_SENT) {
        return back()->with([
            'status' => 'success',
            'message' => 'Link Reset Password Terkirim! Silakan cek email Anda.',
        ]);
    } else {
        return back()->with([
            'status' => 'error',
            'message' => 'Email tidak ditemukan atau tidak valid.',
        ])->onlyInput('email');
    }
}
}