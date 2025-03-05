<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Trabajadores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-ficha.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-id-badge"></i>
                Ficha Completa de Trabajadores
            </h1>
            <button class="button-retroceder" onclick="window.location.href='/personal'">
                <i class="fas fa-arrow-left"></i>
                Volver
            </button>
        </div>
    </header>

    <main class="container">
        <div class="search-card">
            <form action="{{ route('ficha-nombre') }}" method="GET">
                <div class="form-group">
                    <label for="query"><i class="fas fa-search"></i> Buscar Trabajador:</label>
                    <div class="search-container">
                        <input type="text" id="query" name="query"
                               placeholder="Ingrese nombre del trabajador" required>
                        <button type="submit" class="modern-button">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-user-tag"></i> Apellido</th>
                        <th><i class="fas fa-envelope"></i> Correo</th>
                        <th><i class="fas fa-phone"></i> Teléfono</th>
                        <th><i class="fas fa-briefcase"></i> Cargo</th>
                        <th><i class="fas fa-exchange-alt"></i> Rotaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajadores as $trabajador)
                    <tr>
                        <td>{{ $trabajador->personal_id }}</td>
                        <td>{{ $trabajador->nombre }}</td>
                        <td>{{ $trabajador->apellido }}</td>
                        <td>{{ $trabajador->correo }}</td>
                        <td>{{ $trabajador->telefono }}</td>
                        <td>{{ $trabajador->cargos->pluck('cargo_id')->implode(', ') ?? 'Sin cargo' }}</td>
                        <td>
                            @if ($trabajador->sucursales && $trabajador->sucursales->isNotEmpty())
                                <ul class="rotation-list">
                                    @foreach ($trabajador->sucursales as $sucursal)
                                        <li>
                                            <i class="fas fa-store"></i> Sucursal {{ $sucursal->sucursal_id }}
                                            <div class="rotation-dates">
                                                <span class="date-entry"><i class="fas fa-sign-in-alt"></i> {{ $sucursal->pivot->fecha_entrada ?? 'Sin entrada' }}</span>
                                                <span class="date-exit"><i class="fas fa-sign-out-alt"></i> {{ $sucursal->pivot->fecha_salida ?? 'Sin salida' }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="no-rotations">Sin rotaciones</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
