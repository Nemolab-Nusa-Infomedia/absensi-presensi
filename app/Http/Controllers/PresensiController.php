<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('presensi.menu.homepage.index', compact('user'), [
            'title' => 'Presensi - Hugostudio Presensi',
        ]);
    }

    public function scanIn(){
        return view('presensi.menu.scan-presensi.scan_in', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }

    public function scanOut(){
        return view('presensi.menu.scan-presensi.scan_out', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }

}
