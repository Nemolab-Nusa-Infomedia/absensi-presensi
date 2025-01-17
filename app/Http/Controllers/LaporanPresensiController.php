<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPresensiController extends Controller
{
    public function index(Request $request){
        $user = Auth::user()->id;

        // Default: Menampilkan data bulan dan tahun sekarang
        $currentMonth = now()->month; // Bulan saat ini
        $currentYear = now()->year;  // Tahun saat ini

        $userAttendances = Attendances::where('user_id', $user)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get()
            ->sortByDesc('created_at');

        $attendances = $userAttendances->map(function ($attendance) {
            return [
                'hari' => Carbon::parse($attendance->created_at)->locale('id')->isoFormat('dddd'),
                'tanggal_bulan_tahun' => Carbon::parse($attendance->created_at)->isoFormat('D MMMM YYYY'),
                'check_in' => Carbon::parse($attendance->check_in)->format('H:i:s'),
                'check_out' => $attendance->check_out ? Carbon::parse($attendance->check_out)->format('H:i:s') : '-',
            ];
        });

        return view('presensi.menu.laporan-presensi.index', compact('attendances'), [
            'title' => 'Laporan Presensi'
        ]);
    }

}
