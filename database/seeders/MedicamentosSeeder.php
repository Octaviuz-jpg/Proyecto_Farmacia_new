<?php

namespace Database\Seeders;

use App\Models\medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$faker = Faker::create();
        
        // Datos de ejemplo para poblar la tabla medicamentos con nombres aleatorios
        $medicamentos = [
            ['nombre' => 'Dynafloxen Ultra Relief', 'generico' => true],
            ['nombre' => 'Virafix Rapid Cure', 'generico' => false],
            ['nombre' => 'Prolixan Health Boost', 'generico' => true],
            ['nombre' => 'Xyloflam Strong Defense', 'generico' => false],
            ['nombre' => 'Ultramedic Quick Relief', 'generico' => true],
            ['nombre' => 'Nexagen Total Care', 'generico' => false],
            ['nombre' => 'Solutab Maximum Strength', 'generico' => true],
            ['nombre' => 'Painex Fast Action', 'generico' => false],
            ['nombre' => 'Zenaflor Complete Health', 'generico' => true],
            ['nombre' => 'Immunix Advanced Guard', 'generico' => false],
            ['nombre' => 'Lumitrex Night Relief', 'generico' => true],
            ['nombre' => 'Inhalex Pure Breathe', 'generico' => false],
            ['nombre' => 'Fortidex Energy Boost', 'generico' => true],
            ['nombre' => 'Cardiomed Heart Health', 'generico' => false],
            ['nombre' => 'Relaxan Calm Formula', 'generico' => true],
            ['nombre' => 'Securin Daily Guard', 'generico' => false],
            ['nombre' => 'VitaPlus Complete Care', 'generico' => true],
            ['nombre' => 'Optimed Immune Support', 'generico' => false],
            ['nombre' => 'Relipure Pain Relief', 'generico' => true],
            ['nombre' => 'Zynaflex Muscle Relax', 'generico' => false],
        ];

        // Insertar los datos en la tabla medicamentos
        foreach ($medicamentos as $medicamento) {
            Medicamento::create($medicamento);
        }
    }
}
