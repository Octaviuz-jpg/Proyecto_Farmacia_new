<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Compra</title>
    <style>
        label {
            display: block;
            margin: 8px 0 4px;
        }
        input, select, button {
            padding: 8px;
            margin-bottom: 12px;
            width: 100%;
            max-width: 400px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <h1>Registrar Compra</h1>
    
    <form action="{{ route('compra-formulario-guardar') }}" method="POST">
        @csrf

        <!-- Pedido Proveedor (Select Dinámico) -->
        <label for="pedido_proveedor_id">Pedido Proveedor</label>
        <select name="pedido_proveedor_id" id="pedido_proveedor_id" required>
            <option value="">Selecciona un Pedido Proveedor</option>
            @foreach ($pedidos as $pedido)
                <option value="{{ $pedido->pedido_proveedor_id }}">{{ $pedido->pedido_proveedor_id }}</option>
            @endforeach
        </select>

        <!-- Forma de Pago -->
        <label for="forma_pago">Forma de Pago</label>
        <select name="forma_pago" id="forma_pago" required>
            <option value="">Selecciona una opción</option>
            <option value="contado">contado</option>
            <option value="5d">5d</option>
            <option value="30d">30d</option>
            <option value="15d">15d</option>
        </select>

       <!-- Tiempo de Llegada -->
        <label for="tiempo_llegada">Tiempo de Llegada</label>
        <input type="date" name="tiempo_llegada" id="tiempo_llegada" required>


        <!-- Fecha de Pago -->
        <label for="fecha_pago">Fecha de Pago</label>
        <input type="date" name="fecha_pago" id="fecha_pago" required>

        <!-- Estado de Pago -->
        <label for="estado_pago">Estado de Pago</label>
        <select name="estado_pago" id="estado_pago" required>
            <option value="">Selecciona una opción</option>
            <option value="Pagado">Pagado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Atrasado">Atrasado</option>
        </select>

        <!-- Botón de Enviar -->
        <button type="submit">Guardar Compra</button>
    </form>


</body>
</html>
