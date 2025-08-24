<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ARestatistica extends Model
{
    use HasFactory;
    protected $table = 'statistics_ar';
    protected $fillable = [
        'جنس',
        'الفئة_العمرية',
        'جنسية',
        'سنة_الوصول',
        'مدينة_الإقامة',
        'مهنة',
        'الحالة_الحالية',
        'المستوى_الأكاديمي',
    ];
}
