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
        Schema::create('agendas', function (Blueprint $table) {
        $table->id('id_agenda');
        $table->foreignId('id_medico')->constrained('medicos', 'id')->onDelete('cascade');
        $table->time('horario_inicio');
        $table->time('horario_fim');
        $table->integer('duracao_consulta'); 
        $table->string('dia_semana'); 
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
