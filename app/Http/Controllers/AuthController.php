<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('auth.login');
    }

    /**
     * Memproses login menggunakan NIS.
     */
    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|size:5',
            'nisn' => 'required|string|size:10',
        ]);

        $user = User::where('nis', $request->nis)
                    ->where('nisn', $request->nisn)
                    ->first();

        if ($user) {
            Auth::login($user, true);
            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            'login' => 'NIS atau NISN yang Anda masukkan salah.',
        ])->withInput();
    }

    /**
     * Logout dari sistem.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Logika pengalihan dashboard berdasarkan role.
     */
    private function redirectBasedOnRole($user)
    {
        if ($user->role === 'Bendahara') {
            return redirect()->route('bendahara.dashboard');
        }
        return redirect()->route('siswa.dashboard');
    }
}
