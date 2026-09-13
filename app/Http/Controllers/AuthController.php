<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra el formulario de registro
    public function mostrarRegistro()
    {
        return view('auth.registro');
    }

    // Procesa el registro del usuario
    public function registrar(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Usuario registrado correctamente.');
    }

    // Muestra el formulario de inicio de sesión
    public function mostrarLogin()
    {
        return view('auth.login');
    }

    // Procesa el inicio de sesión
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            return redirect()->route('usuarios.index')
                ->with('success', 'Autenticación satisfactoria.');
        }

        return back()
            ->withErrors([
                'email' => 'Error de autenticación: usuario o contraseña incorrectos.',
            ])
            ->withInput($request->only('email'));
    }

    // Cierra la sesión del usuario
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}