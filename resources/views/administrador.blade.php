<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-administrador.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-user-shield"></i>
                Panel de Administración
            </h1>
            <button class="button-salida" onclick="window.location.href='/'">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesión
            </button>
        </div>
    </header>

    <main class="admin-main">
        <div class="dashboard-container">
            <a href="/personal" class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h2>Gestión de Personal</h2>
                <p>Administra empleados y permisos</p>
            </a>

            <a href="/sucursal" class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-store"></i>
                </div>
                <h2>Control de Sucursales</h2>
                <p>Gestiona ubicaciones y horarios</p>
            </a>
        </div>

            <!--Boton para ir a la vista de medicamentos!-->
        <form action="{{ route('medicamentos') }}" method="GET">
            @csrf
            <button>ir medicamentos</button>
             
        </form>

        <!--Boton para ir a la vista de laboratorios!-->
        <form action="{{ route('laboratorios') }}" method="GET">
            @csrf
            <button> ver laboratorios</button>
        </form>

        <!--Boton para ir a la vista de stock_medicamentos!-->
        <form action="{{ route('stock-medicamentos') }}" method="GET">
            @csrf
            <button> ver medicamentos sucursales</button>
        </form>

    </main>
</body>
</html>
