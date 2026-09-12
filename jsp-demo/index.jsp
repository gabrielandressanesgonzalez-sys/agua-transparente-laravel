<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agua Transparente - JSP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 40px;
            color: #1f2937;
        }

        .contenedor {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        }

        h1 {
            color: #0b7285;
        }

        .formulario {
            margin-top: 25px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #0b7285;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            cursor: pointer;
        }

        .resultado {
            margin-top: 20px;
            padding: 15px;
            background: #e7f5f8;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>💧 Agua Transparente</h1>

    <p>Demostración de formulario utilizando JSP, GET y POST.</p>

    <!-- FORMULARIO GET -->
    <div class="formulario">

        <h2>Consultar usuario</h2>

        <form method="GET" action="index.jsp">

            <label for="buscar">Nombre o cédula:</label>

            <input
                type="text"
                id="buscar"
                name="buscar"
                placeholder="Ejemplo: Gabriel o 100000003"
            >

            <button type="submit">
                Consultar
            </button>

        </form>

    </div>


    <!-- FORMULARIO POST -->
    <div class="formulario">

        <h2>Registrar usuario</h2>

        <form method="POST" action="index.jsp">

            <label for="nombres">Nombres:</label>

            <input
                type="text"
                id="nombres"
                name="nombres"
                required
            >

            <label for="cedula">Cédula:</label>

            <input
                type="text"
                id="cedula"
                name="cedula"
                required
            >

            <button type="submit">
                Registrar
            </button>

        </form>

    </div>


    <!-- ELEMENTOS JSP -->

    <div class="resultado">

        <h2>Resultado</h2>

        <%
            String buscar = request.getParameter("buscar");
            String nombres = request.getParameter("nombres");
            String cedula = request.getParameter("cedula");

            if (buscar != null && !buscar.trim().isEmpty()) {
        %>

            <p>
                Consulta realizada mediante <strong>GET</strong>.
            </p>

            <p>
                Búsqueda:
                <strong><%= buscar %></strong>
            </p>

        <%
            }

            if (nombres != null && cedula != null) {
        %>

            <p>
                Registro recibido mediante <strong>POST</strong>.
            </p>

            <p>
                Nombre:
                <strong><%= nombres %></strong>
            </p>

            <p>
                Cédula:
                <strong><%= cedula %></strong>
            </p>

        <%
            }
        %>

    </div>

</div>

</body>
</html>