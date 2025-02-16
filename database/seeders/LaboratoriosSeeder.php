<?php

namespace Database\Seeders;

use App\Models\laboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LaboratoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
    
        $faker = Faker::create();
        
        // Generar 20 registros de ejemplo para la tabla laboratorios
        for ($i = 0; $i < 6; $i++) {
            laboratorio::create([
                'nombre' => $faker->company,
                'direccion' => $faker->address,
                'telefono' => $faker->numerify('#######'), // Generar un número de teléfono opcional de 10 dígitos
            ]);
        }
    }
}
