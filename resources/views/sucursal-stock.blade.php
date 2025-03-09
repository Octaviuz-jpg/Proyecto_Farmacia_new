<h2>Detalles de la Sucursal</h2>
<div>
    <p><strong>ID de la Sucursal:</strong> {{ $sucursal->sucursal_id }}</p>
    <p><strong>Ubicación:</strong> {{ $sucursal->ubicacion }}</p>
</div>

<h2>Detalles del Stock</h2>
@if ($sucursal->stock)
    <div>
        <p><strong>ID del Stock:</strong> {{ $sucursal->stock->id }}</p>
        <p><strong>Otra Información del Stock:</strong> {{ $sucursal->stock->otra_columna ?? 'No disponible' }}</p>
    </div>

    <h2>Medicamentos en el Stock</h2>
    @if ($sucursal->stock->medicamentos->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>ID del Medicamento</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sucursal->stock->medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->medicamento_id }}</td>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->pivot->cantidad }}</td>
                        <td>{{ $medicamento->pivot->precio ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay medicamentos asociados a este stock.</p>
    @endif
@else
    <p>No hay stock disponible para esta sucursal.</p>
@endif
