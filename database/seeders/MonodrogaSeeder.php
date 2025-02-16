<?php

namespace Database\Seeders;

use App\Models\monodroga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonodrogaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monodrogas = [
            ['tipo_monodroga' => 'Paracetamol', 'descripcion' => 'Analgésico y antipirético'],
            ['tipo_monodroga' => 'Ibuprofeno', 'descripcion' => 'Anti-inflamatorio no esteroide'],
            ['tipo_monodroga' => 'Aspirina', 'descripcion' => 'Anti-inflamatorio, analgésico y antipirético'],
            ['tipo_monodroga' => 'Amoxicilina', 'descripcion' => 'Antibiótico de amplio espectro'],
            ['tipo_monodroga' => 'Diclofenaco', 'descripcion' => 'Anti-inflamatorio no esteroide'],
            ['tipo_monodroga' => 'Loratadina', 'descripcion' => 'Antihistamínico'],
            ['tipo_monodroga' => 'Metformina', 'descripcion' => 'Antidiabético oral'],
            ['tipo_monodroga' => 'Omeprazol', 'descripcion' => 'Inhibidor de la bomba de protones'],
            ['tipo_monodroga' => 'Ciprofloxacina', 'descripcion' => 'Antibiótico'],
            ['tipo_monodroga' => 'Clonazepam', 'descripcion' => 'Ansiolítico'],
            ['tipo_monodroga' => 'Fluoxetina', 'descripcion' => 'Antidepresivo'],
            ['tipo_monodroga' => 'Amlodipino', 'descripcion' => 'Antihipertensivo'],
            ['tipo_monodroga' => 'Simvastatina', 'descripcion' => 'Reductor del colesterol'],
            ['tipo_monodroga' => 'Tramadol', 'descripcion' => 'Analgésico'],
            ['tipo_monodroga' => 'Lorazepam', 'descripcion' => 'Ansiolítico'],
            ['tipo_monodroga' => 'Ketorolaco', 'descripcion' => 'Anti-inflamatorio no esteroide'],
            ['tipo_monodroga' => 'Enalapril', 'descripcion' => 'Antihipertensivo'],
            ['tipo_monodroga' => 'Prednisona', 'descripcion' => 'Corticosteroide'],
            ['tipo_monodroga' => 'Acetaminofén', 'descripcion' => 'Analgésico y antipirético'],
            ['tipo_monodroga' => 'Azitromicina', 'descripcion' => 'Antibiótico de amplio espectro'],
        ];

        // Insertar los datos en la tabla monodroga
        foreach ($monodrogas as $monodroga) {
           monodroga::create($monodroga);
        }
    }
}
