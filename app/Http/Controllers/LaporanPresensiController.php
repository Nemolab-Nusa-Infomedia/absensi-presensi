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

        // Ambil nilai bulan dan tahun dari input 'month', atau gunakan bulan dan tahun sekarang jika tidak ada
        $selectedMonthYear = $request->input('month', now()->format('Y-m'));
        [$selectedYear, $selectedMonth] = explode('-', $selectedMonthYear);

        // Query data dengan filter dinamis
        $userAttendances = Attendances::where('user_id', $user)
            ->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
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

        return view('presensi.menu.laporan-presensi.index', compact('attendances', 'selectedMonthYear'), [
            'title' => 'Laporan Presensi'
        ]);
    }

}
