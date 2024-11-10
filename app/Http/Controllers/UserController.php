<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Mail\SendInformationLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        $divisi = Divisi::all();
        return view('dashboard.menu.sdm.user',compact('divisi'), [
            'title' => 'User - Hugostudio Presensi'
        ]);
    }

    public function detail($id){
        $divisi = Divisi::all();
        $user = User::find($id);
        return view('dashboard.menu.sdm.detail_user', compact('user','divisi'), [
            'title' => 'User - Hugostudio Presensi' 
        ]);
    }

    public function store(UserRequest $request){
        $otp = Str::padLeft(rand(0, 999999), 6, '0');
        $data = $request->validated();
        $data['password'] = $otp;
        $data['password'] = Hash::make($data['password']);
        $data['is_changed'] = false;
        $data['otp'] = $otp;


        $user = User::create($data);
        if($data['role_user'] == 'pegawai'){
            $user->assignRole('pegawai');
        } else {
            $user->assignRole('magang');
        }
        Mail::send(new SendInformationLogin($user));

        return back()->with('success', 'User berhasil  ditambahkan');
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::find($id);
        $data = $request->validated();

        if($request->hasFile('profile_image')){
            if($user->profile_image){
                Storage::delete($user->profile_image);
            }


            $file = $request->file('profile_image');
            $name = Str::before(Auth::user()->name, ' ').'-'. time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('profile_image')->storeAs(
                'avatars', $name
            );
            
            $data['profile_image'] = $path;
            $user->update($data);
        }
        $user->update($data);
        return redirect()->back()->with('success', 'User berhasil  diperbaharui');
    }

    public function getUser(Request $request){
        if($request->ajax()){
            $data = User::with('divisis')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('divisis', function($row){
                    return $row->divisis->name ?? '-';
                })
                ->addColumn('gender', function($row){
                    return $row->gender == 'male' ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('action', function($row){
                    $detail  = "<a href='".route('user-detail', ['id' => $row->id])."'><i class='bx bx-edit'></i></a>";
                    return $detail;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
