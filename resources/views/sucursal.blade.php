<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sucursales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-sucursal.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-store-alt"></i>
                Gestión de Sucursales
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/administrador'">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </button>
        </div>
    </header>

    <main class="container">
        <section class="dashboard-section">
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-map-marker-alt"></i> Ubicación</th>
                            <th><i class="fas fa-phone"></i> Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sucursales as $sucursal)
                            <tr>
                                <td>{{ $sucursal->sucursal_id }}</td>
                                <td>{{ $sucursal->ubicacion }}</td>
                                <td>{{ $sucursal->numerodetlf }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="action-cards">
                <div class="action-card">
                    <h2><i class="fas fa-search"></i> Buscar Trabajadores</h2>
                    <form action="{{ route('sucursal-trabajador') }}" method="get">
                        <div class="form-group">
                            <label for="sucursal_id">ID de Sucursal:</label>
                            <input type="text" name="sucursal_id" id="sucursal_id"
                                   placeholder="Ej: 123" required>
                        </div>
                        <button type="submit" class="modern-button">
                            <i class="fas fa-users"></i> Buscar
                        </button>
                    </form>
                </div>

                <div class="action-card">
                    <h2><i class="fas fa-plus-circle"></i> Nueva Sucursal</h2>
                    <form action="{{ route('sucursal-agregar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ubicacion">Ubicación:</label>
                            <input type="text" name="ubicacion" id="ubicacion" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono">
                        </div>
                        <button type="submit" class="modern-button">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
