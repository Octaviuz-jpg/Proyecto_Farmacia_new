<?php

namespace Database\Seeders;

use App\Models\stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stock = new stock();
        $stock ->sucursal_id= '1';
        $stock->save();

        $stock = new stock();
        $stock ->sucursal_id= '2';
        $stock->save();

        $stock = new stock();
        $stock ->sucursal_id= '3';
        $stock->save();

        $stock = new stock();
        $stock ->sucursal_id= '4';
        $stock->save();

        $stock = new stock();
        $stock ->sucursal_id= '5';
        $stock->save();

    }
}
