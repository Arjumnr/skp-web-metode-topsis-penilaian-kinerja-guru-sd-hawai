<?php

namespace App\Http\Controllers;

use App\Models\ModelGuru;
use App\Models\ModelKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $data = ModelKriteria::all();
        $dataGuru = ModelGuru::all();
        // if (Auth::user()->role == 'admin') {
        //     return view('index', compact('data', 'dataGuru'));
        // }else if (Auth::user()->role == 'guru') {
        //     return view('kepsek.index', compact('data', 'dataGuru'));
        // }
        // return response()->json($data);
        return view('index', compact('data', 'dataGuru'));
    }
}
