<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';
    protected $primaryKey = 'id_agenda';

    protected $fillable = [
        'id_medico',
        'horario_inicio',
        'horario_fim',
        'duracao_consulta',
        'dia_semana'
    ];

    
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico', 'id_medico');
    }
}
