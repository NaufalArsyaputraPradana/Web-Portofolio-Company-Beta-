<?php

// 
// Namespace dan Import
// 
namespace App\Http\Controllers\editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

// 
// Kontroler Auth
// 
class AuthController extends Controller
{
    // 
    // Menampilkan Halaman Login
    // 
    public function index()
    {
        return view('pages.auth.login');
    }

    // 
    // Proses Autentikasi
    // 
    public function authenticate(Request $request): RedirectResponse
    {
        // 
        // Validasi Input
        // 
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // 
        // Cek Autentikasi
        // 
        if (Auth::attempt($credentials)) {
            // 
            // Regenerasi Session
            // 
            $request->session()->regenerate();

            // 
            // Redirect ke Halaman Utama
            // 
            return redirect()->intended(route('editor.home'));
        } else {
            // 
            // Redirect ke Halaman Login dengan Pesan Error
            // 
            return back()->with('LoginError', 'Login Gagal');
        }

    }

    // 
    // Proses Logout
    // 
    public function logout(Request $request): RedirectResponse
    {
        // 
        // Logout
        // 
        Auth::logout();

        // 
        // Invalidate Session
        // 
        $request->session()->invalidate();

        // 
        // Regenerasi Token Session
        // 
        $request->session()->regenerateToken();

        // 
        // Redirect ke Halaman Login
        // 
        return redirect()->route('login');
    }
}