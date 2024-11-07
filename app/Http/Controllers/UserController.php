<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Mail\SendInformationLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
        $divisi = Divisi::all();
        return view('dashboard.menu.sdm.user',compact('divisi'), [
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
                    $edit  = "<button type='button' data-id='".$row->id."' class='btn btn-warning rounded-pill btn-sm btn-edit' data-bs-target='#edit-divisi' data-bs-toggle='modal'><i class='bx bx-edit'></i></button>";
                    $delete = "<button type='button' data-id='".$row->id."' class='btn btn-danger rounded-pill btn-sm btn-delete' data-bs-target='#delete-divisi' data-bs-toggle='modal'><i class='bx bx-trash'></i></button>";
                    return $edit.$delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
