<x-app-layout>

    @section('title', 'Detalle de Conexión')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">🔎 Detalle de conexión #{{ $conexion->id }}</h2>

        <div class="card">
            <div class="card-header fw-bold">
                Tipo: {{ ucfirst($conexion->tipo) }}
            </div>
            <div class="card-body">
                <p><strong>Faena:</strong> {{ $conexion->faena?->name ?? 'Sin asignar' }}</p>

                {{-- Mostrar campos según tipo --}}
                @if($conexion->tipo === 'wifi' || $conexion->tipo === 'ethernet')
                    <p><strong>IP:</strong> {{ $conexion->ip ?? '-' }}</p>
                    <p><strong>Gateway:</strong> {{ $conexion->gateway ?? '-' }}</p>
                    <p><strong>Netmask:</strong> {{ $conexion->netmask ?? '-' }}</p>
                @elseif($conexion->tipo === 'bam')
                    <p><strong>Operador:</strong> {{ $conexion->operador ?? '-' }}</p>
                    <p><strong>APN:</strong> {{ $conexion->apn ?? '-' }}</p>
                    <p><strong>APN Usuario:</strong> {{ $conexion->apn_user ?? '-' }}</p>
                    <p><strong>APN Password:</strong> {{ $conexion->apn_pass ?? '-' }}</p>
                @endif
            </div>
        </div>

        <div class="mt-4 text-end">
            <a href="{{ route('conexiones.index') }}" class="btn btn-secondary">⬅️ Volver</a>
            <a href="{{ route('conexiones.edit', $conexion->id) }}" class="btn btn-warning">✏️ Editar</a>
        </div>
    </div>

</x-app-layout>