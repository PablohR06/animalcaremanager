<?php

// database/factories/SolicitudAdopcionFactory.php

namespace Database\Factories;

use App\Models\SolicitudAdopcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudAdopcionFactory extends Factory
{
    protected $model = SolicitudAdopcion::class;

    public function definition()
    {
        return [
            'estado' => $this->faker->randomElement(['Pendiente', 'Aprobada', 'Rechazada']),
            'usuario_id' => \App\Models\User::factory(),
            'animal_id' => \App\Models\Animal::factory(),
        ];
    }
}
