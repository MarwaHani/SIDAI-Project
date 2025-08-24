<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatistica;

class EstatisticasController extends Controller
{
    public function index(){
        $estatisticas = Estatistica::where('ativo',1)->get(); 
    

    $dados = [
        'sexo' => $estatisticas->groupBy('sexo')->map->count(),
        'nacionalidade' => $estatisticas->groupBy('nacionalidade')->map->count(),
        'cidade_residencia' => $estatisticas->groupBy('cidade_residencia')->map->count(),
        'ano_chegada' => $estatisticas->groupBy('ano_chegada')->sortKeys()->map->count(),
    ];

    return view('estatisticas', [
        'imigrantes' => $estatisticas,
        'dados' => $dados
    ]);
}
public function gerir(){
    $estatisticas = Estatistica::where('ativo',1)->get();  
    return view('admin.gerirEstatisticas', compact('estatisticas'));
}




public function store(Request $r){
    Estatistica::create($r->all());
    return back();
}

public function update(Request $r, $id){
    $e = Estatistica::findOrFail($id);
    $e->update($r->all());
    return response()->json(['ok'=>true]);
}
public function toggle($id)
{
    $est = Estatistica::findOrFail($id);
    $est->ativo = !$est->ativo;
    $est->save();
    return response()->json(['ok' => true, 'ativo' => $est->ativo]);
}

}
