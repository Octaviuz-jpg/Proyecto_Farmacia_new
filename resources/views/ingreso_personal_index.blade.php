<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ingresos de Personal</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .button-container {
            margin-top: 20px;
            text-align: right;
        }
        .button-agregar {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        .button-agregar:hover {
            background-color: #0056b3;
        }
        .button-regresar {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }
        .button-regresar:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h1>Lista de Ingresos de Personal</h1>

    <!-- Mostrar errores si los hay -->
    @if (isset($error))
        <p class="error">{{ $error }}</p>
    @endif

    <!-- Mostrar tabla solo si hay datos -->
    @if (isset($ingresos) && count($ingresos) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID Ingreso</th>
                    <th>Nombre del Personal</th>
                    <th>Fecha Entrada</th>
                    <th>Fecha Salida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->ingreso_id }}</td>
                        <td>{{ $ingreso->nombre_personal }}</td> <!-- Muestra el nombre en lugar del ID -->
                        <td>{{ $ingreso->fecha_entrada }}</td>
                        <td>{{ $ingreso->fecha_salida }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron registros de ingresos.</p>
    @endif

    <!-- Botones de acción -->
    <div class="button-container">
        <a href="/administrador" class="button-regresar">Regresar</a>
        <a href="/registro-personal" class="button-agregar">Agregar</a>
    </div>
</body>
</html>
