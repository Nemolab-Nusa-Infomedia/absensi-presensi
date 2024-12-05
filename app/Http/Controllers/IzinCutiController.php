<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use App\Http\Requests\IzinRequest;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

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

    public function getIzin(Request $request){
        if($request->ajax()){
            $data = Izin::with('users')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('users', function($row){
                    return $row->users->name ?? '-';
                })
                ->addColumn('action', function($row) {
                    if ($row->is_accepted == 'accepted') {
                        return "<button type='button' class='btn btn-sm btn-success'>Sudah Disetujui</button>";
                    } elseif ($row->is_accepted == 'rejected') {
                        return "<button type='button' class='btn btn-sm btn-danger'>Sudah Ditolak</button>";
                    } else {
                        $approve = "<a href='".route('accpt-izin-cuti', ['id' => $row->id])."' class='btn btn-success btn-sm'>Setujui</a>";
                        $reject = "<a href='".route('reject-izin-cuti', ['id' => $row->id])."' class='btn btn-danger ms-1 btn-sm'>Tolak</a>";

                        return $approve . $reject;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function accptIzin(Request $request){
        $izin = Izin::find($request->id);
        $izin->is_accepted = 'accepted';    
        $izin->save();
        return redirect()->route('izin-cuti-dashboard');
    }

    public function rejectIzin(Request $request){
        $izin = Izin::find($request->id);
        $izin->is_accepted = 'rejected';    
        $izin->save();
        return redirect()->route('izin-cuti-dashboard');
    }
}
