<?php

namespace App\Http\Controllers;
use App\Models\Personal;

use Illuminate\Http\Request;

class FichaController extends Controller
{
    

public function listasTrabajadores()
{
    $trabajadores = Personal::with(['cargos', 'sucursales'])->get();

    return view('TodaFicha', compact('trabajadores'));
}
public function BuscarNombre(Request $request){

    $request->validate([
        'query'=> 'required|string|max:255',
    ]);

    $resultados = Personal::where('nombre', 'LIKE', '%' . $request->input('query') . '%')
    ->with(['cargos', 'sucursales'])->get();

    foreach ($resultados as $trabajador) {
        foreach ($trabajador->sucursales as $sucursal) {
            $fechaEntrada = $sucursal->pivot->fecha_entrada; // Fecha de entrada
            $fechaSalida = $sucursal->pivot->fecha_salida;   // Fecha de salida
        }
    }
    
    return view('resultadosfichanombre',compact('resultados'));
} 


}