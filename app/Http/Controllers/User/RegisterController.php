<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('login.register');
    }

    // Proses registrasi user baru
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'nomorhandphone' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|min:8|confirmed',
        ], [
            'tanggallahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggallahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'email.unique' => 'Email Ini Sudah Terdaftar.',
            'username.unique' => 'Username Ini Sudah Digunakan.',
            'password.min' => 'Password Minimal 8 Karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Simpan user ke database
            $user = User::create([
                'name' => $request->name,
                'tanggallahir' => $request->tanggallahir,
                'nomorhandphone' => $request->nomorhandphone,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            // Trigger event Registered untuk mengirim email verifikasi
            event(new Registered($user));

            // Redirect ke halaman login dengan notifikasi sukses
            return redirect()->route('login')->with([
                'status' => 'success',
                'message' => 'Akun Anda berhasil dibuat! Silakan cek email untuk verifikasi.',
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->withErrors([
                'message' => 'Terjadi kesalahan. Silakan coba lagi.',
            ])->withInput();
        }
    }

    // Verifikasi email
    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Link verifikasi tidak valid.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->route('login')->with([
            'status' => 'success',
            'message' => 'Email Anda berhasil diverifikasi! Silakan login.',
        ]);
    }

    // Kirim ulang email verifikasi
    public function resendVerificatonEmail(Request $request)
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with([
                'status' => 'info',
                'message' => 'Email Anda sudah diverifikasi.',
            ]);
        }

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Email verifikasi telah dikirim ulang!',
        ]);
    }
}
