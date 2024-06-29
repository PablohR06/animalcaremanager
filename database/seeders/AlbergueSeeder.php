<?php

// database/seeders/AlbergueSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Albergue;

class AlbergueSeeder extends Seeder
{
    public function run()
    {
        Albergue::create([
            'nombre' => 'Albergue 1',
            'direccion' => 'Dirección Albergue 1',
            'capacidad' => rand(50, 100),
            'telefono' => '123456789',
            'ciudad' => 'Ciudad 1',
            'encargado_id' => null,
        ]);

        Albergue::create([
            'nombre' => 'Albergue 2',
            'direccion' => 'Dirección Albergue 2',
            'capacidad' => rand(50, 100),
            'telefono' => '987654321',
            'ciudad' => 'Ciudad 2',
            'encargado_id' => null,
        ]);
    }
}
