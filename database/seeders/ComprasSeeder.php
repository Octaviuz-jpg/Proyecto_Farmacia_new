<?php

namespace Database\Seeders;

use App\Models\compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
        {
            $faker = Faker::create();
            
            // Suponemos que ya tienes pedidos de proveedores en tus tablas
            // Generar 20 registros de ejemplo para la tabla compras
            for ($i = 0; $i < 8; $i++) {
                compra::create([
                    'pedido_proveedor_id' => $faker->numberBetween(1, 6), // ID del pedido_proveedor
                    'forma_pago' => $faker->randomElement(['contado', '15d', '30d']),
                    'fecha_pago' => $faker->dateTimeBetween('-1 year', 'now'),
                    'estado_pago' => $faker->boolean,
                ]);
            }
    }
}
