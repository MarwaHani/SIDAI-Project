<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatistica extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexo',
        'idade',
        'grupo_etario',
        'nacionalidade',
        'ano_chegada',
        'cidade_residencia',
        'profissao',
        'situacao_atual',
        'nivel_academico',
    ];
}
