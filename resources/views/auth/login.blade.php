<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión - Agua Transparente</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f8ff;
            margin: 0;
            padding: 40px;
        }

        .contenedor {
            max-width: 450px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1, h2 {
            text-align: center;
            color: #006994;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #bbb;
            border-radius: 5px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #0077b6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #005f8f;
        }

        .error {
            background: #ffe5e5;
            color: #a00000;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .success {
            background: #e5f7e5;
            color: #176b17;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .enlace {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #0077b6;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Agua Transparente</h1>
    <h2>Inicio de sesión</h2>

    {{-- Mostrar mensaje de registro exitoso --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mostrar error de autenticación --}}
    @if ($errors->any())
        <div class="error">
            <strong>Error de autenticación:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.procesar') }}" method="POST">

        @csrf

        <label for="email">Correo electrónico:</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <label for="password">Contraseña:</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <button type="submit">
            Iniciar sesión
        </button>

    </form>

    <div class="enlace">
        ¿No tienes una cuenta?
        <a href="{{ route('registro') }}">Crear cuenta</a>
    </div>

</div>

</body>
</html>