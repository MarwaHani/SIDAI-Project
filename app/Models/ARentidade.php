<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ARentidade extends Model
{
    use HasFactory;
    protected $table = 'entities_en'; 
    protected $primaryKey = 'id';
    public $incrementing = true; 
    protected $keyType = 'int'; 

    public $timestamps = false;

    protected $fillable = [
        'الاسم',
        'تواصل',
        'الموقع',
        'وصف',
        'فئة',
        'رابط',
        'صورة'
    ];
}
