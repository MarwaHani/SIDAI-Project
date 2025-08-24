<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    use HasFactory;

    protected $table = 'entidades'; 
    protected $primaryKey = 'id_entidade';
    public $incrementing = true; 
    protected $keyType = 'int'; 

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'contacto',
        'local',
        'descricao',
        'categoria',
        'website',
        'imagem'
    ];
}

