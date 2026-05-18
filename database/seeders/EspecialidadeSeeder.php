<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
        ['nome' => 'Cardiologia'],
        ['nome' => 'Pediatria'],
        ['nome' => 'Ortopedia'],
        ['nome' => 'Dermatologia'],
        ['nome' => 'Ginecologia'],
        ];

        foreach ($especialidades as $especialidade) {
            Especialidade::create($especialidade);
        }
    }
}
