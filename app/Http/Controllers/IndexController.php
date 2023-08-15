<?php

namespace App\Http\Controllers;

use App\Models\ModelGuru;
use App\Models\ModelKriteria;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = ModelKriteria::all();
        $dataGuru = ModelGuru::all();
        // return response()->json($data);
        return view('index', compact('data', 'dataGuru'));
    }
}
