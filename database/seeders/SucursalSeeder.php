<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sucursal = new Sucursal();
        $sucursal-> ubicacion = 'unare';
        $sucursal-> numerodetlf ='041579523';
        $sucursal->save();

        $sucursal = new Sucursal();
        $sucursal-> ubicacion = 'manoa';
        $sucursal-> numerodetlf ='041579523';
        $sucursal->save();

        $sucursal = new Sucursal();
        $sucursal-> ubicacion = 'unare II';
        $sucursal-> numerodetlf ='23423423';
        $sucursal-> save();

        $sucursal = new Sucursal();
        $sucursal-> ubicacion = 'san felix';
        $sucursal-> numerodetlf ='32423455';
        $sucursal->save();

       
        
        $sucursal = new Sucursal();
        $sucursal-> ubicacion = 'vice city';
        $sucursal-> numerodetlf ='041232344';
        $sucursal->save();

    }
}
