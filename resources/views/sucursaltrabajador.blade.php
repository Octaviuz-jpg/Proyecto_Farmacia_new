<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Estilos permanecen igual -->
</head>
<body>
    <h1>Trabajadores de la Sucursal</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>ID Sucursal</th>
                <th>Fecha Ingreso</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trabajadores as $trabajador)
                <tr>
                    <td>{{ $trabajador->personal_id }}</td>
                    <td>{{ $trabajador->nombre }}</td>
                    <td>{{ $trabajador->apellido }}</td>
                    <td>{{ $trabajador->edad }}</td>
                    <td>{{ $trabajador->correo }}</td>
                    <td>{{ $trabajador->telefono }}</td>
                    <td>
                        @foreach($trabajador->sucursales as $sucursal)
                            {{ $sucursal->sucursal_id }}
                        @endforeach
                    </td>
                    <td>
    @foreach($trabajador->sucursales as $sucursal)
        @if($sucursal->pivot->fecha_entrada)
            {{ \Carbon\Carbon::parse($sucursal->pivot->fecha_entrada)->format('d/m/Y H:i') }}
        @else
            Sin registro
        @endif
    @endforeach
</td>
                                    </tr>
            @empty
                <tr>
                    <td colspan="8">No se encontraron trabajadores activos en esta sucursal</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
