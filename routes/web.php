<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', [UsuarioController::class, 'index'])
->name('usuarios.index');

Route::get('/usuarios/create', [UsuarioController::class, 'create'])
->name('usuarios.create');

Route::post('/usuarios', [UsuarioController::class, 'store'])
->name('usuarios.store');

Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])
->name('usuarios.edit');

Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])
    ->name('usuarios.update');

Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])
    ->name('usuarios.destroy');  

// Rutas para el registro de usuarios
Route::get('/registro', [AuthController::class, 'mostrarRegistro'])
    ->name('registro');

Route::post('/registro', [AuthController::class, 'registrar'])
    ->name('registro.procesar');

// Rutas para el inicio de sesión
Route::get('/login', [AuthController::class, 'mostrarLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.procesar');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

