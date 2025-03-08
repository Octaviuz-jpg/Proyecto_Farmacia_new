<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Laboratorios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-laboratorios.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-microscope"></i>
                Gestión de Laboratorios
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/administrador'">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </button>
        </div>
    </header>

    <main class="container">
        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-building"></i> Nombre</th>
                        <th><i class="fas fa-map-marker-alt"></i> Dirección</th>
                        <th><i class="fas fa-phone"></i> Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lab as $laboratorio)
                    <tr>
                        <td>{{ $laboratorio->lab_id }}</td>
                        <td>{{ $laboratorio->nombre }}</td>
                        <td>{{ $laboratorio->direccion }}</td>
                        <td>{{ $laboratorio->telefono }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="action-cards">
            <div class="action-card">
                <h2><i class="fas fa-plus-circle"></i> Nuevo Laboratorio</h2>
                <form action="{{ route('agregar-laboratorio') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-tag"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Laboratorio XYZ">
                    </div>
                    <div class="form-group">
                        <label for="direccion"><i class="fas fa-map"></i> Dirección:</label>
                        <input type="text" id="direccion" name="direccion" required placeholder="Ej: Av. Principal #123">
                    </div>
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Ej: 555-1234">
                    </div>
                    <button type="submit" class="modern-button">
                        <i class="fas fa-save"></i> Guardar Laboratorio
                    </button>
                </form>
            </div>

            <div class="action-card danger-card">
                <h2><i class="fas fa-trash-alt"></i> Eliminar Laboratorio</h2>
                <form action="{{ route('laboratorio-eliminar') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="lab_id"><i class="fas fa-exclamation-triangle"></i> ID Laboratorio:</label>
                        <input type="number" id="lab_id" name="lab_id" required placeholder="Ej: 123">
                    </div>
                    <button type="submit" class="modern-button danger">
                        <i class="fas fa-trash"></i> Eliminar Permanentemente
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
