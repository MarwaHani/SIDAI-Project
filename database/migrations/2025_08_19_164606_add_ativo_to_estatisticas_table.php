<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('estatisticas', function (Blueprint $table) {
            $table->boolean('ativo')->default(true)->after('nivel_academico');
        });
    }
    
    public function down()
    {
        Schema::table('estatisticas', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
    

};
