<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Paciente>
 */
class PacienteFactory extends Factory
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
            'cpf' => $this->faker->numerify('###########'),
            'data_nascimento' => $this->faker->date('Y-m-d', '-18 years'),
            'telefone' => $this->faker->numerify('(##)9###-####'),
            'email' => $this->faker->unique()->safeEmail(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
