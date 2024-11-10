<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(){
        $divisi = Divisi::all();
        return view('presensi.menu.akun.index',compact('divisi'),[
            'title' => 'Akun'
        ]);
    }
}
