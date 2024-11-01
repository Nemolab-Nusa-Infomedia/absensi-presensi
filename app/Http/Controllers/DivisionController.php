<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Requests\DivisiRequest;
use Yajra\DataTables\Facades\DataTables;

class DivisionController extends Controller
{
    public function index(){
        return view('dashboard.menu.sdm.divisi', [
            'title' => 'Divisi - Hugostudio Presensi'
        ]);
    }


    public function store(DivisiRequest $request){
        $data = $request->validated();
        Divisi::create($data);

        return back()->with('success', 'Divisi berhasil ditambahkan');
    }

    public function fetchData($id)
    {
        $data = Divisi::find($id);
        return response()->json($data);
    }
    public function updateData(Request $request, $id){
        $data = Divisi::find($id);
        $data->name = $request->name;
        $data->save();
        return response()->json(['success' => 'Divisi berhasil diperbarui']);
    }
    public function deleteData($id){
        $data = Divisi::find($id);
        $data->delete();
        return response()->json(['success' => 'Divisi berhasil dihapus']);
    }



    public function getDivision(Request $request){
        if($request->ajax()){
            $data = Divisi::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $edit  = "<button type='button' data-id='".$row->id."' class='btn btn-warning rounded-pill btn-sm btn-edit' data-bs-target='#edit-divisi' data-bs-toggle='modal'><i class='bx bx-edit'></i></button>";
                    $delete = "<button type='button' class='btn btn-danger rounded-pill btn-sm' data-bs-target='#delete-divisi' data-bs-toggle='modal'><i class='bx bx-trash'></i></button>";
                    return $edit.$delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
