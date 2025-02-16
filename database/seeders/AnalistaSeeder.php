<?php

namespace Database\Seeders;

use App\Models\analista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $analista = new analista();
        $analista-> nombre = 'Octavio';
        $analista-> apellido =  'Malave';
        $analista->save();

        $analista = new analista();
        $analista-> nombre = 'Miguel';
        $analista-> apellido =  'Permia';
        $analista->save();
        $analista = new analista();
        $analista-> nombre = 'Raiza';
        $analista-> apellido =  'Rondon';
        $analista->save();

        $analista = new analista();
        $analista-> nombre = 'Sonic';
        $analista-> apellido =  'Theedgeddog';
        $analista->save();

    }
}
