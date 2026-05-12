<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'email',
        'sexo'
    ];
}
