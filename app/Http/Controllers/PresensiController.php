<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(){
        return view('presensi.menu.homepage.index', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }

    public function scan(){
        return view('presensi.menu.scan-presensi.scan', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }
}
