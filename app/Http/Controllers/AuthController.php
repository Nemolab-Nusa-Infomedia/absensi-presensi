<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function reset_password(){
        return view('auth.reset_password', [
            'title' => 'Reset Password'
        ]);
    }

    public function check(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            if(Auth::user()->hasRole('superadmin')){
                return redirect()->route('dashboard-home');
            } else {
                if(Auth::user()->is_changed == false){
                    return redirect()->route('reset-password');
                }
                return redirect()->route('presensi-home');
            }
        }else{
            return redirect()->route('login');
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
            'is_change' => 'change',
        ]);

        Auth::login($user);
        return redirect()->route('presensi-home');
    }
}
