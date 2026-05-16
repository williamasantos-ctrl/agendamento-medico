<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('agendamentos', function(Blueprint $table){
        $table->id('id_agendamento');
        $table->foreignId('id_paciente')->constrained('pacientes')->onDelete('cascade');
        $table->foreignId('id_medico')->constrained('medicos', 'id')->onDelete('cascade');
        $table->date('data_consulta');
        $table->time('horario');
        $table->string('status')->default('pendente');
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
