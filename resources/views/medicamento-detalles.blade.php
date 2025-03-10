<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Medicamento</title>
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

        h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        div {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            margin: 2rem auto;
        }

        p {
            margin-bottom: 0.8rem;
            color: var(--text-color);
        }

        strong {
            font-weight: 600;
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
    <h2><i class="fas fa-capsules"></i> Detalles del Medicamento</h2>
    <div>
        <p><strong><i class="fas fa-id-card"></i> ID del Medicamento:</strong> {{ $medicamento->medicamentos_id}}</p>
        <p><strong><i class="fas fa-pills"></i> Nombre del Medicamento:</strong> {{ $medicamento->nombre }}</p>
        <p><strong><i class="fas fa-file-alt"></i> Descripción:</strong> {{ $medicamento->descripcion ?? 'No disponible' }}</p>
    </div>

    <h2><i class="fas fa-warehouse"></i> Detalles del Medicamento y su Stock</h2>

    @if ($medicamento->stocks->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> ID del Stock</th>
                    <th><i class="fas fa-cubes"></i> Cantidad</th>
                    <th><i class="fas fa-dollar-sign"></i> Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicamento->stocks as $stock)
                    <tr>
                        <td>{{ $stock->stock_id}}</td>
                        <td>{{ $stock->pivot->cantidad }}</td>
                        <td>{{ $stock->pivot->precio ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Este medicamento no tiene stock disponible.</p>
    @endif
</body>
</html>
