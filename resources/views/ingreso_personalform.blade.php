<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ingreso Personal</title>
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

        .button-container {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        button[type="submit"],
        .button-regresar {
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
            text-decoration: none;
        }

        button[type="submit"]:hover,
        .button-regresar:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        button[type="submit"] i,
        .button-regresar i {
            color: white;
        }
    </style>
    <script>
        // Mostrar mensaje como ventana emergente
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                alert("{{ session('success') }}");
            @endif

            @if (session('error'))
                alert("{{ session('error') }}");
            @endif
        });
    </script>
</head>
<body>
    <h1><i class="fas fa-user-clock"></i> Registrar Ingreso Personal</h1>

    <!-- Formulario -->
    <form action="{{ route('ingreso.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="personal_id"><i class="fas fa-user"></i> Personal:</label>
            <select name="personal_id" id="personal_id" required>
                <option value="">Selecciona un personal</option>
                @foreach ($personals as $personal)
                    <option value="{{ $personal->personal_id }}">{{ $personal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_entrada"><i class="fas fa-calendar-day"></i> Fecha de Entrada:</label>
            <input type="date" name="fecha_entrada" id="fecha_entrada" required>
        </div>

        <div class="form-group">
            <label for="fecha_salida"><i class="fas fa-calendar-check"></i> Fecha de Salida (opcional):</label>
            <input type="date" name="fecha_salida" id="fecha_salida">
        </div>

        <!-- Botones -->
        <div class="button-container">
            <button type="submit"><i class="fas fa-save"></i> Registrar Ingreso</button>
            <a href="{{ route('ingreso-personal') }}" class="button-regresar"><i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
    </form>
</body>
</html>
