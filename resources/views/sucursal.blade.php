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
</body>
</html>