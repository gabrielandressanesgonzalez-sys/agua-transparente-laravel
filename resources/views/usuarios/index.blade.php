<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/agua.css') }}">

    <title>Agua Transparente - Gestión de Usuarios</title>
</head>

<body>

    <div class="contenedor">

        <div class="encabezado">
            <h1>💧 Agua Transparente</h1>
            <p>Gestión de usuarios del servicio de agua potable</p>
        </div>

        @if (session('success'))
            <div class="mensaje-exito">
                {{ session('success') }}
            </div>
        @endif

        <div class="barra-acciones">

            <div>
                <h2>Usuarios registrados</h2>
                <p>Administración de usuarios del servicio</p>
            </div>

            <a href="{{ route('usuarios.create') }}"
               class="boton boton-principal">
                + Registrar usuario
            </a>

        </div>

        @if ($usuarios->count() > 0)

            <div class="tabla-contenedor">

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Cédula</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($usuarios as $usuario)

                            <tr>

                                <td>
                                    {{ $usuario->id_usuario }}
                                </td>

                                <td>
                                    {{ $usuario->nombres }}
                                </td>

                                <td>
                                    {{ $usuario->cedula }}
                                </td>

                                <td>
                                    {{ $usuario->direccion }}
                                </td>

                                <td>
                                    {{ $usuario->telefono }}
                                </td>

                                <td>

                                    <span class="estado
    @if ($usuario->estado == 'Activo')
        estado-activo
    @elseif ($usuario->estado == 'Inactivo')
        estado-inactivo
    @elseif ($usuario->estado == 'Suspendido')
        estado-suspendido
    @endif
">
    {{ $usuario->estado }}
</span>

                                </td>

                                <td>

                                    <div class="acciones">

                                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}"
                                           class="boton boton-editar">
                                            ✏️ Editar
                                        </a>

                                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}"
                                              method="POST"
                                              style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="boton boton-eliminar">
                                                🗑️ Eliminar
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="tabla-contenedor" style="padding: 30px;">

                <p>No hay usuarios registrados todavía.</p>

                <br>

                <a href="{{ route('usuarios.create') }}"
                   class="boton boton-principal">
                    Registrar el primer usuario
                </a>

            </div>

        @endif

    </div>

</body>
</html>