<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $divisi = Divisi::all();
        return view('dashboard.menu.sdm.user',compact('divisi'), [
            'title' => 'User - Hugostudio Presensi'
        ]);
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        $data['password'] = Str::random(18);
        $data['password'] = Hash::make($data['password']);
        $data['is_changed'] = false;


        $user = User::create($data);
        if($data['role_user'] == 'pegawai'){
            $user->assignRole('pegawai');
        } else {
            $user->assignRole('magang');
        }

        dd($data);
        return back()->with('success', 'User berhasil ditambahkan');
    }
}
