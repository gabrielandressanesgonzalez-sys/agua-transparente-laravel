<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;

// Endpoint para registrar usuarios
Route::post('/registro', [AuthApiController::class, 'registrar']);

// Endpoint para autenticar usuarios
Route::post('/login', [AuthApiController::class, 'login']);

// Endpoint para consultar usuarios registrados
Route::get('/usuarios', [AuthApiController::class, 'usuarios']);