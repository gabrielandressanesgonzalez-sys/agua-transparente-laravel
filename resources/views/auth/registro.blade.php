<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Agua Transparente</title>

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

        h1 {
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

        .errores {
            background: #ffe5e5;
            color: #a00000;
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
    <h2>Crear cuenta</h2>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="errores">
            <strong>Se encontraron errores:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registro') }}" method="POST">

        @csrf

        <label for="name">Nombre completo:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
        >

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

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
        >

        <button type="submit">
            Registrarse
        </button>

    </form>

    <div class="enlace">
        ¿Ya tienes una cuenta?
        <a href="{{ route('login') }}">Iniciar sesión</a>
    </div>

</div>

</body>
</html>