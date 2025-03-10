<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Analistas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-analistas.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-user-tie"></i>
                Gestión de Analistas
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/administrador'">
                <i class="fas fa-arrow-left"></i>
                Volver al Panel
            </button>
        </div>
    </header>

    <main class="container">
        @if (session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-user-tag"></i> Apellido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($analista as $item)
                    <tr>
                        <td>{{ $item->analista_id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->apellido }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="action-cards">
            <div class="action-card">
                <h2><i class="fas fa-user-plus"></i> Nuevo Analista</h2>
                <form method="POST" action="{{ route('agregar.analista') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-signature"></i> Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required placeholder="Ej: Juan">
                    </div>
                    <div class="form-group">
                        <label for="apellido"><i class="fas fa-signature"></i> Apellido:</label>
                        <input type="text" name="apellido" id="apellido" required placeholder="Ej: Pérez">
                    </div>
                    <button type="submit" class="modern-button">
                        <i class="fas fa-save"></i> Guardar Analista
                    </button>
                </form>
            </div>

            <div class="action-card">
                <h2><i class="fas fa-clipboard-list"></i> Pedidos a Proveedores</h2>
                <form action="{{ route('pedidos-proveedor') }}" method="GET">
                    <button type="submit" class="modern-button secondary">
                        <i class="fas fa-eye"></i> Ver Pedidos
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
