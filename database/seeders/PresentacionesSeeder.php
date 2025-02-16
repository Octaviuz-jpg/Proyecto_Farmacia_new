<?php

namespace Database\Seeders;

use App\Models\presentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    {
        $tiposPresentacion = [
            'Tableta',
            'Cápsula',
            'Jarabe',
            'Inyección',
            'Crema',
            'Pomada',
            'Supositorio',
            'Gotas',
            'Parche',
            'Inhalador',
            'Spray nasal',
            'Gel',
            'Solución',
            'Polvo',
            'Liofilizado',
            'Enema',
            'Implante',
            'Comprimido',
            'Suspensión',
            'Emulsión'
        ];

        foreach ($tiposPresentacion as $tipo) {
            presentacion::create([
                'tipo_presentacion' => $tipo,
            ]);
            } 
        }
    }
}