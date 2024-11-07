<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{

    public function index(){
        return view('dashboard.menu.presensi.index', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }

    public function storeAttendanceIn(Request $request){
        $user = Auth::user();
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Koordinat lokasi kantor yang diizinkan
        $officeLocation = Location::first(); // Mengambil lokasi kantor dari tabel

        // Tentukan radius presensi (dalam meter)
        $radius = 50;

         // Cek apakah user berada dalam radius kantor
        if ($this->isWithinRadius($officeLocation->latitude, $officeLocation->longitude, $latitude, $longitude, $radius)) {
            
            // Cari record attendance untuk hari ini
            $attendance = Attendances::where('user_id', $user->id)
                ->whereDate('check_in', now()->toDateString()) // Cek apakah pada hari yang sama
                ->first();

            if ($attendance) {
                // Jika sudah check_in, update check_out
                $attendance->update([
                    'check_out' => now()
                ]);

                return response()->json(['message' => 'Presensi check-out berhasil!'], 200);
            } else {
                // Jika belum ada check_in, buat record baru
                Attendances::create([
                    'user_id' => $user->id,
                    'check_in' => now(),
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);

                return response()->json(['message' => 'Presensi check-in berhasil!'], 200);
            }
        }
        return response()->json(['message' => 'Lokasi Anda tidak sesuai untuk presensi.'], 403);
    }


    // Fungsi untuk menghitung jarak
    private function isWithinRadius($lat1, $lon1, $lat2, $lon2, $radius){
        $earthRadius = 6371000; // Radius bumi dalam meter
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon/2) * sin($dLon/2);

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $earthRadius * $c;

        return $distance <= $radius;
    }


    public function getAttendances(Request $request){
        if($request->ajax()){
            $data = Attendances::with('users')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('users', function($row){
                    return $row->users->name ?? '-';
                })
                ->addColumn('check_in', function($row){
                    return Carbon::parse($row->check_in)->format('H:i:s');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
