<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Generar 20 registros de ejemplo para la tabla personal
        for ($i = 0; $i < 20; $i++) {
            Personal::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'edad' => $faker->numberBetween(18, 65),
                'correo' => $faker->unique()->safeEmail,
                'telefono' => $faker->numerify('#######'),
            ]);
        }
    }
}
