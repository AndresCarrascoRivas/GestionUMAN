<x-app-layout>

    @section('title', 'Detalle de Faena')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4"> Faena: {{ $faena->name }}</h2>

        <h4 class="mb-3">🌐 Conexiones asociadas</h4>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faena->conexiones as $conexion)
                    <tr>
                        <td>
                            <a href="{{ route('conexiones.show', $conexion->id) }}"
                               class="fw-bold text-primary text-decoration-none">
                                {{ $conexion->id }}
                            </a>
                        </td>
                        <td>{{ ucfirst($conexion->tipo) }}</td>
                        <td>
                            @if($conexion->tipo === 'wifi' || $conexion->tipo === 'ethernet')
                                <div><strong>IP:</strong> {{ $conexion->ip ?? '-' }}</div>
                                <div><strong>Gateway:</strong> {{ $conexion->gateway ?? '-' }}</div>
                                <div><strong>Netmask:</strong> {{ $conexion->netmask ?? '-' }}</div>
                            @elseif($conexion->tipo === 'bam')
                                <div><strong>Operador:</strong> {{ $conexion->operador ?? '-' }}</div>
                                <div><strong>APN:</strong> {{ $conexion->apn ?? '-' }}</div>
                                <div><strong>Usuario:</strong> {{ $conexion->apn_user ?? '-' }}</div>
                                <div><strong>Password:</strong> {{ $conexion->apn_pass ?? '-' }}</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('conexiones.edit', $conexion->id) }}" class="btn btn-sm btn-warning">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('conexiones.destroy', $conexion->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta conexión?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay conexiones registradas para esta faena.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4 text-end">
            <a href="{{ route('faenas.index') }}" class="btn btn-secondary">⬅️ Volver</a>
            <a href="{{ route('faenas.edit', $faena->id) }}" class="btn btn-warning">✏️ Editar Faena</a>
        </div>
    </div>

</x-app-layout>