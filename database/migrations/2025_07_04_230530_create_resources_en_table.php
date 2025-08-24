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
        Schema::create('resources_en', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('local')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('category'); 
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources_en');
    }
};

