<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IzinCutiController extends Controller
{
    public function index(){
        return view('presensi.menu.izin-cuti.index', [
            'title' => 'Izin Cuti'
        ]);
    }
}
