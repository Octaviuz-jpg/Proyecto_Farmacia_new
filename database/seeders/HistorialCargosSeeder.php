<?php

namespace Database\Seeders;

use App\Models\historial_cargos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HistorialCargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generar datos para 20 personales diferentes
        for ($personal_id = 1; $personal_id <= 20; $personal_id++) {
            // Inicializar la fecha de inicio
            $tiempo_inicio = $faker->dateTimeBetween('-5 years', '-4 years');

            // Generar 2 cargos para cada personal con fechas lógicas
            for ($i = 0; $i < 2; $i++) {
                $tiempo_final = $faker->dateTimeBetween($tiempo_inicio, $tiempo_inicio->format('Y-m-d').' +1 year');

                historial_cargos::create([
                    'cargo_id' => $faker->numberBetween(1, 4), // Suponiendo que hay 10 cargos diferentes
                    'personal_id' => $personal_id,
                    'descripcion' => NULL,
                    'tiempo_inicio' => $tiempo_inicio,
                    'tiempo_final' => $tiempo_final,
                ]);

                // Actualizar la fecha de inicio para el próximo cargo
                $tiempo_inicio = $faker->dateTimeBetween($tiempo_final, $tiempo_final->format('Y-m-d').' +1 year');
            }
        
    }
}
}