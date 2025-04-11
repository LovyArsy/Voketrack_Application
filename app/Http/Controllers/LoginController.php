<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required', 
        ]);

        Auth::logout();

        // Coba login sebagai guru
        if (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();

            // Simpan data Guru ke session
            $guru = Auth::guard('guru')->user();
            session([
                'peminjam_id' => $guru->id,
                'peminjam_type' => 'App\Models\Guru'
            ]);
            session()->save(); // Pastikan session tersimpan

            return redirect()->intended('scan');
        }

        // Jika gagal, coba login sebagai siswa
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            // Simpan data Siswa ke session
            $siswa = Auth::guard('web')->user();
            session([
                'peminjam_id' => $siswa->id,
                'peminjam_type' => 'App\Models\Siswa'
            ]);
            session()->save(); // Pastikan session tersimpan

            return redirect()->intended('scans');
        }

        return back()->with('loginerror', 'Login failed!');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        } else {
            Auth::logout();
        }

        // Hapus session peminjam
        $request->session()->forget(['peminjam_id', 'peminjam_type']);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
