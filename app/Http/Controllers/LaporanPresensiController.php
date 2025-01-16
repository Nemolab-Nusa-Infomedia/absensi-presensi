<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanPresensiController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user()->id;
    
        // Filter berdasarkan bulan dan tahun
        $month = $request->query('month'); // format: YYYY-MM
        $query = Attendances::where('user_id', $user);
    
        if ($month) {
            $query->whereYear('created_at', substr($month, 0, 4))
                  ->whereMonth('created_at', substr($month, 5, 2));
        }
    
        $userAttendances = $query->get()->sortByDesc('created_at');
        $attendances = $userAttendances->map(function ($attendance) {
            return [
                'hari' => Carbon::parse($attendance->created_at)->locale('id')->isoFormat('dddd'),
                'tanggal_bulan_tahun' => Carbon::parse($attendance->created_at)->isoFormat('D/MM/YYYY'),
                'check_in' => Carbon::parse($attendance->check_in)->format('H:i:s'),
                'check_out' => $attendance->check_out ? Carbon::parse($attendance->check_out)->format('H:i:s') : '-',
            ];
        });
        
    
        return view('presensi.menu.laporan-presensi.index', compact('attendances'), [
            'title' => 'Laporan Presensi'
        ]);
    }

}
