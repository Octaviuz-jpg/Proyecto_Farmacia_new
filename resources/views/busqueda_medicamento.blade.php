<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Búsqueda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        p {
            text-align: center;
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }
        td {
            border-bottom: 1px solid #ddd;
        }
        td:last-child {
            text-align: right;
        }
        .no-result {
            font-size: 18px;
            color: #dc3545;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Resultados de la Búsqueda</h1>
    <p>Resultados para: <strong>{{ $query }}</strong></p>

    @if ($resultados->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $resultado)
                    <tr>
                        <td>{{ $resultado->medicamento_id }}</td> 
                        <td>{{ $resultado->stock_id }}</td>
                        <td>${{ number_format($resultado->precio, 2) }}</td>
                        <td>{{ $resultado->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-result">No se encontraron resultados.</p>
    @endif
</body>
</html>
