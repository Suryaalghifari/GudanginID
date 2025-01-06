<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('Auth.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                
                 DB::table('tbl_passwordresets')
                ->where('email', $user->email)
                ->delete();
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with([
                'status' => 'success',
                'message' => 'Password Anda berhasil direset. Silakan login dengan password baru.',
            ]);
        } else {
            return back()->with([
                'status' => 'error',
                'message' => 'Gagal mereset password. Silakan coba lagi.',
            ]);
        }
    }
}
