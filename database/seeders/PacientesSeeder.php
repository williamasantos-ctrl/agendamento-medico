<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pacientes')->insert([
            'nome' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-05-15',
            'telefone' => '11988887777',
            'email' => 'joao@email.com',
            'sexo' => 'M',
        ]);
    }
}
