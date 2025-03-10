<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Medicamento</title>
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Estilo del contenedor */
        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Estilo de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        /* Botón */
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Registros del Stock</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Medicamento</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Ubicación de la Sucursal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->stock_medicamento }}</td>
                        <td>{{ $item->medicamento_nombre }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->sucursal_ubicacion }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <a href="/stockporsucursal" class="button">Ir a la Página Principal</a>
    </div>
</body>
</html>
