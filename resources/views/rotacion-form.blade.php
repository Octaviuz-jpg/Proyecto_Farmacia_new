<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotación de Personal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-ficha.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-sync-alt"></i>
                Rotación de Personal
            </h1>
            <button class="button-retroceder" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i>
                Volver
            </button>
        </div>
    </header>

    <main class="container">
        <div class="form-card">
            <form action="{{ route('rotacion.store', $personal->personal_id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Trabajador:</label>
                    <input type="text" value="{{ $personal->nombre }} {{ $personal->apellido }}" disabled>
                </div>

                <div class="form-group">
                    <label>Sucursal Actual:</label>
                    <input type="text"
                           value="{{ $sucursalActual->ubicacion }} (Entrada: {{ $sucursalActual->pivot->fecha_entrada }})"
                           disabled>
                    <input type="hidden" name="sucursal_actual_id" value="{{ $sucursalActual->sucursal_id }}">
                </div>

                <div class="form-group">
                    <label for="fecha_salida"><i class="fas fa-calendar-times"></i> Fecha de Salida:</label>
                    <input type="date" name="fecha_salida" id="fecha_salida" required>
                </div>

                <div class="form-group">
                    <label for="sucursal_id"><i class="fas fa-building"></i> Nueva Sucursal:</label>
                    <select name="sucursal_id" id="sucursal_id" required>
                        @foreach($sucursales as $sucursal)
                        <option value="{{ $sucursal->sucursal_id }}">{{ $sucursal->ubicacion }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_entrada"><i class="fas fa-calendar-check"></i> Fecha de Ingreso:</label>
                    <input type="date" name="fecha_entrada" id="fecha_entrada" required>
                </div>

                <button type="submit" class="modern-button">
                    <i class="fas fa-save"></i> Guardar Rotación
                </button>
            </form>
        </div>
    </main>
</body>
</html>
