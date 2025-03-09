<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
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
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Lista de Compras</h1>

    <table>
        <thead>
            <tr>
                <th>Compra ID</th>
                <th>Pedido Proveedor ID</th>
                <th>Forma de Pago</th>
                <th>Tiempo de Llegada</th>
                <th>Fecha de Pago</th>
                <th>Estado de Pago</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($compras as $compra)
                <tr>
                    <td>{{ $compra->compra_id }}</td>
                    <td>{{ $compra->pedido_proveedor_id }}</td>
                    <td>{{ $compra->forma_pago }}</td>
                    <td>{{ $compra->tiempo_llegada }}</td>
                    <td>{{ $compra->fecha_pago }}</td>
                    <td>{{ $compra->estado_pago }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No hay compras registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <form action="{{route('compra-formulario')}}" method="GET">
        <button>registrar nueva compra</button>
</form>
</body>
</html>
