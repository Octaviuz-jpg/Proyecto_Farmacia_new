<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\analistaController;
use App\Http\Controllers\controllermedicamento;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pedidoController;
use App\Models\analista;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/administrador',[AdministradorController::class,'inicial']);

//Route:: get('/sucursal',[AdministradorController::class,'sedes']);

Route::get('/sucursal', [AdministradorController::class, 'sedes'])->name('sucursal');

Route::get('/personal', [AdministradorController::class,'persona'])->name('personal');

Route::get('/personal-ficha', [FichaController::class, 'listasTrabajadores'])->name('personal.ficha');

Route::get('/ficha-nombre',[FichaController::class, 'BuscarNombre'])->name('ficha-nombre');

Route::delete('/personal/{personal}', [AdministradorController::class, 'personalBorrar'])
     ->name('personal-borrar');

Route::post('/personal-agregar',[AdministradorController::class,'personalAgregar'])->name('personal-agregar');

Route::get('/sucursal-trabajador',[AdministradorController::class,'sucursalListaTrabajador'])->name('sucursal-trabajador');

Route::post("/sucursal-agregar",[AdministradorController::class, 'agregarSucursal'])->name('sucursal-agregar');

Route::get('/medicamentos', [controllermedicamento::class, 'listamedicamento'])->name('medicamentos');

Route::get('/laboratorios', [AdministradorController::class, 'laboratorios'])->name('laboratorios');

Route::post('/medicamento-agregar', [controllermedicamento::class, 'agregarMedicamentos'])->name('medicamento-agregar');

Route::delete('/quitar-medicamento', [controllermedicamento::class, "quitarMedicamento"])->name("quitar-medicamento");

Route::post('/agregar-laboratorio', [AdministradorController::class, 'agregarLaboratorios'])->name('agregar-laboratorio');

Route::delete('/laboratorio-eliminar', [AdministradorController::class, 'eliminarLaboratorio'])->name('laboratorio-eliminar');

Route::get('/stock-medicamentos',[AdministradorController::class, 'stockMedicamentos'])->name('stock-medicamentos');
Route::post('/buscar-medicamento', [AdministradorController::class, 'buscarMedicamento'])->name('buscar-medicamento');
Route::post('/buscar-stock-sucursal', [AdministradorController::class, 'Sucursalstock'])->name('buscar-stock-sucursal');
Route::get('/analistas', [analistaController::class, 'mostrarAnalista'])->name('analistas');

Route::post('/agregar-analista', [analistaController::class, 'agregarAnalista'])->name('agregar.analista');

Route::get('/pedidos-proveedor', [analistaController::class, 'mostrarPedidos'])->name('pedidos-proveedor');

Route::get('/pedido-formulario', [pedidoController::class, 'crearPedido'])->name('pedido-formulario');

// Rutas para tabla Pedido
// Route::get('/pedido/crear', [pedidoController::class, 'crearPedido'])->name('pedido-formulario');
Route::post('/pedido', [pedidoController::class, 'guardarPedido'])->name('pedido.guardar');

// Rutas para tabla PedidoProveedor
Route::get('/pedido-proveedor/{pedido_id}/crear', [pedidoController::class, 'crearPedidoProveedor'])->name('pedido_proveedor.crear');
Route::post('/pedido-proveedor', [pedidoController::class, 'guardarPedidoProveedor'])->name('pedido_proveedor.guardar');


