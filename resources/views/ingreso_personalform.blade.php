<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ingreso Personal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f9;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        select, input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
        }
        button:hover {
            background-color: #218838;
        }
        .button-regresar {
            background-color: #6c757d;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            padding: 10px 20px;
            text-align: center;
            border: none;
        }
        .button-regresar:hover {
            background-color: #5a6268;
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
    <h1>Registrar Ingreso Personal</h1>

    <!-- Formulario -->
    <form action="{{ route('ingreso.store') }}" method="POST">
        @csrf

        <label for="personal_id">Personal:</label>
        <select name="personal_id" id="personal_id" required>
            <option value="">Selecciona un personal</option>
            @foreach ($personals as $personal)
                <option value="{{ $personal->personal_id }}">{{ $personal->nombre }}</option>
            @endforeach
        </select>

        <label for="fecha_entrada">Fecha de Entrada:</label>
        <input type="date" name="fecha_entrada" id="fecha_entrada" required>

        <label for="fecha_salida">Fecha de Salida (opcional):</label>
        <input type="date" name="fecha_salida" id="fecha_salida">

        <!-- Botones -->
        <div class="button-container">
            <button type="submit">Registrar Ingreso</button>
            <a href="{{ route('ingreso-personal') }}" class="button-regresar">Regresar</a>
        </div>
    </form>
</body>
</html>

