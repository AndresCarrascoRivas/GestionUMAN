<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Detalle del Equipo Minero</h1>

        <div class="row g-3">
            <!-- Nombre del equipo minero -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Nombre</label>
                <p class="form-control-plaintext">{{ $equiposminero->name }}</p>
            </div>

            <!-- Faena asociada -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Faena</label>
                <p class="form-control-plaintext">{{ $equiposminero->faena->name ?? 'Sin asignar' }}</p>
            </div>

            <!-- Largo antena RF -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Antena RF</label>
                <p class="form-control-plaintext">{{ $equiposminero->antena_rf ?? 'N/A' }}</p>
            </div>

            <!-- Largo antena GPS -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Antena GPS</label>
                <p class="form-control-plaintext">{{ $equiposminero->antena_gps ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="mt-4">
            <a href="{{ route('equiposmineros.index') }}" class="btn btn-secondary btn-sm">⬅️ Volver al listado</a>
            <a href="{{ route('equiposmineros.edit', $equiposminero) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
            <form action="{{ route('equiposmineros.destroy', $equiposminero) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Está seguro de eliminar este equipo minero?')">
                    🗑️ Eliminar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>