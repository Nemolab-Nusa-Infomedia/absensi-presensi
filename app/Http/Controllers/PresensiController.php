<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendances;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index(){
        $$pengumuman = Announcement::orderBy('created_at', 'desc')->get();
        $user_id = Auth::user()->id;
        $user = Attendances::where('user_id', $user_id)->first();

        $hariIniMasuk = Attendances::where('user_id', $user_id)
                        ->whereDate('check_in', Carbon::today())
                        ->first();

        $check_in = $hariIniMasuk ? Carbon::parse($hariIniMasuk->check_in)->format('H:i:s') . ' WIB' : '-- : -- : -- WIB';
        $check_out = $hariIniMasuk && $hariIniMasuk->check_out ? Carbon::parse($hariIniMasuk->check_out)->format('H:i:s') . ' WIB' : '-- : -- : -- WIB'; 
        return view('presensi.menu.homepage.index', compact('user','check_in','check_out','pengumuman'), [
            'title' => 'Presensi - Hugostudio Presensi',
        ]);
    }

    public function scanIn(){
        return view('presensi.menu.scan-presensi.scan', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }


}
