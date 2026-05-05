<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // 👈 Wajib Import ini
use App\Models\User;

class AuthController extends Controller
{
    // 1. Tampilkan Form Login
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    // 2. Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // 4. 👇 FITUR BARU: Update Password
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed', // confirmed artinya harus ada input name="password_confirmation"
        ]);

        // Cek apakah password lama benar?
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai!']);
        }

        // Update Password Baru
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }

    // 5. 👇 FITUR LUPA PASSWORD: Tampilkan Form
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // 6. 👇 FITUR LUPA PASSWORD: Proses Reset
    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'secret_code' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Cek apakah secret code benar
        $correctCode = env('ADMIN_RESET_CODE', '085786858184');
        
        if ($request->secret_code !== $correctCode) {
            return back()->withErrors([
                'secret_code' => 'Secret code salah! Silakan coba lagi.'
            ])->withInput();
        }

        // Reset password admin (email: admin@latif.com)
        $admin = User::where('email', 'admin@latif.com')->first();
        
        if (!$admin) {
            return back()->withErrors([
                'secret_code' => 'Admin tidak ditemukan!'
            ]);
        }

        // Update password
        $admin->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
    }
}
