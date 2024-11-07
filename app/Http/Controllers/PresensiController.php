<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $user = Attendances::where('user_id', $user_id)->first();
        $check_in = Carbon::parse($user->check_in)->format('H:i:s');
        $check_out = Carbon::parse($user->check_out)->format('H:i:s');
        return view('presensi.menu.homepage.index', compact('user','check_in','check_out'), [
            'title' => 'Presensi - Hugostudio Presensi',
        ]);
    }

    public function scanIn(){
        return view('presensi.menu.scan-presensi.scan', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }


}
