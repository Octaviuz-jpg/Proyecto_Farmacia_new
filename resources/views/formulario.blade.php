<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pedido</title>
</head>
<body>
    <h1>Crear Pedido</h1>

    <form action="{{ route('pedido.guardar') }}" method="POST">
        @csrf

        <!-- Selección de Analista -->
        <label for="analista_id">Analista</label>
        <select name="analista_id" id="analista_id" required>
            <option value="">Selecciona un analista</option>
            @foreach ($analistas as $analista)
                <option value="{{ $analista->analista_id }}">{{ $analista->nombre }} {{ $analista->apellido }}</option>
            @endforeach
        </select>

        <!-- Fecha -->
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" required>

        <!-- Botón de envío -->
        <button type="submit">Guardar Pedido</button>
    </form>

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
