<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'especialidades';

    protected $primaryKey = 'id_especialidades';

    protected $fillable = ['nome', 'descricao'];

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'id_especialidades');
    }
}
