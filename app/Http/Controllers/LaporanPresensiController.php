<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPresensiController extends Controller
{
    public function index(){
        return view('presensi.menu.laporan-presensi.index', [
            'title' => 'Laporan Presensi'
        ]);
    }
}
