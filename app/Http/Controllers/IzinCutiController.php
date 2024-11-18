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
    
    public function store(IzinRequest $request){
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $izin = Izin::create($data);    
        
        return redirect()->route('izin-cuti-index');
    }
}
