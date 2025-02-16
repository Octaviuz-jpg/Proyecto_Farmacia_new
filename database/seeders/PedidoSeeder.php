<?php

namespace Database\Seeders;

use App\Models\pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $faker = Faker::create();
            
            // Generar 20 registros de ejemplo para la tabla pedido
            for ($i = 0; $i < 8; $i++) {
                pedido::create([
                    'analista_id' => $faker->numberBetween(21, 24), // ID del analista
                    'fecha_pedido' => $faker->dateTimeBetween('-1 year', 'now'), // Fecha de pedido aleatoria en el último año
                ]);
            }
        }
    }
}
