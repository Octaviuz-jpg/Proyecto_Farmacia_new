<?php

namespace Database\Seeders;

use App\Models\monodroga;
use App\Models\monodroga_medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MonodrogaMedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Suponemos que ya tienes medicamentos y monodrogas en tus tablas
        // Vamos a relacionar los medicamentos con sus monodrogas
        for ($i = 1; $i <= 20; $i++) { // Supongamos que tienes al menos 20 medicamentos y 20 monodrogas
            monodroga_medicamento::create([
                'medicamentos_id' => $faker->numberBetween(41, 60), // ID del medicamento
                'monodroga_id' => $faker->numberBetween(81, 100), // ID de la monodroga
            ]);
        }
    }
}
