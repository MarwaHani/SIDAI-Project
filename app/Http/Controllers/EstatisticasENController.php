<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ENestatistica;

class EstatisticasENController extends Controller
{
    public function index()
    {
        $statistics = ENestatistica::all();

        $data = [
            'gender' => $statistics->groupBy('gender')->map->count(),
            'nationality' => $statistics->groupBy('nationality')->map->count(),
            'city_of_residence' => $statistics->groupBy('city_of_residence')->map->count(),
            'arrival_year' => $statistics->groupBy('arrival_year')->sortKeys()->map->count(),
         ];

        return view('ENestatisticas', [
            'imigrantes' => $statistics,
            'dados' => $data,
        ]);
    }
}
