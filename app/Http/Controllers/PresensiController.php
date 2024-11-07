<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index(){
        return view('presensi.index', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }

    public function scan(){
        return view('presensi.scan', [
            'title' => 'Presensi - Hugostudio Presensi'
        ]);
    }
}
