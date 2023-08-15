<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ModelGuru;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Guru';
        $data = ModelGuru::all()->sortByDesc('id');
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit "> <button type="button" class="btn rounded-pill btn-icon btn-primary">
                        <span class="tf-icons bx bx-message-square-edit"></span>
                      </button></a>';
                    $btn = $btn . ' <button type="button"  data-id="' . $row->id . '" class="btn rounded-pill btn-icon btn-danger delete">
                    <span class="tf-icons bx bx-trash-alt"></span>
                  </button>';
                    //     return $btn;
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.guru.index', compact('title'));
    }

    public function store(Request $request)
    {
        try {
            // return dd($request->all());
            ModelGuru::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'nip' => $request->nip,
                    'nama_guru' => $request->nama_guru,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'no_telp' => $request->no_telp,
                    'foto' => '-',
                ]
            );
            return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataUser = ModelGuru::find($id);
        return response()->json($dataUser);
    }

    public function destroy($id)
    {
        try {
            ModelGuru::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
