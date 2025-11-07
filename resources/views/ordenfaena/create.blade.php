<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">📋 Ingreso de Orden de Faena</h1>

        <form action="{{ route('ordenfaena.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf

            {{-- Técnico --}}
            <div class="col-md-4">
                <label for="tecnico_id" class="form-label">Técnico</label>
                <select name="tecnico_id" id="tecnico_id"
                    class="form-select select2 @error('tecnico_id') is-invalid @enderror" required>
                    <option value="">-- Selecciona un técnico --</option>
                    @foreach($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Faena --}}
            <div class="col-md-4">
                <label for="faena_id" class="form-label">Faena</label>
                <select name="faena_id" id="faena_id"
                    class="form-select select2 @error('faena_id') is-invalid @enderror" required>
                    <option value="">-- Selecciona una faena --</option>
                    @foreach($faenas as $faena)
                        <option value="{{ $faena->id }}" {{ old('faena_id') == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Fecha de trabajo --}}
            <div class="col-md-4">
                <label for="fecha_trabajo" class="form-label">Fecha de Trabajo</label>
                <input type="date" name="fecha_trabajo" id="fecha_trabajo"
                    class="form-control @error('fecha_trabajo') is-invalid @enderror"
                    value="{{ old('fecha_trabajo') }}" required>
                @error('fecha_trabajo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Equipo Minero --}}
            <div class="col-md-4">
                <label for="equipo_minero_id" class="form-label">Equipo Minero</label>
                <select name="equipo_minero_id" id="equipo_minero_id"
                    class="form-select select2 @error('equipo_minero_id') is-invalid @enderror" required>
                    <option value="">-- Selecciona un Equipo Minero --</option>
                    @foreach($equiposMinero as $equipoMinero)
                        <option value="{{ $equipoMinero->id }}" {{ old('equipo_minero_id') == $equipoMinero->id ? 'selected' : '' }}>
                            {{ $equipoMinero->name }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_minero_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Estado --}}
            <div class="col-md-4">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado"
                    class="form-select @error('estado') is-invalid @enderror" required>
                    <option value="">-- Selecciona el estado --</option>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Serial UMAN --}}
            <div class="col-md-4">
                <label for="uman_serial" class="form-label">Serial UMAN</label>
                <select name="uman_serial" id="uman_serial"
                    class="form-select select2 @error('uman_serial') is-invalid @enderror" required>
                    <option value="">-- Selecciona un serial --</option>
                    @foreach($equiposUman as $equipoUman)
                        <option value="{{ $equipoUman->serial }}" {{ old('uman_serial') == $equipoUman->serial ? 'selected' : '' }}>
                            {{ $equipoUman->serial }}
                        </option>
                    @endforeach
                </select>
                @error('uman_serial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div x-data="{ cambioUman: '{{ old('cambio_uman', 0) }}' }" class="row g-3">
                {{-- ¿Hubo cambio de UMAN? --}}
                <div class="col-md-4">
                    <label for="cambio_uman" class="form-label">¿Cambio de UMAN?</label>
                    <select name="cambio_uman" id="cambio_uman"
                        class="form-select @error('cambio_uman') is-invalid @enderror"
                        x-model="cambioUman" required>
                        <option value="0">No</option>
                        <option value="1">Sí</option>
                    </select>
                    @error('cambio_uman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nuevo serial UMAN (solo si cambioUman == 1) --}}
                <div class="col-md-4" x-show="cambioUman == 1" x-transition>
                    <label for="serial_nueva_uman" class="form-label">Nuevo Serial UMAN</label>
                    <select name="serial_nueva_uman" id="serial_nueva_uman"
                        class="form-select select2 @error('serial_nueva_uman') is-invalid @enderror">
                        <option value="">-- Selecciona nuevo serial --</option>
                        @foreach($equiposUman as $equipoUman)
                            <option value="{{ $equipoUman->serial }}" {{ old('serial_nueva_uman') == $equipoUman->serial ? 'selected' : '' }}>
                                {{ $equipoUman->serial }}
                            </option>
                        @endforeach
                    </select>
                    @error('serial_nueva_uman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Falla --}}
            <div class="col-md-6">
                <label for="falla" class="form-label">Falla</label>
                <input type="text" name="falla" id="falla"
                    class="form-control @error('falla') is-invalid @enderror"
                    value="{{ old('falla') }}">
                @error('falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Descripción de la falla --}}
            <div class="col-md-6">
                <label for="descripcion_falla" class="form-label">Descripción de la Falla</label>
                <textarea name="descripcion_falla" id="descripcion_falla"
                    class="form-control @error('descripcion_falla') is-invalid @enderror"
                    rows="3">{{ old('descripcion_falla') }}</textarea>
                @error('descripcion_falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Imagen --}}
            <div class="col-md-6">
                <label for="imagen" class="form-label">Imagen (opcional)</label>
                <input type="file" name="imagen" id="imagen"
                    class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botón --}}
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    💾 Guardar Orden de Faena
                </button>
            </div>
        </form>
    </div>
</x-app-layout>