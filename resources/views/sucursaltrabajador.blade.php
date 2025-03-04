<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trabajadores de la Sucursal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Trabajadores de la Sucursal</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>ID Sucursal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trabajadores as $trabajador)
                <tr>
                    <td>{{ $trabajador->id }}</td>
                    <td>{{ $trabajador->nombre }}</td>
                    <td>{{ $trabajador->apellido }}</td>
                    <td>{{ $trabajador->edad }}</td>
                    <td>{{ $trabajador->correo }}</td>
                    <td>{{ $trabajador->telefono }}</td>
                    <td>{{ $trabajador->sucursal_id }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No se encontraron trabajadores para esta sucursal.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
