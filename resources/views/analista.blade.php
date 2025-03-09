<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Analistas</title>
</head>
<body>
    <h1>Lista de Analistas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
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

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('agregar.analista') }}">
    @csrf
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>

    <div>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
    </div>

    <button type="submit">Agregar Analista</button>
</form>

<form action="{{route('pedidos-proveedor')}}" method="GET">
        <button>ver pedidos hechos</button>
</form>

</body>
</html>
