<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/administrador',[AdministradorController::class,'inicial']);

Route:: get('/sucursal',[AdministradorController::class,'sedes']);

Route::get('/personal', [AdministradorController::class,'persona']);

Route::get('/personal-ficha', [FichaController::class, 'listasTrabajadores'])->name('personal.ficha');

Route::get('/ficha-nombre',[FichaController::class, 'BuscarNombre'])->name('ficha-nombre');

Route::delete('/personal/{id}', [AdministradorController::class, 'personalBorrar'])->name('personal-borrar');

Route::post('/personal-agregar',[AdministradorController::class,'personalAgregar'])->name('personal-agregar');

Route::get('/sucursal-trabajador',[AdministradorController::class,'sucursalListaTrabajador'])->name('sucursal-trabajador');

Route::post("/sucursal-agregar",[AdministradorController::class, 'agregarSucursal'])->name('sucursal-agregar');