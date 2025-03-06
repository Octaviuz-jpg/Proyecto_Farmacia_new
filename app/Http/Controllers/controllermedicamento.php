<?php

namespace App\Http\Controllers;

use App\Models\medicamento;
use App\Models\presentacion;
use Illuminate\Http\Request;

class controllermedicamento extends Controller
{
    public function listamedicamento(){
        $medicamentos = medicamento::with('monodrogas', 'presentaciones')->get();

        return view('medicamentos', compact('medicamentos'));

    }

    public function agregarMedicamentos(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'monodrogas' => 'nullable|string',
        'presentaciones' => 'nullable|string',
    ]);

    // Crear el medicamento
    $medicamento = Medicamento::create([
        'nombre' => $request->nombre,
        
    ]);

    // Asociar monodrogas
    if ($request->filled('monodrogas')) {
        $monodrogas = explode(',', $request->monodrogas); // Convertir IDs separados por comas en un array
        $medicamento->monodrogas()->attach($monodrogas);
    }

    // Asociar presentaciones
    if ($request->filled('presentaciones')) {
        $presentaciones = explode(',', $request->presentaciones); // Convertir IDs separados por comas en un array
        $medicamento->presentaciones()->attach($presentaciones);
    }

    return redirect()->back()->with('success', 'Medicamento creado con éxito.');
}

}
