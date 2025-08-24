<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ENestatistica extends Model
{
    use HasFactory;
    protected $table = 'statistics_en';
    protected $fillable = [
        'gender',
        'age_group',
        'nationality',
        'arrival_year',
        'city_of_residence',
        'profession',
        'current_status',
        'academic_level',
    ];
}
