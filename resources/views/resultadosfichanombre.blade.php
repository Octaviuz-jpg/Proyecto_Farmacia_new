<h1>Ficha de Resultados de la Búsqueda</h1>

@if ($resultados->isEmpty())
    <p style="color: red; font-weight: bold;">No se encontraron trabajadores con ese nombre.</p>
@else
    @foreach ($resultados as $trabajador)
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #f9f9f9;">
            <h2 style="color: #333;">{{ $trabajador->nombre }} {{ $trabajador->apellido }}</h2>
            <p><strong>Teléfono:</strong> {{ $trabajador->telefono ?? 'No disponible' }}</p>
            <p><strong>Correo:</strong> {{ $trabajador->correo ?? 'No disponible' }}</p>
            
            <!-- Información de Cargos -->
            <h3 style="color: #555;">Cargos:</h3>
            @if ($trabajador->cargos->isEmpty())
                <p>No tiene cargos registrados.</p>
            @else
                <ul>
                    @foreach ($trabajador->cargos as $cargo)
                        <li>
                            <strong>{{ $cargo->cargo }}</strong><br>
                            <span>Inicio: {{ $cargo->pivot->tiempo_inicio ?? '¿No ha comenzado?' }}</span><br>
                            <span>Fin: {{ $cargo->pivot->tiempo_final ?? '¿No ha terminado?' }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Información de Sucursales -->
            <h3 style="color: #555;">Sucursales:</h3>
            @if ($trabajador->sucursales->isEmpty())
                <p>No tiene sucursales registradas.</p>
            @else
                <ul>
                    @foreach ($trabajador->sucursales as $sucursal)
                        <li>
                            <strong>{{ $sucursal->nombre }}</strong><br>
                            <span>Entrada: {{ $sucursal->pivot->fecha_entrada ?? 'Sin entrada' }}</span><br>
                            <span>Salida: {{ $sucursal->pivot->fecha_salida ?? 'Sin salida' }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
@endif
