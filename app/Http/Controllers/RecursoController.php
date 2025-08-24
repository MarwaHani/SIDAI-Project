<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;

class RecursoController extends Controller
{
    public function index()
    {
        // Buscar todos os recursos e agrupá-los por categoria
        $recursos = Recurso::all()->groupBy('categoria');

        // Retorna a view "recursos.blade.php" com os dados agrupados
        return view('recursos', compact('recursos'));
    }
}
