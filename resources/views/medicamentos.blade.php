<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Medicamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style-medicamentos.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <h1 class="titulo">
                <i class="fas fa-pills"></i>
                Gestión de Medicamentos
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
                        <th><i class="fas fa-capsules"></i> Medicamento</th>
                        <th><i class="fas fa-prescription-bottle"></i> Monodrogas</th>
                        <th><i class="fas fa-box-open"></i> Presentaciones</th>
                        <th><i class="fas fa-microscope"></i> Laboratorios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->medicamentos_id }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>
                            <ul class="relation-list">
                                @foreach ($medicamento->monodrogas as $monodroga)
                                <li><i class="fas fa-prescription-bottle-alt"></i> {{ $monodroga->tipo_monodroga }} <span class="badge">ID: {{ $monodroga->monodroga_id }}</span></li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="relation-list">
                                @foreach ($medicamento->presentaciones as $presentacion)
                                <li><i class="fas fa-box"></i> {{ $presentacion->tipo_presentacion }} <span class="badge">ID: {{ $presentacion->presentacion_id }}</span></li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="relation-list">
                                @foreach ($medicamento->laboratorios as $laboratorio)
                                <li><i class="fas fa-flask"></i> {{ $laboratorio->nombre }} <span class="badge">ID: {{ $laboratorio->lab_id }}</span></li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="action-cards">
            <div class="action-card">
                <h2><i class="fas fa-plus-circle"></i> Nuevo Medicamento</h2>
                <form action="{{ route('medicamento-agregar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-tag"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Paracetamol">
                    </div>
                    <div class="form-group">
                        <label for="monodrogas"><i class="fas fa-prescription-bottle-alt"></i> Monodrogas (IDs):</label>
                        <input type="text" id="monodrogas" name="monodrogas" placeholder="Ej: 1,2,3">
                    </div>
                    <div class="form-group">
                        <label for="presentaciones"><i class="fas fa-box"></i> Presentaciones (IDs):</label>
                        <input type="text" id="presentaciones" name="presentaciones" placeholder="Ej: 1,4,5">
                    </div>
                    <div class="form-group">
                        <label for="laboratorios"><i class="fas fa-flask"></i> Laboratorios (IDs):</label>
                        <input type="text" id="laboratorios" name="laboratorios" placeholder="Ej: 1,2,3">
                    </div>
                    <button type="submit" class="modern-button">
                        <i class="fas fa-save"></i> Guardar Medicamento
                    </button>
                </form>
            </div>

            <div class="action-card">
                <h2><i class="fas fa-trash-alt"></i> Eliminar Medicamento</h2>
                <form action="{{ route('quitar-medicamento') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="medicamentos_id"><i class="fas fa-exclamation-triangle"></i> ID Medicamento:</label>
                        <input type="number" id="medicamentos_id" name="medicamentos_id" required placeholder="Ej: 123">
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
