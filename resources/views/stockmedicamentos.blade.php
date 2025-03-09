<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock de Medicamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td {
            color: #555;
        }
        .empty {
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Stock de Medicamentos</h1>
    
    <!-- Tabla de stock de medicamentos -->
    <table>
        <thead>
            <tr>
                <th>ID del Medicamento</th>
                <th>Nombre del Medicamento</th>
                <th>ID del Stock</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Sucursal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockMedicamentos as $stock)
                <tr>
                    <td>{{ $stock->medicamento_id }}</td>
                    <td>{{ $stock->medicamento->nombre ?? 'Desconocido' }}</td>
                    <td>{{ $stock->stock_id }}</td>
                    <td>${{ number_format($stock->precio, 2) }}</td>
                    <td>{{ $stock->cantidad }}</td>
                    <td>{{ $stock->stock->sucursal->ubicacion ?? 'No asignada' }}</td>
                </tr>
            @endforeach
        </tbody>

        <div class="form-container">
            <h2>Buscar Medicamento</h2>
            <form action="{{ route('buscar-medicamento') }}" method="POST">
                @csrf <!-- Protección CSRF de Laravel -->
                <label for="medicamento_id">ID del Medicamento</label>
                <input type="number" id="medicamento_id" name="medicamento_id" placeholder="Ingrese el ID del medicamento" required>
                <button type="submit">Buscar Medicamento</button>
            </form>
        </div>
    
        <!-- Formulario para buscar stock por ID de la sucursal -->
        <div class="form-container">
            <h2>Buscar Stock por Sucursal</h2>
            <form action="{{ route('buscar-stock-sucursal') }}" method="POST">
                @csrf <!-- Protección CSRF de Laravel -->
                <label for="sucursal_id">ID de la Sucursal</label>
                <input type="number" id="sucursal_id" name="sucursal_id" placeholder="Ingrese el ID de la sucursal" required>
                <button type="submit">Buscar Stock</button>
            </form>
        </div>

    </div>

    
   
    </table>

    <form
    
</body>
</html>
