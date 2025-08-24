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
        if (!Schema::hasTable('entities_ar')) {
            Schema::create('entities_ar', function (Blueprint $table) {
                $table->id();
                $table->string('الاسم');
                $table->string('تواصل');
                $table->string('الموقع');
                $table->string('وصف')->nullable();
                $table->string('فئة')->nullable();
                $table->string('رابط');
                $table->string('صورة')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities_ar');
    }
};
