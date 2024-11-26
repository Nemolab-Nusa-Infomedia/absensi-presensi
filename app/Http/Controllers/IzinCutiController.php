<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use App\Http\Requests\IzinRequest;
use Illuminate\Support\Facades\Auth;

class IzinCutiController extends Controller
{
    public function index(){
        return view('presensi.menu.izin-cuti.index', [
            'title' => 'Izin Cuti'
        ]);
    }

    public function indexDashboard(){
        return view('dashboard.menu.izin-cuti.index', [
            'title' => 'Izin Cuti'
        ]);
    }

    public function store(IzinRequest $request){
        $data = $request->validated();
        $izin = Izin::create($data);

        return redirect()->route('izin-cuti');
    }

    public function riwayat(){
        $data = Izin::with('users')->where('user_id', Auth::user()->id)->get();
        return view('presensi.menu.izin-cuti.riwayat',compact('data'), [
            'title' => 'Riwayat Izin Cuti'
        ]);
    }
}
