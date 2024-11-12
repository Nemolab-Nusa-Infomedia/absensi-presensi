<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function index(){
        return view('dashboard.menu.announcement.index', [
            'title' => 'Announcement - Hugostudio Presensi'
        ]);
    }

    
   public function store(AnnouncementRequest $request) {
    $data = $request->validated(); 

    if ($request->hasFile('image_header')) {
        $file = $request->file('image_header'); 
        $name = time() . '.' . $file->getClientOriginalExtension(); 
        $path = $file->storeAs('image_header', $name); 

        $data['image_header'] = $path; 
    }

    Announcement::create($data); // Buat pengumuman baru dengan data yang sudah divalidasi
    return redirect()->back()->with('success', 'Announcement berhasil ditambahkan');
}

    
    public function getAnnouncement(Request $request){
        if($request->ajax()){
            $data = Announcement::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $detail  = "<a href='".route('user-detail', ['id' => $row->id])."'><i class='bx bx-edit'></i></a>";
                    return $detail;
                })
                ->addColumn('image_header', function($row){
                    $image = '<img src="'.asset('storage/'.$row->image_header).'" width="100px" height="100px">';
                    return $image;
                })
                ->rawColumns(['action','image_header'])
                ->make(true);
        }
    }
}
