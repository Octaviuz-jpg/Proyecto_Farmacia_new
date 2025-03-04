<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style-personal.css">
    <title>Lista de Personal</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1.titulo {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1 class="titulo">Lista de Personal</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personal as $empleado)
                <tr>
                    <td>{{ $empleado->personal_id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->edad }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>
                        <form action="{{ route('personal-borrar', $empleado->personal_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar a este trabajador?')" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para ver ficha (restaurado) -->
    <form action="{{ route('personal.ficha') }}" method="GET">
        <button type="submit" style="margin: 20px auto; display: block; width: 200px; background-color: #007BFF; color: white; padding: 10px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
            Ver Ficha de Trabajadores
        </button>
    </form>

    <!-- Formulario Mejorado -->
    <form action="{{ route('personal-agregar') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" placeholder="Ingresa el apellido" required>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" placeholder="Ingresa la edad" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" placeholder="Ingresa el correo" required>

        <label for="telefono">Teléfono:</label>
        <input type="telefono" name="telefono" id="telefono" placeholder="Ingresa el teléfono" required>

        <button type="submit">Agregar Trabajador</button>
    </form>
</body>
</html>
