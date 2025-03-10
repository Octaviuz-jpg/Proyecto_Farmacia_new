<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Compra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --error-color: #e74c3c;
            --text-color: #2c3e50;
            --background-color: #f8f9fa;
            --card-background: #ffffff;
            --border-color: #e0e0e0;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 2rem;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        h1 i {
            color: var(--secondary-color);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .alert-success {
            background: var(--success-color);
            color: white;
        }

        .alert-danger {
            background: var(--error-color);
            color: white;
        }

        form {
            background: var(--card-background);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px var(--shadow-color);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--secondary-color);
            outline: none;
        }

        button[type="submit"] {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            justify-content: center;
        }

        button[type="submit"]:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <h1><i class="fas fa-shopping-cart"></i> Registrar Compra</h1>

    <form action="{{ route('compra-formulario-guardar') }}" method="POST">
        @csrf

        <!-- Pedido Proveedor (Select Dinámico) -->
        <div class="form-group">
            <label for="pedido_proveedor_id"><i class="fas fa-truck"></i> Pedido Proveedor</label>
            <select name="pedido_proveedor_id" id="pedido_proveedor_id" required>
                <option value="">Selecciona un Pedido Proveedor</option>
                @foreach ($pedidos as $pedido)
                    <option value="{{ $pedido->pedido_proveedor_id }}">{{ $pedido->pedido_proveedor_id }}</option>
                @endforeach
            </select>
        </div>

        <!-- Forma de Pago -->
        <div class="form-group">
            <label for="forma_pago"><i class="fas fa-money-bill-wave"></i> Forma de Pago</label>
            <select name="forma_pago" id="forma_pago" required>
                <option value="">Selecciona una opción</option>
                <option value="contado">Contado</option>
                <option value="5d">5 días</option>
                <option value="15d">15 días</option>
                <option value="30d">30 días</option>
            </select>
        </div>

        <!-- Tiempo de Llegada -->
        <div class="form-group">
            <label for="tiempo_llegada"><i class="fas fa-calendar-day"></i> Tiempo de Llegada</label>
            <input type="date" name="tiempo_llegada" id="tiempo_llegada" required>
        </div>

        <!-- Fecha de Pago -->
        <div class="form-group">
            <label for="fecha_pago"><i class="fas fa-calendar-check"></i> Fecha de Pago</label>
            <input type="date" name="fecha_pago" id="fecha_pago" required>
        </div>

        <!-- Estado de Pago -->
        <div class="form-group">
            <label for="estado_pago"><i class="fas fa-money-check-alt"></i> Estado de Pago</label>
            <select name="estado_pago" id="estado_pago" required>
                <option value="">Selecciona una opción</option>
                <option value="Pagado">Pagado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Atrasado">Atrasado</option>
            </select>
        </div>

        <!-- Botón de Enviar -->
        <button type="submit"><i class="fas fa-save"></i> Guardar Compra</button>
    </form>

</body>
</html>
