<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - Agua Transparente</title>
</head>
<body>

    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="nombres">Nombres:</label>
            <input
                type="text"
                id="nombres"
                name="nombres"
                value="{{ $usuario->nombres }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="cedula">Cédula:</label>
            <input
                type="text"
                id="cedula"
                name="cedula"
                value="{{ $usuario->cedula }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="direccion">Dirección:</label>
            <input
                type="text"
                id="direccion"
                name="direccion"
                value="{{ $usuario->direccion }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="telefono">Teléfono:</label>
            <input
                type="text"
                id="telefono"
                name="telefono"
                value="{{ $usuario->telefono }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>

                <option value="Activo" {{ $usuario->estado == 'Activo' ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="Inactivo" {{ $usuario->estado == 'Inactivo' ? 'selected' : '' }}>
                    Inactivo
                </option>

                <option value="Suspendido" {{ $usuario->estado == 'Suspendido' ? 'selected' : '' }}>
                    Suspendido
                </option>

            </select>
        </div>

        <br>

        <button type="submit">Actualizar usuario</button>

    </form>

    <br>

    <a href="{{ route('usuarios.index') }}">Volver a usuarios</a>

</body>
</html>