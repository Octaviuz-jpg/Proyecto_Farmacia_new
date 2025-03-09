<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\pedido_proveedor;
use Illuminate\Http\Request;

class comprasController extends Controller
{
    public function comprasmostrar(){

        $compras = compra::all();


        return view('comprasMostrar', compact('compras'));

    }

    public function crearCompra()
    {
    $pedidos = pedido_proveedor::all(); // Recupera todos los pedidos proveedores
    return view('comprasFormulario', compact('pedidos')); // Envía los datos a la vista
    }



    public function guardarCompra(Request $request)
{
    // Validar los datos enviados
    $request->validate([
        'pedido_proveedor_id' => 'required|integer|exists:pedido_proveedor,pedido_proveedor_id',
        'forma_pago' => 'required|string|max:255',
        'tiempo_llegada' => 'required|date',
        'fecha_pago' => 'required|date',
        'estado_pago' => 'required|string|max:255',
    ]);

    // Verificar si el pedido_proveedor_id ya existe en la tabla de compras
    $existeCompra = compra::where('pedido_proveedor_id', $request->input('pedido_proveedor_id'))->exists();

    if ($existeCompra) {
        // Redirigir con un mensaje de error
        return redirect()->back()->with('error', 'El pedido ya tiene una compra asociada.');
    }

    // Guardar los datos en la tabla compras
    Compra::create([
        'pedido_proveedor_id' => $request->input('pedido_proveedor_id'),
        'forma_pago' => $request->input('forma_pago'),
        'tiempo_llegada' => $request->input('tiempo_llegada'),
        'fecha_pago' => $request->input('fecha_pago'),
        'estado_pago' => $request->input('estado_pago'),
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('compras-mostrar')->with('success', 'Compra registrada correctamente.');
}

}

    


