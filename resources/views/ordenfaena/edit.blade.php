<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar Orden de Faena</h1>

        <form action="{{ route('ordenfaena.update', $ordenfaena->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            @method('PUT')

            <!-- Serial UMAN (solo lectura) -->
            <div class="col-md-4">
                <label class="form-label">Serial UMAN</label>
                <input type="text" value="{{ $ordenfaena->uman_serial }}" disabled class="form-control bg-light text-muted">
                <input type="hidden" name="uman_serial" value="{{ $ordenfaena->uman_serial }}">
            </div>

            <!-- Técnico -->
            <div class="col-md-4">
                <label for="tecnico_id" class="form-label">Técnico</label>
                <select name="tecnico_id" id="tecnico_id" class="form-select @error('tecnico_id') is-invalid @enderror">
                    <option value="">-- Selecciona un técnico --</option>
                    @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}" {{ old('tecnico_id', $ordenfaena->tecnico_id) == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Faena -->
            <div class="col-md-4">
                <label for="faena_id" class="form-label">Faena</label>
                <select name="faena_id" id="faena_id" class="form-select @error('faena_id') is-invalid @enderror">
                    <option value="">-- Selecciona una faena --</option>
                    @foreach ($faenas as $faena)
                        <option value="{{ $faena->id }}" {{ old('faena_id', $ordenfaena->faena_id) == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha de trabajo -->
            <div class="col-md-4">
                <label for="fecha_trabajo" class="form-label">Fecha de Trabajo</label>
                <input type="date" name="fecha_trabajo" id="fecha_trabajo" class="form-control @error('fecha_trabajo') is-invalid @enderror"
                    value="{{ old('fecha_trabajo', $ordenfaena->fecha_trabajo) }}">
                @error('fecha_trabajo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Equipo Minero -->
            <div class="col-md-4">
                <label for="equipo_minero_id" class="form-label">Equipo Minero</label>
                <select name="equipo_minero_id" id="equipo_minero_id"
                    class="form-select select2 @error('equipo_minero_id') is-invalid @enderror" required>
                    <option value="">-- Selecciona un Equipo Minero --</option>
                    @foreach($equiposMinero as $equipoMinero)
                        <option value="{{ $equipoMinero->id }}"
                            {{ old('equipo_minero_id', $ordenfaena->equipo_minero_id ?? '') == $equipoMinero->id ? 'selected' : '' }}>
                            {{ $equipoMinero->name }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_minero_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Estado -->
            <div class="col-md-4">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror">
                    <option value="">-- Selecciona el estado --</option>
                    <option value="pendiente" {{ old('estado', $ordenfaena->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ old('estado', $ordenfaena->estado) == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="completado" {{ old('estado', $ordenfaena->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cambio UMAN -->
            <div class="col-md-4">
                <label for="cambio_uman" class="form-label">¿Cambio de UMAN?</label>
                <select name="cambio_uman" id="cambio_uman" class="form-select @error('cambio_uman') is-invalid @enderror">
                    <option value="0" {{ old('cambio_uman', $ordenfaena->cambio_uman) == false ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('cambio_uman', $ordenfaena->cambio_uman) == true ? 'selected' : '' }}>Sí</option>
                </select>
                @error('cambio_uman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Serial Nueva UMAN -->
            <div class="col-md-4">
                <label for="serial_nueva_uman" class="form-label">Serial Nueva UMAN</label>
                <input type="text" name="serial_nueva_uman" id="serial_nueva_uman"
                    class="form-control @error('serial_nueva_uman') is-invalid @enderror"
                    value="{{ old('serial_nueva_uman', $ordenfaena->serial_nueva_uman) }}">
                @error('serial_nueva_uman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Falla -->
            <div class="col-md-4">
                <label for="falla" class="form-label">Falla</label>
                <input type="text" name="falla" id="falla" class="form-control @error('falla') is-invalid @enderror"
                    value="{{ old('falla', $ordenfaena->falla) }}">
                @error('falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción Falla -->
            <div class="col-md-6">
                <label for="descripcion_falla" class="form-label">Descripción de la Falla</label>
                <textarea name="descripcion_falla" id="descripcion_falla" rows="3"
                    class="form-control @error('descripcion_falla') is-invalid @enderror">{{ old('descripcion_falla', $ordenfaena->descripcion_falla) }}</textarea>
                @error('descripcion_falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="col-md-6">
                <label for="imagen" class="form-label">Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                @if ($ordenfaena->imagen)
                    <small class="text-muted">Imagen actual: <a href="{{ asset('storage/' . $ordenfaena->imagen) }}" target="_blank">ver</a></small>
                @endif
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success btn-sm">
                    💾 Actualizar Orden de Faena
                </button>
            </div>
        </form>
    </div>
</x-app-layout>