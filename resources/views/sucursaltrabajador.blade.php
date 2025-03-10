<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores de la Sucursal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #2c3e50;
            --success-color: #27ae60;
            --background-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--background-gradient);
            padding: 2rem;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
            margin: 2rem auto;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        th {
            background: var(--primary-color);
            color: white;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        th i {
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            table {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-users"></i> Trabajadores de la Sucursal</h1>

    <table>
        <thead>
            <tr>
                <th><i class="fas fa-id-card"></i> ID</th>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-user"></i> Apellido</th>
                <th><i class="fas fa-birthday-cake"></i> Edad</th>
                <th><i class="fas fa-envelope"></i> Correo</th>
                <th><i class="fas fa-phone"></i> Teléfono</th>
                <th><i class="fas fa-store-alt"></i> ID Sucursal</th>
                <th><i class="fas fa-calendar-alt"></i> Fecha Ingreso</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trabajadores as $trabajador)
                <tr>
                    <td>{{ $trabajador->personal_id }}</td>
                    <td>{{ $trabajador->nombre }}</td>
                    <td>{{ $trabajador->apellido }}</td>
                    <td>{{ $trabajador->edad }}</td>
                    <td>{{ $trabajador->correo }}</td>
                    <td>{{ $trabajador->telefono }}</td>
                    <td>
                        @foreach($trabajador->sucursales as $sucursal)
                            {{ $sucursal->sucursal_id }}
                        @endforeach
                    </td>
                    <td>
                        @foreach($trabajador->sucursales as $sucursal)
                            @if($sucursal->pivot->fecha_entrada)
                                {{ \Carbon\Carbon::parse($sucursal->pivot->fecha_entrada)->format('d/m/Y H:i') }}
                            @else
                                Sin registro
                            @endif
                        @endforeach
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No se encontraron trabajadores activos en esta sucursal</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
