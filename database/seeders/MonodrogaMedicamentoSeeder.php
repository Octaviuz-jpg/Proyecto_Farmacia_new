<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicamento;
use App\Models\Monodroga;

class MonodrogaMedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los medicamentos y monodrogas disponibles
        $medicamentos = Medicamento::all();
        $monodrogas = Monodroga::pluck('monodroga_id')->toArray(); // IDs de todas las monodrogas

        // Verifica que haya registros en ambas tablas
        if ($medicamentos->isEmpty() || empty($monodrogas)) {
            $this->command->info('No hay medicamentos o monodrogas en las tablas. Asegúrate de poblarlos primero.');
            return;
        }

        foreach ($medicamentos as $medicamento) {
            // Selecciona entre 1 y 3 monodrogas aleatorias
            $monodrogasAleatorias = collect($monodrogas)->random(rand(1, 3));

            foreach ($monodrogasAleatorias as $monodrogaId) {
                // Especificar la tabla para evitar ambigüedad
                if (!$medicamento->monodrogas()->where('monodroga.monodroga_id', $monodrogaId)->exists()) {
                    $medicamento->monodrogas()->attach($monodrogaId);
                }
            }
        }

        $this->command->info('Relaciones consistentes entre medicamentos y monodrogas creadas con éxito.');
    }
}
