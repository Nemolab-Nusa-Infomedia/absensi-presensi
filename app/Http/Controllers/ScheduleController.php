<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    public function index(){
        return view('dashboard.menu.schedule.index', [
            'title' => 'Schedule - Hugostudio Presensi'
        ]);
    }

    public function store(ScheduleRequest $request){
        $data = $request->validated();
        $data['jam_masuk'] = $request->jam_masuk;
        $data['jam_keluar'] = $request->jam_keluar;
        $schedule = Schedule::create($data);

        return redirect()->route('schedule-index');
    }

    public function getSchedule(Request $request){
        if($request->ajax()){
            $data = Schedule::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $detail  = "<a href='".route('user-detail', ['id' => $row->id])."'><i class='bx bx-edit'></i></a>";
                    return $detail;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
}
