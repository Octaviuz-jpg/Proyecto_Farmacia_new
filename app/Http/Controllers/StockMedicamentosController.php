<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockMedicamentosController extends Controller
{
    public function obtenerStock()
    {
        // Consulta a la base de datos para obtener todos los registros de la tabla "stock"
        $stock = DB::table('stock')->select('stock_id', 'sucursal_id')->get();

        // Retorna la respuesta en formato JSON
        return response()->json([
            'success' => true,
            'data' => $stock
        ]);
    }
     public function obtenerSucursales()
    {
        // Obtén todas las sucursales con sus id y ubicación
        $sucursales = DB::table('sucursal')
            ->select('sucursal_id', 'ubicacion')
            ->get();

        // Retorna la vista con las sucursales
        return view('stocksucursales', ['sucursales' => $sucursales]);
    }

    public function obtenerStockMedicamentoPorId($id)
{
    // Consulta a la tabla "stock_medicamento" uniendo con "stock", "sucursal" y "medicamentos"
    $stockMedicamento = DB::table('stock_medicamento')
        ->join('stock', 'stock_medicamento.stock_id', '=', 'stock.stock_id') // Une con la tabla "stock"
        ->join('sucursal', 'stock.sucursal_id', '=', 'sucursal.sucursal_id') // Une con la tabla "sucursal"
        ->join('medicamentos', 'stock_medicamento.medicamento_id', '=', 'medicamentos.medicamentos_id') // Usa medicamentos_id en la unión
        ->select(
            'stock_medicamento.stock_medicamento',
            'medicamentos.nombre as medicamento_nombre', // Obtiene el nombre del medicamento
            'stock_medicamento.stock_id',
            'stock_medicamento.precio',
            'stock_medicamento.cantidad',
            'sucursal.ubicacion as sucursal_ubicacion' // Obtiene la ubicación de la sucursal
        )
        ->where('stock_medicamento.stock_id', $id) // Filtra por el stock_id proporcionado
        ->get(); // Obtiene todos los registros coincidentes

    // Verifica si se encontraron registros
    if ($stockMedicamento->isEmpty()) {
        return view('error', [
            'message' => "No se encontraron registros para el stock_id proporcionado: $id"
        ]); // Retorna una vista de error si no se encuentran resultados
    }

    // Retorna la vista con los registros
    return view('stockmedicamentosucursal', ['data' => $stockMedicamento]);
}


}
