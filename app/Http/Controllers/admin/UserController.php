<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title  = 'Users';
        $data = User::all()->sortByDesc('id');
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
        return view('admin.users.index', compact('title'));
    }

    public function store(Request $request)
    {
        try {
            // return dd($request->all());

            if ($request->password){
                User::updateOrCreate(
                    ['id' => $request->data_id],
                    [
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                    ]
                );
                return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
            }else {
                User::updateOrCreate(
                    ['id' => $request->data_id],
                    [
                        'name' => $request->name,
                        'username' => $request->username,
                        'role' => $request->role,
                    ]
                );
                return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
            }
           
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataUser = User::find($id);
        return response()->json($dataUser);
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
