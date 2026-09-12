<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario - Agua Transparente</title>
</head>
<body>

    <h1>Registrar Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">

        @csrf

        <div>
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
        </div>

        <br>

        <div>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
        </div>

        <br>

        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>

        <br>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>

        <br>

        <div>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccione un estado</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Suspendido">Suspendido</option>
            </select>
        </div>

        <br>

        <button type="submit">Registrar usuario</button>

    </form>

    <br>

    <a href="{{ route('usuarios.index') }}">Volver a usuarios</a>

</body>
</html>