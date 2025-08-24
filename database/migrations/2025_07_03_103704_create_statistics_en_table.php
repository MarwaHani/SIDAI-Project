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
        Schema::create('statistics_en', function (Blueprint $table) {
            $table->id();
            $table->string('gender');             
            $table->string('age_group');          
            $table->string('nationality');        
            $table->integer('arrival_year');       
            $table->string('city_of_residence');    
            $table->string('profession')->nullable();
            $table->string('current_status')->nullable(); 
            $table->string('academic_level')->nullable();  
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics_en');
    }
};
