<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pedido Proveedor</title>
</head>
<body>
    <h1>Agregar Pedido Proveedor</h1>

    <p><strong>Pedido ID:</strong> {{ $pedido->pedido_id }}</p>
    <p><strong>Analista:</strong> {{ $pedido->analistas->nombre }} {{ $pedido->analistas->apellido }}</p>
    <p><strong>Fecha:</strong> {{ $pedido->fecha_pedido }}</p>

    <form action="{{ route('pedido_proveedor.guardar') }}" method="POST">
        @csrf

        <!-- Laboratorio -->
        <label for="laboratorio_id">Laboratorio</label>
        <select name="laboratorio_id" id="laboratorio_id" required>
            <option value="">Selecciona un laboratorio</option>
            @foreach ($laboratorios as $laboratorio)
                <option value="{{ $laboratorio->lab_id }}">{{ $laboratorio->nombre }}</option>
            @endforeach
        </select>

        <!-- Medicamento -->
        <label for="medicamento_id">Medicamento</label>
        <select name="medicamento_id" id="medicamento_id" required>
            <option value="">Selecciona un medicamento</option>
            @foreach ($medicamentos as $medicamento)
                <option value="{{ $medicamento->medicamentos_id }}">{{ $medicamento->nombre }}</option>
            @endforeach
        </select>

        <!-- Cantidad -->
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <!-- Pedido ID (Oculto) -->
        <input type="hidden" name="pedido_id" value="{{ $pedido->pedido_id }}">

        <!-- Botón de envío -->
        <button type="submit">Guardar</button>
        @csrf
    </form>
</body>
</html>
