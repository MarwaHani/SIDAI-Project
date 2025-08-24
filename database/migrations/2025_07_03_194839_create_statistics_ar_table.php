<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistics_ar', function (Blueprint $table) {
            $table->id();
            $table->string('جنس');             
            $table->string('الفئة_العمرية');          
            $table->string('جنسية');        
            $table->integer('سنة_الوصول');       
            $table->string('مدينة_الإقامة');    
            $table->string('مهنة')->nullable();
            $table->string('الحالة_الحالية')->nullable(); 
            $table->string('المستوى_الأكاديمي')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics_ar');
    }
};
