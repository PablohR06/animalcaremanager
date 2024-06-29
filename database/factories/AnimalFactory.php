<?php

// database/factories/AnimalFactory.php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Albergue;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'tamano' => $this->faker->randomElement(['Pequeño', 'Mediano', 'Grande']),
            'foto' => $this->faker->imageUrl(),
            'edad' => $this->faker->numberBetween(1, 15) . ' años ' . $this->faker->numberBetween(0, 11) . ' meses',
            'comentario' => $this->faker->sentence,
            'estado_esterilizacion' => $this->faker->boolean,
            'estado_chip' => $this->faker->boolean,
            'estado_salud' => $this->faker->randomElement(['Buen estado', 'Caso Urgente']),
            'estadoanimal' => $this->faker->randomElement(['Adopción', 'Adoptado']),
            'fecha_registro' => $this->faker->date,
            'especie' => $this->faker->randomElement(['Perro', 'Gato']),
            'albergue_id' => Albergue::factory(),
        ];
    }
}
