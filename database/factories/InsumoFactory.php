<?php

// database/factories/InsumoFactory.php

namespace Database\Factories;

use App\Models\Insumo;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsumoFactory extends Factory
{
    protected $model = Insumo::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'cantidad' => $this->faker->numberBetween(1, 100),
            'fecha_ingreso' => $this->faker->dateTimeThisYear,
        ];
    }
}
