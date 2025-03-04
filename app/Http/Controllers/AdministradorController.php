<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Sucursal;
use App\Models\Cargo;
use App\Models\Personal;




class AdministradorController extends Controller
{
    public function inicial(){

   return view("administrador");
    }

    public function sedes()
    {
        // Extraer todos los usuarios de la tabla 'users'
        $sucursales = Sucursal::all();
        // Retornar la vista "sucursal" con los datos
        return view("sucursal", ['sucursales' => $sucursales]);

    }

    public function persona(){

        $personal = Personal::all();
        return view('personal', compact('personal'));

    }

    public function personalBorrar($id)
    {
        // Encuentra al trabajador por su ID
        $personal = Personal::findOrFail($id);

        // Elimina al trabajador
        $personal->delete();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Trabajador eliminado correctamente.');
    }

    public function personalAgregar(Request $request){
        

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'correo' => 'required|email|unique:personal',
            'telefono' => 'required|integer',
        ]);

    try {
        Personal::create($validatedData);

        return redirect()->back()->with('success', '¡Persona agregada con éxito!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un problema: ' . $e->getMessage());
    

    }
}
}

