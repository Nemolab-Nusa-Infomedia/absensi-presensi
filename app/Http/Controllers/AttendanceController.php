<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Koordinat lokasi kantor yang diizinkan
        $officeLocation = Location::first(); // Mengambil lokasi kantor dari tabel

        // Tentukan radius presensi (dalam meter)
        $radius = 100; // Misalnya 100 meter

        if ($this->isWithinRadius($officeLocation->latitude, $officeLocation->longitude, $latitude, $longitude, $radius)) {
            Attendances::create([
                'user_id' => $user->id,
                'check_in' => now(),
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);

            return response()->json(['message' => 'Presensi berhasil!'], 200);
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
}
