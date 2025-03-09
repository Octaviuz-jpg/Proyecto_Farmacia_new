<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Models;
use App\Models\Sucursal;
use App\Models\Cargo;
use App\Models\Personal;
use App\Models\historial_cargos;
use App\Models\historial_rotaciones;
use App\Models\laboratorio;
use App\Models\medicamento;
use App\Models\pedido_proveedor;
use App\Models\stock;
use App\Models\stock_medicamento;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

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
        $cargos = Cargo::all();
        $sucursales = Sucursal::all();
        return view('personal', compact('personal','cargos','sucursales'));

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
            'cargo_id' => 'required|exists:cargos,cargo_id', // Nueva validación
            'tiempo_inicio' => 'required|date', // Nueva validación
            'sucursal_id' => 'required|exists:sucursal,sucursal_id',
            'fecha_entrada' => 'required|date'
        ]);

        $fechaConHora = \Carbon\Carbon::parse($request->tiempo_inicio)
            ->setTime(now()->hour, now()->minute, now()->second);
        $personal = Personal::create($request->all());

        // Registrar el cargo en el historial
        $personal->cargos()->attach($request->cargo_id, [
            'tiempo_inicio' => $fechaConHora,
            'tiempo_final' => null
        ]);

        // Registrar la sucursal
    $personal->sucursales()->attach($request->sucursal_id, [
        'fecha_entrada' => \Carbon\Carbon::parse($request->fecha_entrada)
            ->setTime(now()->hour, now()->minute, now()->second),
        'fecha_salida' => null
    ]);

        return redirect()->route('personal')->with('success', 'Personal Agregado con exito');
    }


    //public function sucursalListaTrabajador(Request $request)
    //{
    //    $sucursalId = $request->input('sucursal_id');

    //    // Consulta a la tabla intermedia para verificar `fecha_de_salida`
    //    $trabajadores = Personal::whereHas('sucursales', function ($query) use ($sucursalId) {
    //        $query->where('historial_rotaciones.sucursal_id', $sucursalId)
    //            ->where('historial_rotaciones.fecha_salida', '0000-00-00 00:00:00'); // Busca "0000-00-00 00:00:00"
    //    })->get();


    //    // Retorna la vista con los trabajadores filtrados
    //    return view('sucursaltrabajador', compact('trabajadores'));
    //}

    public function sucursalListaTrabajador(Request $request)
{
    $request->validate([
        'sucursal_id' => 'required|exists:sucursal,sucursal_id'
    ]);

    $sucursalId = $request->input('sucursal_id');

    $trabajadores = Personal::whereHas('sucursales', function ($query) use ($sucursalId) {
        $query->where('historial_rotaciones.sucursal_id', $sucursalId)
              ->whereNull('fecha_salida');
    })->with(['sucursales' => function($q) use ($sucursalId) {
        $q->wherePivot('sucursal_id', $sucursalId); // Cambio clave aquí
    }])->get();

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

        return redirect()->route('sucursal')->with('success', '¡Sucursal agregada exitosamente!');
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

        return redirect()->route('laboratorios')->with('success', 'laboratorio agregada exitosamente!');
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

public function stockMedicamentos()
{
    $stockMedicamentos = stock_medicamento::with('stock.sucursal', 'medicamento')->get();
    return view('stockmedicamentos', compact('stockMedicamentos'));
}

public function buscarMedicamento(Request $request)
{
    $request->validate([
        'medicamento_id' => 'required|integer',
    ]);


    $medicamento = Medicamento::with('stocks')->find($request->input('medicamento_id'));


        return view('medicamento-detalles', compact('medicamento'));

}

public function SucursalStock(Request $request)
{
    $request->validate([
        'sucursal_id' => 'required|integer',
    ]);

    // Carga la sucursal con su stock y medicamentos
    $sucursal = Sucursal::with('stock.medicamentos')->find($request->input('sucursal_id'));

    // Validar si la sucursal existe y tiene un stock asociado
    if (!$sucursal || !$sucursal->stock) {
        return back()->with('error', 'La sucursal no tiene un stock asociado o no existe.');
    }

    return view('sucursal-stock', compact('sucursal'));
}



public function generarPedidoProveedorPDF(Request $request)
{
          // Validar que el ID esté presente y sea válido
    $request->validate([
        'id' => 'required|integer|exists:pedido_proveedor,pedido_proveedor_id',
    ]);
    // Buscar el pedido_proveedor con sus compras asociadas
    $pedidoProveedor = pedido_proveedor::with('compras','medicamentos','laboratorios')->findOrFail($request->id);

    // Renderizar la vista y generar el PDF
    $pdf = FacadePdf::loadView('PDFcompras_pedidos', compact('pedidoProveedor'));

    // Descargar el archivo PDF
    return $pdf->download('pedido_proveedor_' . $pedidoProveedor->id . '_compras.pdf');
}





}
