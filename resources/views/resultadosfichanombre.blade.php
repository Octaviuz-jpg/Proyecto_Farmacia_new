<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Resultados de la Búsqueda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --error-color: #e74c3c;
            --text-color: #2c3e50;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 2rem;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        h1 i {
            color: var(--secondary-color);
        }

        .error {
            background: var(--error-color);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .trabajador-card {
            background: var(--card-background);
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px var(--shadow-color);
            margin-bottom: 2rem;
        }

        .trabajador-card h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .trabajador-card p {
            margin-bottom: 0.8rem;
        }

        .trabajador-card h3 {
            color: var(--secondary-color);
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .trabajador-card ul {
            list-style-type: none;
            padding: 0;
        }

        .trabajador-card ul li {
            background: var(--background-color);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
        }

        .trabajador-card ul li strong {
            color: var(--primary-color);
        }

        .trabajador-card ul li span {
            display: block;
            margin-top: 0.5rem;
            color: var(--text-color);
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-search"></i> Ficha de Resultados de la Búsqueda</h1>

    @if ($resultados->isEmpty())
        <div class="error">
            <i class="fas fa-exclamation-circle"></i> No se encontraron trabajadores con ese nombre.
        </div>
    @else
        @foreach ($resultados as $trabajador)
            <div class="trabajador-card">
                <h2>{{ $trabajador->nombre }} {{ $trabajador->apellido }}</h2>
                <p><strong><i class="fas fa-phone"></i> Teléfono:</strong> {{ $trabajador->telefono ?? 'No disponible' }}</p>
                <p><strong><i class="fas fa-envelope"></i> Correo:</strong> {{ $trabajador->correo ?? 'No disponible' }}</p>

                <!-- Información de Cargos -->
                <h3><i class="fas fa-briefcase"></i> Cargos:</h3>
                @if ($trabajador->cargos->isEmpty())
                    <p>No tiene cargos registrados.</p>
                @else
                    <ul>
                        @foreach ($trabajador->cargos as $cargo)
                            <li>
                                <strong>{{ $cargo->cargo }}</strong><br>
                                <span><i class="fas fa-play"></i> Inicio: {{ $cargo->pivot->tiempo_inicio ?? '¿No ha comenzado?' }}</span><br>
                                <span><i class="fas fa-stop"></i> Fin: {{ $cargo->pivot->tiempo_final ?? '¿No ha terminado?' }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Información de Sucursales -->
                <h3><i class="fas fa-building"></i> Sucursales:</h3>
                @if ($trabajador->sucursales->isEmpty())
                    <p>No tiene sucursales registradas.</p>
                @else
                    <ul>
                        @foreach ($trabajador->sucursales as $sucursal)
                            <li>
                                <strong>{{ $sucursal->nombre }}</strong><br>
                                <span><i class="fas fa-sign-in-alt"></i> Entrada: {{ $sucursal->pivot->fecha_entrada ?? 'Sin entrada' }}</span><br>
                                <span><i class="fas fa-sign-out-alt"></i> Salida: {{ $sucursal->pivot->fecha_salida ?? 'Sin salida' }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    @endif
</body>
</html>
