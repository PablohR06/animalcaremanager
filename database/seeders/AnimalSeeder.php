<?php

// database/seeders/AnimalSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Albergue;
use Faker\Factory as Faker;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $albergues = Albergue::all();

        foreach ($albergues as $albergue) {
            for ($i = 0; $i < 20; $i++) {
                Animal::create([
                    'nombre' => $faker->firstName,
                    'sexo' => $faker->randomElement(['Masculino', 'Femenino']),
                    'tamano' => $faker->randomElement(['Pequeño', 'Mediano', 'Grande']),
                    'foto' => $faker->imageUrl(640, 480, 'animals', true),
                    'edad' => $faker->numberBetween(1, 15) . ' años ' . $faker->numberBetween(0, 11) . ' meses',
                    'comentario' => $faker->sentence,
                    'estado_esterilizacion' => $faker->boolean,
                    'estado_chip' => $faker->boolean,
                    'estado_salud' => $faker->randomElement(['Buen estado', 'Caso Urgente']),
                    'estadoanimal' => $faker->randomElement(['Adopción', 'Adoptado']),
                    'fecha_registro' => $faker->date,
                    'especie' => $faker->randomElement(['Perro', 'Gato']),
                    'albergue_id' => $albergue->id,
                ]);
            }
        }
    }
}
