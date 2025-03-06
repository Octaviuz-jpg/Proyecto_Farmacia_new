<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaciones Medicamentos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        form {
            margin-top: 20px;
        }
        label, input, button {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Medicamentos</h1>

    <table>
        <thead>
            <tr>
                <th>ID Medicamento</th>
                <th>Nombre Medicamento</th>
                <th>Monodrogas Asociadas</th>
                <th>Presentaciones Asociadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->medicamento_id }}</td>
                    <td>{{ $medicamento->nombre }}</td>
                    <td>
                        <ul>
                            @foreach ($medicamento->monodrogas as $monodroga)
                                <li>{{ $monodroga->tipo_monodroga }} (ID: {{ $monodroga->monodroga_id }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($medicamento->presentaciones as $presentacion)
                                <li>{{ $presentacion->tipo_presentacion }} (ID: {{ $presentacion->presentacion_id }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Agregar Nuevo Medicamento</h2>
<form action="{{ route('medicamento-agregar') }}" method="POST">
    @csrf <!-- Token de seguridad obligatorio en Laravel -->
    <label for="nombre">Nombre del Medicamento:</label>
    <input type="text" id="nombre" name="nombre" required placeholder="Nombre del medicamento">

    <label for="monodrogas">Monodrogas Asociadas (IDs separados por comas):</label>
    <input type="text" id="monodrogas" name="monodrogas" placeholder="Ejemplo: 1,2,3">

    <label for="presentaciones">Presentaciones Asociadas (IDs separados por comas):</label>
    <input type="text" id="presentaciones" name="presentaciones" placeholder="Ejemplo: 1,4,5">

    <button type="submit">Guardar Medicamento</button>
</form>
