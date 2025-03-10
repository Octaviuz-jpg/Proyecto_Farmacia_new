<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pedido Proveedor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #2c3e50;
            --success-color: #27ae60;
            --background-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            background: var(--background-gradient);
            padding: 2rem;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        p {
            margin-bottom: 0.8rem;
            color: var(--text-color);
        }

        strong {
            font-weight: 600;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            margin: 2rem auto;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #ecf0f1;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            transition: border-color 0.3s ease;
        }

        select:focus, input[type="number"]:focus {
            border-color: var(--secondary-color);
            outline: none;
        }

        button[type="submit"] {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        button[type="submit"]:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-plus-circle"></i> Agregar Pedido Proveedor</h1>

    <p><strong>Pedido ID:</strong> {{ $pedido->pedido_id }}</p>
    <p><strong>Analista:</strong> {{ $pedido->analistas->nombre }} {{ $pedido->analistas->apellido }}</p>
    <p><strong>Fecha:</strong> {{ $pedido->fecha_pedido }}</p>

    <form action="{{ route('pedido_proveedor.guardar') }}" method="POST">
        @csrf

        <label for="laboratorio_id">Laboratorio</label>
        <select name="laboratorio_id" id="laboratorio_id" required>
            <option value="">Selecciona un laboratorio</option>
            @foreach ($laboratorios as $laboratorio)
                <option value="{{ $laboratorio->lab_id }}">{{ $laboratorio->nombre }}</option>
            @endforeach
        </select>

        <label for="medicamento_id">Medicamento</label>
        <select name="medicamento_id" id="medicamento_id" required>
            <option value="">Selecciona un medicamento</option>
            @foreach ($medicamentos as $medicamento)
                <option value="{{ $medicamento->medicamentos_id }}">{{ $medicamento->nombre }}</option>
            @endforeach
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <input type="hidden" name="pedido_id" value="{{ $pedido->pedido_id }}">

        <button type="submit"><i class="fas fa-save"></i> Guardar</button>
    </form>
</body>
</html>
