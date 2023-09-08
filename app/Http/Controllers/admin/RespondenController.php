<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ModelResponden;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RespondenController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Responden';
        $data = ModelResponden::with('getGuru', 'getKriteria')->orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {

                //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit "> <button type="button" class="btn rounded-pill btn-icon btn-primary">
                //         <span class="tf-icons bx bx-message-square-edit"></span>
                //       </button></a>';
                //     $btn = $btn . ' <button type="button" class="btn rounded-pill btn-icon btn-danger">
                //     <span class="tf-icons bx bx-trash-alt"></span>
                //   </button>';
                //     //     return $btn;
                //     return $btn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('admin.responden.index', compact('title'));
    }


    public function store(Request $request){
        // return dd ($request->all());
        $data = $request->all();

        // Extract and remove guru_id from the data array
        $guruId = $data['guru_id'];
        $kriteriaId = '';
        $bobot = '';
        unset($data['guru_id']);

        // Loop through the remaining data to extract kriteria_id and bobot
        $penilaians = [];
        foreach ($data as $key => $value) {
            $kriteriaId = substr($key, strlen('radio_'));

            if ($value == intval($value)){
                $penilaians[] = [
                    'guru_id' => $guruId,
                    'kriteria_id' => $kriteriaId,
                    'bobot' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
           
        }

        $simpan = ModelResponden::insert($penilaians);
        if($simpan){
            return redirect()->route('index')->with('success', 'Data berhasil ditambahkan');

        }
        else{
            return response()->json('error', 'Data gagal ditambahkan');
        }


        
        
    }
}
