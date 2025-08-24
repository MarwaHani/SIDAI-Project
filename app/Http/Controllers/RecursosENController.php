<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecursosENController extends Controller
{
    public function index()
    {
        $recursos = DB::table('resources_en')->get()->groupBy('category');
        return view('ENrecursos', compact('recursos'));
    }
}
