<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ARestatistica;

class EstatisticasARController extends Controller
{
    public function index()
    {
        $statistics = ARestatistica::all();

        $data = [
            'جنس' => $statistics->groupBy('جنس')->map->count(),
            'جنسية' => $statistics->groupBy('جنسية')->map->count(),
            'مدينة_الإقامة' => $statistics->groupBy('مدينة_الإقامة')->map->count(),
            'سنة_الوصول' => $statistics->groupBy('سنة_الوصول')->sortKeys()->map->count(),
         ];

        return view('ARestatisticas', [
            'imigrantes' => $statistics,
            'dados' => $data,
        ]);
    }
}
