<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/administrador',[AdministradorController::class,'inicial']);

Route:: get('/sucursal',[AdministradorController::class,'sedes']);

Route::get('/personal', [AdministradorController::class,'persona']);
