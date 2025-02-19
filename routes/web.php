<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/login', [LoginController::class, 'index']);

Route::get('/personal', [PersonalController::class, 'index']);
