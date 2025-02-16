<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargo = new Cargo();
        $cargo-> cargo = 'administrativo';
        $cargo->save();

        $cargo = new Cargo();
        $cargo-> cargo = 'farmaceutico';
        $cargo->save();

        $cargo = new Cargo();
        $cargo-> cargo = 'pasante';
        $cargo->save();

        $cargo = new Cargo();
        $cargo-> cargo = 'auxilar de farmacia';
        $cargo->save();


    }
}
