<?php

namespace Database\Seeders;

use App\Models\pedido_proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PedidoProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        
           $faker = Faker::create();
    
            // Suponemos que ya tienes laboratorios, pedidos y medicamentos en tus tablas
            // Vamos a relacionar los laboratorios con sus pedidos y medicamentos
            for ($i = 1; $i <= 6; $i++) { // Supongamos que tienes al menos 20 laboratorios, pedidos y medicamentos
                pedido_proveedor::create([
                    'laboratorio_id' => $faker->numberBetween(1, 6), // ID del laboratorio
                    'pedido_id' => $faker->numberBetween(2, 8), // ID del pedido
                    'medicamento_id' => $faker->numberBetween(41, 60), // ID del medicamento
                    'cantidad' => $faker->numberBetween(1, 30), // Cantidad aleatoria
                ]);
            }
        }
}
