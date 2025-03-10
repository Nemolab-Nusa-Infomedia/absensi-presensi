<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            // Jika user sudah login, langsung redirect ke halaman yang sesuai
            if (Auth::user()->hasRole('superadmin')) {
                return redirect()->route('dashboard-home');
            } else {
                return redirect()->route('presensi-home');
            }
        }

        return view('auth.login'); // Jika belum login, tampilkan halaman login
    }

    public function reset_password(){
        return view('auth.reset_password', [
            'title' => 'Reset Password'
        ]);
    }

    public function check(Request $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Cek apakah remember me dicentang

        if(Auth::attempt($credentials, $remember)){ // Gunakan remember me
            if(Auth::user()->hasRole('superadmin')){
                return redirect()->route('dashboard-home');
            } else {
                if(Auth::user()->is_changed == false){
                    return redirect()->route('reset-password');
                }
                return redirect()->route('presensi-home');
            }
        }else{
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }


    public function reset(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
            'is_changed' => true,
        ]);

        Auth::login($user);
        return redirect()->route('presensi-home');
    }

    public function logout(Request $request) {
        Auth::logout(); // Logout user

        // Hapus sesi yang masih tersimpan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }

}
