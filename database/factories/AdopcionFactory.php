<?php

namespace Database\Factories;

use App\Models\Adopcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdopcionFactory extends Factory
{
    protected $model = Adopcion::class;

    public function definition()
    {
        return [
            'fecha_adopcion' => $this->faker->dateTimeThisYear,
            'estado_animal' => 'Adoptado',
            'comentario' => $this->faker->sentence,
        ];
    }
}
