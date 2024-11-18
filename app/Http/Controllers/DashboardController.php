<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $countUser = User::count();
        $countPegawai = User::where('role_user','pegawai')->count();
        $countMagang = User::where('role_user','magang')->count();
        $laki = User::where('gender','male')->count();
        $perempuan = User::where('gender','female')->count();
        return view('dashboard.index', compact('countUser','countPegawai','countMagang','laki','perempuan'), [
            'title' => 'Beranda - Hugostudio Presensi'
        ]);
    }
}
