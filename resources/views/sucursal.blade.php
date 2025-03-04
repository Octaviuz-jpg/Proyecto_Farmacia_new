<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style-sucursal.css">
    <title>Document</title>
</head>
<body>
    <h1 class="titulo">Lista de Sucursales</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>Teléfono</th>
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
    <div>
        <button type="button" onclick="window.location.href='/administrador'">retroceder</button>
    </div>
    <!--boton para buscar trabajadores por sucursal-->
    <div>
        <form action="{{ route('sucursal-trabajador') }}" method="get">
            <label for="sucursal_id">Ingrese el ID de la sucursal:</label>
            <input type="text" name="sucursal_id" id="sucursal_id" placeholder="Escriba el ID de la sucursal" required>
            
            <button type="submit" style="margin-top: 10px; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Buscar Trabajadores
            </button>
        </form>
    </div>

    <div>
        <h1>Agregar una Nueva Sucursal</h1>
        <form action="{{ route('sucursal-agregar') }}" method="POST">
            @csrf
            <label for="ubicacion">Ubicacion:</label>
            <input type="text" name="ubicacion" id="ubicacion" required>
            <br>
    
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono">
            <br>
    
            <button type="submit">Agregar Sucursal</button>
        </form>
    </div>
    
</body>
</html>