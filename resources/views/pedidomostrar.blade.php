<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos a Proveedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #999;
        }
    </style>
</head>
<body>
    <h1>Pedidos a Proveedores</h1>

    @if ($pedido->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>ID Pedido Proveedor</th>
                    <th>ID Laboratorio</th>
                    <th>ID Pedido</th>
                    <th>ID Medicamento</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido as $ped)
                    <tr>
                        <td>{{ $ped->pedido_proveedor_id }}</td>
                        <td>{{ $ped->laboratorio_id }}</td>
                        <td>{{ $ped->pedido_id }}</td>
                        <td>{{ $ped->medicamento_id }}</td>
                        <td>{{ $ped->cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">No hay pedidos registrados actualmente.</p>
    @endif
    <form action="{{ route('pedido-formulario') }}" method="get">
        <button>hacer pedido</button>
    </form>
</body>
</html>
