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
        Schema::create('estatisticas', function (Blueprint $table) {
            $table->id();
            $table->string('sexo');
            $table->integer('idade'); 
            $table->string('nacionalidade'); 
            $table->date('ano_chegada'); 
            $table->string('cidade_residencia'); 
            $table->string('profissao'); 
            $table->string('situacao_atual'); 
            $table->string('nivel_academico'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatisticas');
    }
};
