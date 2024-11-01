<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
