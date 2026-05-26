<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $primaryKey = 'id_agendamento';

    protected $fillable = [
        'id_paciente',
        'id_medico',
        'data_consulta',
        'horario',
        'status'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function medico(){
        return $this->belongsTo(Medico::class, 'id_medico', 'id_medico');
    }
}
