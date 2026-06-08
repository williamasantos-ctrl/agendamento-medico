<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_medico';

    protected $fillable = ['nome','crm', 'telefone', 'email', 'id_especialidade'];

    public function agendamentos(){
        return $this->hasMany(Agendamento::class, 'id_medico');
    }

    public function especialidades(){
        return $this->belongsTo(Especialidade::class, 'id_especialidade');
    }

    public function agendas()
{
    return $this->hasMany(Agenda::class, 'id_medico', 'id');
}
}
