<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Detalle del Equipo Minero</h1>

        <div class="row g-3">
            <!-- Nombre -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Nombre</label>
                <p class="form-control-plaintext">{{ $equiposminero->name }}</p>
            </div>

            <!-- Modelo -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Modelo</label>
                <p class="form-control-plaintext">{{ $equiposminero->modelo }}</p>
            </div>

            <!-- Tipo -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Tipo</label>
                <p class="form-control-plaintext">{{ $equiposminero->tipo }}</p>
            </div>

            <!-- Faena -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Faena</label>
                <p class="form-control-plaintext">{{ $equiposminero->faena->name ?? 'Sin asignar' }}</p>
            </div>

            <!-- Serial UMAN -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Serial UMAN</label>
                <p class="form-control-plaintext">{{ $equiposminero->uman_serial ?? 'N/A' }}</p>
            </div>

            <!-- Posición UMAN -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Posición UMAN</label>
                <p class="form-control-plaintext">{{ $equiposminero->posicion_equipo_uman ?? 'N/A' }}</p>
            </div>

            <!-- DCDC -->
            <div class="col-md-6">
                <label class="form-label fw-bold">DCDC</label>
                <p class="form-control-plaintext">{{ $equiposminero->dcdc ? 'Sí' : 'No' }}</p>
            </div>

            <!-- Puesta a tierra -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Puesta a tierra</label>
                <p class="form-control-plaintext">{{ $equiposminero->puesta_tierra ? 'Sí' : 'No' }}</p>
            </div>

            <!-- Antena RF -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Antena RF (mt)</label>
                <p class="form-control-plaintext">{{ $equiposminero->antena_rf_mt ?? 'N/A' }}</p>
            </div>

            <!-- Antena GPS -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Antena GPS (mt)</label>
                <p class="form-control-plaintext">{{ $equiposminero->antena_gps_mt ?? 'N/A' }}</p>
            </div>

            <!-- HMI -->
            <div class="col-md-6">
                <label class="form-label fw-bold">HMI (mt)</label>
                <p class="form-control-plaintext">{{ $equiposminero->hmi_mt ?? 'N/A' }}</p>
            </div>

            <!-- Cable alimentación -->
            <div class="col-md-6">
                <label class="form-label fw-bold">Cable alimentación (mt)</label>
                <p class="form-control-plaintext">{{ $equiposminero->cable_alimentacion_mt ?? 'N/A' }}</p>
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