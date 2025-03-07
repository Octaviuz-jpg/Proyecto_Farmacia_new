<?php

namespace App\Http\Controllers;

use App\Models\medicamento;
use App\Models\presentacion;
use Illuminate\Http\Request;

class controllermedicamento extends Controller
{
    public function listamedicamento(){
        $medicamentos = medicamento::with('monodrogas', 'presentaciones','laboratorios')->get();

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

    // Asociar laboratorios
    if ($request->filled('laboratorios')) {
        $laboratorios = explode(',', $request->laboratorios); // Convertir IDs en array
        $medicamento->laboratorios()->attach($laboratorios);
    }
    return redirect()->back()->with('success', 'Medicamento creado con éxito.');
}
    public function quitarMedicamento(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'medicamentos_id' => 'required|integer',
    ]);

    // Obtener el medicamento por su ID
    $medicamento = medicamento::findOrFail($request->medicamentos_id);

    // Quitar asociaciones con monodrogas
    $medicamento->monodrogas()->detach();

    // Quitar asociaciones con presentaciones
    $medicamento->presentaciones()->detach();

    // (Opcional) Eliminar el medicamento si es necesario
    $medicamento->delete();

    return redirect()->back()->with('success', 'Medicamento y relaciones eliminados con éxito.');
}



}
