<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pedido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
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
            padding: 0.8rem 1.5rem;
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

        .error {
            background: var(--error-color);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .error ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .error ul li {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <h1><i class="fas fa-cart-plus"></i> Crear Pedido</h1>

    @if ($errors->any())
        <div class="error">
            <i class="fas fa-exclamation-circle"></i>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pedido.guardar') }}" method="POST">
        @csrf

        <!-- Selección de Analista -->
        <div class="form-group">
            <label for="analista_id"><i class="fas fa-user-tie"></i> Analista:</label>
            <select name="analista_id" id="analista_id" required>
                <option value="">Selecciona un analista</option>
                @foreach ($analistas as $analista)
                    <option value="{{ $analista->analista_id }}">{{ $analista->nombre }} {{ $analista->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Fecha -->
        <div class="form-group">
            <label for="fecha"><i class="fas fa-calendar-alt"></i> Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>

        <!-- Botón de envío -->
        <button type="submit"><i class="fas fa-save"></i> Guardar Pedido</button>
    </form>
</body>
</html>
