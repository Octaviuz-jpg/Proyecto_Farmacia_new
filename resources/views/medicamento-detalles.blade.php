<h2>Detalles del Medicamento</h2>
<div>
    <p><strong>ID del Medicamento:</strong> {{ $medicamento->medicamentos_id}}</p> <!-- Cambié 'medicamento_id' a 'id' -->
    <p><strong>Nombre del Medicamento:</strong> {{ $medicamento->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $medicamento->descripcion ?? 'No disponible' }}</p>
    {{-- <p><strong>Precio:</strong> ${{ number_format($medicamento->precio, 2) }}</p> --}}
</div>

<h2>Detalles del Medicamento y su Stock</h2>

@if ($medicamento->stocks->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>ID del Stock</th>
                <th>Cantidad</th> <!-- Ahora accesible vía 'pivot' -->
                <th>precio</th> <!-- Campo adicional de ejemplo -->
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamento->stocks as $stock)
                <tr>
                    <td>{{ $stock->stock_id}}</td>
                    <td>{{ $stock->pivot->cantidad }}</td> <!-- Usamos el 'pivot' para la cantidad -->
                    <td>{{ $stock->pivot->precio ?? 'N/A' }}</td> <!-- Acceso desde la tabla pivote -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Este medicamento no tiene stock disponible.</p>
@endif
