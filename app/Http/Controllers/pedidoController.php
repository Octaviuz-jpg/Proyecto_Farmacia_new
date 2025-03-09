<?php

namespace App\Http\Controllers;

use App\Models\analista;
use App\Models\laboratorio;
use App\Models\medicamento;
use App\Models\pedido;
use App\Models\pedido_proveedor;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    public function crearPedido()
    {
        // Obtén los analistas para mostrarlos en el formulario
        $analistas = analista::all();
        return view('formulario', compact('analistas'));
    }
    
    public function guardarPedido(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'analista_id' => 'required|exists:analista,analista_id',
            'fecha' => 'required|date',
        ]);
    
        // Crear el nuevo pedido
        $pedido = pedido::create([
            'analista_id' => $request->input('analista_id'),
            'fecha_pedido' => $request->input('fecha'),
        ]);
    
        // Redirigir al formulario de `pedido_proveedor` con el ID del nuevo pedido
        return redirect()->route('pedido_proveedor.crear', ['pedido_id' => $pedido->pedido_id]);
    }
    

    public function crearPedidoProveedor($pedido_id)
    {
        // Obtener los laboratorios y medicamentos para mostrarlos en el formulario
        $laboratorios = laboratorio::all();
        $medicamentos = medicamento::all();
        $pedido = pedido::findOrFail($pedido_id); // Obtener el pedido relacionado
        return view('pedidos_proveedor_crear', compact('laboratorios', 'medicamentos', 'pedido'));
    }
      
    public function guardarPedidoProveedor(Request $request)
    {
        // dd($request->all());
        // Validar los datos enviados
        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,lab_id',
            'pedido_id' => 'required|exists:pedido,pedido_id', 
            'medicamento_id' => 'required|exists:medicamentos,medicamentos_id',
            'cantidad' => 'required|integer|min:1',
        ]);
    
        // Crear un nuevo registro en `pedido_proveedor`
        pedido_proveedor::create([
            'laboratorio_id' => $request->input('laboratorio_id'),
            'pedido_id' => $request->input('pedido_id'),
            'medicamento_id' => $request->input('medicamento_id'),
            'cantidad' => $request->input('cantidad'),
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('pedidos-proveedor');

    }


}
