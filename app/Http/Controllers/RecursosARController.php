<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecursosARController extends Controller
{
    public function index()
    {
        $recursos = DB::table('resources_ar')->get()->groupBy('category');
        return view('ARrecursos', compact('recursos'));
    }
}
