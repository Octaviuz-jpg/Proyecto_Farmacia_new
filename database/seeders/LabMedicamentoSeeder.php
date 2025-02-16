<?php

namespace Database\Seeders;

use App\Models\lab_medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LabMedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $faker = Faker::create();
            
            // Suponemos que ya tienes laboratorios y medicamentos en tus tablas
            // Vamos a relacionar los laboratorios con sus medicamentos
            for ($i = 1; $i <= 20; $i++) { // Supongamos que tienes al menos 20 laboratorios y 20 medicamentos
                lab_medicamento::create([
                    'lab_id' => $faker->numberBetween(1 , 6), // ID del laboratorio
                    'medicamento_id' => $faker->numberBetween(41 , 60), // ID del medicamento
                ]);
            }
        }
    }
}
