<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ingresos de Personal</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card-background);
            border-radius: 15px;
            box-shadow: 0 4px 6px var(--shadow-color);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 1rem;
            text-align: left;
        }

        table th {
            background: var(--primary-color);
            color: white;
        }

        table td {
            border-bottom: 1px solid var(--border-color);
        }

        table tr:hover {
            background-color: #f8f9fa;
        }

        .button-container {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .button-regresar,
        .button-agregar {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .button-regresar:hover,
        .button-agregar:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        .button-regresar i,
        .button-agregar i {
            color: white;
        }

        p {
            color: var(--text-color);
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-users"></i> Lista de Ingresos de Personal</h1>

    <!-- Mostrar errores si los hay -->
    @if (isset($error))
        <div class="error">
            <i class="fas fa-exclamation-circle"></i> {{ $error }}
        </div>
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
                        <td>{{ $ingreso->nombre_personal }}</td>
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
        <a href="/administrador" class="button-regresar">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
        <a href="/registro-personal" class="button-agregar">
            <i class="fas fa-user-plus"></i> Agregar
        </a>
    </div>
</body>
</html>
