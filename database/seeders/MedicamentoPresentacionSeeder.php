<?php

namespace Database\Seeders;

use App\Models\medicamento_presentacion;
use App\Models\medicamento_presentaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicamentoPresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    
        $faker = Faker::create();
        
        // Suponemos que ya tienes medicamentos y presentaciones en tus tablas
        // Vamos a relacionar los medicamentos con sus presentaciones
        for ($i = 1; $i <= 20; $i++) { // Supongamos que tienes al menos 20 medicamentos y 20 presentaciones
            medicamento_presentacion::create([
                'medicamentos_id' => $faker->numberBetween(41, 60), // ID del medicamento
                'presentacion_id' => $faker->numberBetween(1, 20), // ID de la presentación
            ]);
            }
        
   }
}