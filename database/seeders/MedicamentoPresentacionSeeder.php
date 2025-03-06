<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicamento;
use App\Models\Presentacion;
use Illuminate\Support\Facades\DB;

class MedicamentoPresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los IDs de medicamentos y presentaciones existentes
        $medicamentos = Medicamento::pluck('medicamentos_id')->toArray(); // IDs de medicamentos
        $presentaciones = Presentacion::pluck('presentacion_id')->toArray(); // IDs de presentaciones

        // Verifica que ambas tablas no estén vacías
        if (empty($medicamentos) || empty($presentaciones)) {
            $this->command->info('No hay medicamentos o presentaciones en las tablas. Asegúrate de poblarlos primero.');
            return;
        }

        // Asignar al menos 1 y máximo 3 presentaciones a cada medicamento
        foreach ($medicamentos as $medicamentoId) {
            // Seleccionar entre 1 y 3 presentaciones aleatorias
            $presentacionesAleatorias = collect($presentaciones)->random(rand(1, 3));

            foreach ($presentacionesAleatorias as $presentacionId) {
                // Crear la relación en la tabla pivote
                DB::table('medicamento_presentaciones')->insert([
                    'medicamentos_id' => $medicamentoId,
                    'presentacion_id' => $presentacionId,
                ]);
            }
        }

        $this->command->info('Relaciones entre medicamentos y presentaciones generadas con éxito.');
    }
}
