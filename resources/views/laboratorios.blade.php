<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorios</title>
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
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Lista de Laboratorios</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lab as $laboratorio)
                <tr>
                    <td>{{ $laboratorio->nombre }}</td>
                    <td>{{ $laboratorio->direccion }}</td>
                    <td>{{ $laboratorio->telefono }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Laboratorio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
             <h1>Agregar Laboratorio</h1>
    <form action="{{ route('agregar-laboratorio') }}" method="post">
        @csrf <!-- Token de seguridad para Laravel -->
        
        <!-- Campo para el Nombre -->
        <label for="nombre">Nombre del Laboratorio</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del laboratorio" required maxlength="255">
        
        <!-- Campo para Dirección -->
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" placeholder="Código de dirección" required>
        
        <!-- Campo para Teléfono -->
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" placeholder="Número de teléfono del laboratorio">
        
        <!-- Botón para Enviar -->
        <button type="submit">Agregar Laboratorio</button>
    </form>

    <h1>Eliminar Laboratorio</h1>
    <form action="{{ route('laboratorio-eliminar') }}" method="POST">
        @csrf <!-- Token CSRF obligatorio en Laravel -->
        @method('DELETE') <!-- Método DELETE para eliminar -->
    
        <!-- Campo para lab_id del laboratorio -->
        <label for="lab_id">ID del Laboratorio a Eliminar</label>
        <input type="number" id="lab_id" name="lab_id" placeholder="Ingrese el ID del laboratorio" required>
    
        <!-- Botón para enviar el formulario -->
        <button type="submit">Eliminar Laboratorio</button>
    </form>
    
</body>
</html>

<
