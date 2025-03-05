<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-personal.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-users-cog"></i>
                Gestión de Personal
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
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-user-tag"></i> Apellido</th>
                        <th><i class="fas fa-calendar-alt"></i> Edad</th>
                        <th><i class="fas fa-envelope"></i> Correo</th>
                        <th><i class="fas fa-phone"></i> Teléfono</th>
                        <th><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personal as $empleado)
                        <tr>
                            <td>{{ $empleado->personal_id }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->apellido }}</td>
                            <td>{{ $empleado->edad }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>
                                <form action="{{ route('personal-borrar', $empleado->personal_id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este trabajador?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="action-cards">
            <div class="action-card">
                <h2><i class="fas fa-file-alt"></i> Ficha de Trabajadores</h2>
                <form action="{{ route('personal.ficha') }}" method="GET">
                    <button type="submit" class="modern-button">
                        <i class="fas fa-search"></i> Ver Ficha Completa
                    </button>
                </form>
            </div>

            <div class="action-card">
                <h2><i class="fas fa-user-plus"></i> Nuevo Trabajador</h2>
                <form action="{{ route('personal-agregar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-signature"></i> Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ej: Juan" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido"><i class="fas fa-signature"></i> Apellido:</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Ej: Pérez" required>
                    </div>
                    <div class="form-group">
                        <label for="edad"><i class="fas fa-birthday-cake"></i> Edad:</label>
                        <input type="number" name="edad" id="edad" min="18" max="99" placeholder="Ej: 30" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Correo:</label>
                        <input type="email" name="correo" id="email" placeholder="Ej: juan@farmacia.com" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Ej: 555-1234" required>
                    </div>
                    <button type="submit" class="modern-button">
                        <i class="fas fa-save"></i> Guardar Trabajador
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
