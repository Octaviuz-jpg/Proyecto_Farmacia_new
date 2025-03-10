<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresopersonalController extends Controller
{
    // Listar todos los registros de la tabla ingreso_personal
    public function index()
    {
        try {
            // Realiza un JOIN para obtener el nombre del personal
            $ingresos = DB::table('ingreso_personal')
                ->join('personal', 'ingreso_personal.personal_id', '=', 'personal.personal_id') // Relación entre ambas tablas
                ->select(
                    'ingreso_personal.ingreso_id',
                    'personal.nombre as nombre_personal', // Obtén el nombre del personal
                    'ingreso_personal.fecha_entrada',
                    'ingreso_personal.fecha_salida'
                )
                ->get();
    
            // Envía los datos a la vista
            return view('ingreso_personal_index', compact('ingresos'));
        } catch (\Exception $e) {
            // Envía el error a la vista con un mensaje
            return view('ingreso_personal_index', ['error' => 'Ocurrió un error: ' . $e->getMessage()]);
        }
    }
    
    public function registro()
    {
        try {
            // Obtener todos los registros de la tabla 'personal'
            $personals = DB::table('personal')->get();
    
            // Cargar la vista con los datos de personal
            return view('ingreso_personalform', compact('personals'));
        } catch (\Exception $e) {
            // Manejar errores y mostrar mensaje en la vista
            return view('ingreso_personalform', ['error' => 'Ocurrió un error: ' . $e->getMessage()]);
        }
    }
    
    public function store(Request $request)
    {
        try {
            // Validar los datos
            $validatedData = $request->validate([
                'personal_id' => 'required|integer',
                'fecha_entrada' => 'required|date',
                'fecha_salida' => 'nullable|date|after_or_equal:fecha_entrada',
            ]);
    
            // Insertar el registro sin 'created_at' y 'updated_at'
            DB::table('ingreso_personal')->insert([
                'personal_id' => $validatedData['personal_id'],
                'fecha_entrada' => $validatedData['fecha_entrada'],
                'fecha_salida' => $validatedData['fecha_salida'],
            ]);
    
            // Flash message de éxito
            return redirect()->back()->with('success', 'Registro creado exitosamente.');
        } catch (\Exception $e) {
            // Flash message de error
            return redirect()->back()->with('error', 'Ocurrió un error: ' . $e->getMessage());
        }
    }


}
