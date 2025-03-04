<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Trabajadores</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>ficha de todos los trabajadores</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Rotaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trabajadores as $trabajador)
            <tr>
                <td>{{ $trabajador->personal_id }}</td>
                <td>{{ $trabajador->nombre }}</td>
                <td>{{ $trabajador->apellido }}</td>
                <td>{{ $trabajador->correo }}</td>
                <td>{{ $trabajador->telefono }}</td>
                <td>{{ $trabajador->cargos->pluck('cargo_id')->implode(', ') ?? 'Sin cargo' }}</td>
                <td>
                    @if ($trabajador->sucursales && $trabajador->sucursales->isNotEmpty())
                        <ul>
                            @foreach ($trabajador->sucursales as $sucursal)
                                <li>Sucursal ID: {{ $sucursal->sucursal_id }} | 
                                Entrada: {{ $sucursal->pivot->fecha_entrada ?? 'Sin entrada' }} | 
                                Salida: {{ $sucursal->pivot->fecha_salida ?? 'Sin salida' }}</li>
                            @endforeach
                        </ul>
                    @else
                        Sin rotaciones
                    @endif
                </td>
            </tr>
            @endforeach
            
            <form action="{{ route('ficha-nombre') }}" method="GET">
                @csrf <!-- Esto es obligatorio para proteger contra ataques CSRF -->
                <label for="query">Nombre del trabajador:</label>
                <input type="text" id="query" name="query" placeholder="Ingrese un nombre" required>
                <button type="submit">Buscar</button>
            </form>
        </tbody>
        <form>

        </form>
    </table>
</body>
</html>
