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
        Schema::table('users', function (Blueprint $table) {
            $table->string('apelido')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('telemovel')->nullable();
            $table->string('sexo')->nullable();
            $table->string('pais')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['apelido', 'data_nascimento', 'telemovel', 'sexo', 'pais']);
        });
    }
};
