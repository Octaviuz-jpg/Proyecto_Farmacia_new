<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Models;
use App\Models\Sucursal;
use App\Models\Cargo;
use App\Models\Personal;
use App\Models\historial_cargos;
use App\Models\laboratorio;

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

    #public function personalBorrar($id)
    #{
    #    // Encuentra al trabajador por su ID
    #    $personal = Personal::findOrFail($id);

    #    // Elimina al trabajador
    #    $personal->delete();

    #    // Redirige con un mensaje de éxito
    #    return redirect()->back()->with('success', 'Trabajador eliminado correctamente.');
    #}

    public function personalBorrar(Personal $personal) {
        $personal->delete();
        return back()->with('success', 'Registro eliminado');
    }

    # public function personalAgregar(Request $request){
    #     $personal = new Personal();

    #     $personal->nombre = $request->nombre;
    #     $personal->apellido = $request->apellido;
    #     $personal->edad = $request->edad;
    #     $personal->correo = $request->correo;
    #     $personal->telefono = $request->telefono;

    #     $personal->save();

    #     return redirect('/personal');
    # }

    public function personalAgregar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'correo' => 'required|email|unique:personal',
            'telefono' => 'required|integer',
        ]);

        Personal::create($request->all());

        return redirect()->route('personal-agregar')->with('success', 'Personal Agregado con exito');

    }


    public function sucursalListaTrabajador(Request $request)
    {
        $sucursalId = $request->input('sucursal_id');

        // Consulta a la tabla intermedia para verificar `fecha_de_salida`
        $trabajadores = Personal::whereHas('sucursales', function ($query) use ($sucursalId) {
            $query->where('historial_rotaciones.sucursal_id', $sucursalId)
                ->where('historial_rotaciones.fecha_salida', '0000-00-00 00:00:00'); // Busca "0000-00-00 00:00:00"
        })->get();


        // Retorna la vista con los trabajadores filtrados
        return view('sucursaltrabajador', compact('trabajadores'));
    }

    public function agregarSucursal(Request $request) {
        $request->validate([

            'ubicacion' => 'nullable|string|max:255',
            'numerodetlf' => 'nullable|string|max:15',
        ]);

        Sucursal::create([

            'ubicacion' => $request->input('ubicacion'),
            'numerodetlf' => $request->input('telefono'),
        ]);

        return redirect()->route('sucursal-agregar')->with('success', '¡Sucursal agregada exitosamente!');
    }

    public function laboratorios(){

        $lab = laboratorio::all();

        return view('laboratorios', compact('lab'));
    }

    public function agregarLaboratorios(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|int'

        ]);

        laboratorio::create([

            'nombre' => $request->input('nombre'),
            'direccion' =>$request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        return redirect()->route('agregar-laboratorio')->with('success', 'laboratorio agregada exitosamente!');
    }


    public function eliminarLaboratorio(Request $request)
{
    // Validar los datos del formulario
    // Validar que el ID sea un entero y que exista en la base de datos
    $request->validate([
        'lab_id' => 'required|integer|exists:laboratorios,lab_id',
    ]);

    // Obtener el laboratorio y eliminarlo
    $laboratorio = laboratorio::findOrFail($request->lab_id);
    $laboratorio->delete();

    // Redirige con un mensaje de éxito
    return redirect()->back()->with('success', 'Laboratorio eliminado exitosamente!');
}


}
