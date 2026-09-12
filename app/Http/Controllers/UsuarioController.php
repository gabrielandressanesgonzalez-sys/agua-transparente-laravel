<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    public function index(Request $request)
  {
    $buscar = $request->buscar;

    $usuarios = Usuario::query()
        ->when($buscar, function ($query, $buscar) {
            $query->where('nombres', 'like', '%' . $buscar . '%')
                  ->orWhere('cedula', 'like', '%' . $buscar . '%');
        })
        ->get();

    return view('usuarios.index', compact('usuarios', 'buscar'));
  }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:100',
            'cedula' => 'required|max:50',
            'direccion' => 'required|max:150',
            'telefono' => 'required|max:45',
            'estado' => 'required',
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario registrado correctamente.');
    }
    public function edit($id)
{
    $usuario = Usuario::findOrFail($id);

    return view('usuarios.edit', compact('usuario'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'nombres' => 'required|max:100',
        'cedula' => 'required|max:50',
        'direccion' => 'required|max:150',
        'telefono' => 'required|max:45',
        'estado' => 'required',
    ]);

    $usuario = Usuario::findOrFail($id);

    $usuario->update($request->all());

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario actualizado correctamente.');
}
public function destroy($id)
{
    $usuario = Usuario::findOrFail($id);

    $usuario->delete();

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario eliminado correctamente.');
}
}
