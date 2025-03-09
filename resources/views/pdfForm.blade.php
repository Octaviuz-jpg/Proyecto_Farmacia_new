<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar PDF</title>
</head>
<body>
    <h1>Generar PDF de Compras y Pedidos</h1>
    <form action="{{ route('pedido-proveedor.pdf') }}" method="GET">
        <label for="id">ID del Pedido:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Generar PDF</button>
    </form>
</body>
</html>
