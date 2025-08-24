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
        if (!Schema::hasTable('entities_en')) {
            Schema::create('entities_en', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('contact');
                $table->string('local');
                $table->string('website')->nullable();
                $table->string('description')->nullable();
                $table->string('category');
                $table->string('img')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities_en');
    }
};
