<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido y Compras</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Detalles del Pedido y las Compras Asociadas</h1>

    <h2>Detalles del Pedido</h2>
    <table>
        <tr>
            <th>Campo</th>
            <th>Detalle</th>
        </tr>
        <tr>
            <td>ID del Pedido</td>
            <td>{{ $pedidoProveedor->pedido_proveedor_id }}</td>
        </tr>
        <tr>
            <td>laboratorio</td>
            <td>{{ $pedidoProveedor->laboratorios->nombre }}</td>
        </tr>
        <tr>
            <td>pedido</td>
            <td>{{ $pedidoProveedor->pedido_id}}</td>
        </tr>
        <tr>
            <td>medicamento</td>
            <td>{{ $pedidoProveedor->medicamentos->nombre }}</td>
        </tr>
        <tr>
            <td>cantidad</td>
            <td>{{ $pedidoProveedor->cantidad}}</td>
        </tr>
    </table>

    <h2>Compras Asociadas</h2>
    <table>
        <thead>
            <tr>
                <th>ID de Compra</th>
                <th>Forma de Pago</th>
                <th>Tiempo de Llegada</th>
                <th>Fecha de Pago</th>
                <th>Estado de Pago</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidoProveedor->compras as $compra)
                <tr>
                    <td>{{ $compra->compra_id }}</td>
                    <td>{{ $compra->forma_pago }}</td>
                    <td>{{ $compra->tiempo_llegada }}</td>
                    <td>{{ $compra->fecha_pago }}</td>
                    <td>{{ $compra->pedido_proveedor_id }}</td>
                    <td>{{ $compra->estado_pago }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No hay compras asociadas a este pedido.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
