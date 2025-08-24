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
        if (!Schema::hasTable('entidades')) {
            Schema::create('entidades', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('contacto');
                $table->string('local');
                $table->string('website')->nullable();
                $table->string('descricao')->nullable();
                $table->string('categoria');
                $table->string('imagem')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades');
    }
};
