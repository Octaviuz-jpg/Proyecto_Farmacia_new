<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Personal</title>
</head>
<body>
    <h1>Lista de Personal</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personal as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->edad }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>{{ $empleado->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button>Ficha trabajador</button>
    <button>Historial de cargos</button>
    
</body>
</html>
