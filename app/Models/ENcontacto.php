<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ENcontacto extends Model
{
    use HasFactory;
    protected $table = 'contact_en'; 
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'answered',
    ];
}
