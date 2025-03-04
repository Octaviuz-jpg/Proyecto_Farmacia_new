<?php

namespace Database\Seeders;

use App\Models\stock_medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($sucursal_id = 1; $sucursal_id <= 5; $sucursal_id++) {
            for($i = 0; $i < 20; $i++) {
                // Crear una nueva instancia de stock_medicamento
                $stockmedicamento = new stock_medicamento();
        
                // Asignar un medicamento_id secuencial
                $stockmedicamento->medicamento_id = 41 + $i;
        
                // Asignar el ID de la sucursal
                $stockmedicamento->stock_id = $sucursal_id;
        
                // Asignar un valor para cantidad
                $stockmedicamento->cantidad = rand(1, 100); // Generar una cantidad aleatoria entre 1 y 100
        
                // Asignar un valor para precioVenta
                $stockmedicamento->precio = rand(10, 500); // Generar un precio de venta aleatorio entre 10 y 500
        
                // Guardar la instancia en la base de datos
                $stockmedicamento->save();
            }
        }
        
}   }
