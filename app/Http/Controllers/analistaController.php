<?php


namespace App\Http\Controllers;

use App\Models\analista;
use App\Models\pedido_proveedor;
use App\Models\Personal;
use Illuminate\Http\Request;

class analistaController extends Controller{

    public function mostrarAnalista(){

        $analista = analista::all();

        return view('analista', compact('analista'));


    }

    public function agregarAnalista(Request $request)
{
    // Validar los datos de entrada
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
    ]);

    // Crear un nuevo analista
    $analista = new Analista();
    $analista->nombre = $request->input('nombre');
    $analista->apellido = $request->input('apellido');
    $analista->save();

    // Redirigir con un mensaje de éxito
    return back()->with('success', 'Analista agregado correctamente.');
}

public function mostrarPedidos(){

    $pedido= pedido_proveedor::all();

    return view('pedidomostrar', compact('pedido'));
}

}