<?php

namespace Database\Factories;

use App\Models\Donacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonacionFactory extends Factory
{
    protected $model = Donacion::class;

    public function definition()
    {
        return [
            'monto' => $this->faker->numberBetween(1000, 200000),
            'fecha' => $this->faker->dateTimeThisYear,
        ];
    }
}
