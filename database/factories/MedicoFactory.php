<?php

namespace Database\Factories;

use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'crm' => $this->faker->unique()->numerify('######/??'),
            'telefone' => $this->faker->numerify('(##) 9###-####'),
            'email' => $this->faker->unique()->safeEmail(),
            'id_especialidade' => Especialidade::inRandomOrder()->first()->id ?? 1,
        ];
    }
}
