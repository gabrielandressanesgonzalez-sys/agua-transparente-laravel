<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    // Endpoint para registrar un nuevo usuario mediante la API
    public function registrar(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Crear el usuario y proteger su contraseña mediante Hash
        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        return response()->json([
            'mensaje' => 'Usuario registrado correctamente.',
            'usuario' => $usuario
        ], 201);
    }

    // Endpoint para autenticar un usuario mediante la API
    public function login(Request $request)
    {
        $datos = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar el usuario por correo electrónico
        $usuario = User::where('email', $datos['email'])->first();

        // Verificar que el usuario exista y que la contraseña sea correcta
        if (!$usuario || !Hash::check($datos['password'], $usuario->password)) {
            return response()->json([
                'mensaje' => 'Error de autenticación: usuario o contraseña incorrectos.'
            ], 401);
        }

        return response()->json([
            'mensaje' => 'Autenticación satisfactoria.',
            'usuario' => $usuario
        ], 200);
    }

    // Endpoint para consultar los usuarios registrados
    public function usuarios()
    {
        $usuarios = User::select('id', 'name', 'email', 'created_at')->get();

        return response()->json([
            'mensaje' => 'Usuarios consultados correctamente.',
            'usuarios' => $usuarios
        ], 200);
    }
}