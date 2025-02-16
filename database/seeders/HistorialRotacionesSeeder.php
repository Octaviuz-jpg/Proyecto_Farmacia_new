<?php

namespace Database\Seeders;

use App\Models\historial_rotacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HistorialRotacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Generar 20 registros de ejemplo para la tabla historial_rotaciones
        for ($i = 0; $i < 20; $i++) {
            $fecha_entrada = $faker->dateTimeBetween('-3 years', '-1 year');
            $fecha_salida = $faker->boolean(70) ? $faker->dateTimeBetween($fecha_entrada, 'now') : null; // 70% de los registros tendrán fecha de salida

            historial_rotacion::create([
                'personal_id' => $faker->numberBetween(1, 20), // Suponiendo que hay 20 personales diferentes
                'sucursal_id' => $faker->numberBetween(1, 5), // Suponiendo que hay 10 sucursales diferentes
                'fecha_entrada' => $fecha_entrada,
                'fecha_salida' => $fecha_salida,
            ]);
        }
    }
}
