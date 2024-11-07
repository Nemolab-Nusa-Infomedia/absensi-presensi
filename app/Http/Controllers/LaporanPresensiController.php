<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPresensiController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
        $userAttendances = Attendances::where('user_id', $user)->get()->sortByDesc('created_at');
        $attendances = $userAttendances->map(function ($attendance) {
            return [
                'created_at' => Carbon::parse($attendance->created_at)->locale('id')->dayName,
                'check_in' => Carbon::parse($attendance->check_in)->format('H:i:s'),
                'check_out' => $attendance->check_out ? Carbon::parse($attendance->check_out)->format('H:i:s') : '-',
            ];
        });
        return view('presensi.menu.laporan-presensi.index', compact('attendances'), [
            'title' => 'Laporan Presensi'
        ]);
    }
}
