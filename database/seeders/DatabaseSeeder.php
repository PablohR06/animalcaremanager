<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(AlbergueSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(InsumoSeeder::class);
        $this->call(DonacionSeeder::class);
        $this->call(AdopcionSeeder::class);
        $this->call(SeguimientoSeeder::class);

    }
}


