<?php

namespace Database\Factories;

use App\Models\Seguimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeguimientoFactory extends Factory
{
    protected $model = Seguimiento::class;

    public function definition()
    {
        return [
            'estado_seguimiento' => $this->faker->randomElement(['En progreso', 'Completado']),
            'observaciones' => $this->faker->sentence,
            'fecha' => $this->faker->dateTimeThisYear,
        ];
    }
}
