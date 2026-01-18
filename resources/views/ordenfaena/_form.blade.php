<div class="row g-3">
    @csrf

    <!-- Técnico -->
    <div>
        <label for="tecnico_id" class="block font-semibold">Técnico</label>
        @if(isset($ordenfaena))
            <input type="text" class="w-full px-2 py-1 border rounded bg-gray-100"
                value="{{ $ordenfaena->tecnico->name }}" readonly>
            <input type="hidden" name="tecnico_id" value="{{ $ordenfaena->tecnico_id }}">
        @else
            <select name="tecnico_id" id="tecnico_id"
                class="form-select select2 @error('tecnico_id') is-invalid @enderror" required>
                <option value="">-- Selecciona un técnico --</option>
                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}"
                        {{ old('tecnico_id', $ordenfaena->tecnico_id ?? '') == $tecnico->id ? 'selected' : '' }}>
                        {{ $tecnico->name }}
                    </option>
                @endforeach
            </select>
            @error('tecnico_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        @endif
    </div>

    <!-- Faena -->
    <div>
        <label for="faena_id" class="block font-semibold">Faena</label>
        @if(isset($ordenfaena))
            <input type="text" class="w-full px-2 py-1 border rounded bg-gray-100"
                value="{{ $ordenfaena->faena->name }}" readonly>
            <input type="hidden" name="faena_id" value="{{ $ordenfaena->faena_id }}">
        @else
            <select name="faena_id" id="faena_id"
                class="w-full px-2 py-1 border rounded select2 @error('faena_id') is-invalid @enderror">
                <option value="">-- Selecciona una faena --</option>
                @foreach($faenas as $faena)
                    <option value="{{ $faena->id }}" 
                        {{ old('faena_id', $ordenfaena->faena_id ?? '') == $faena->id ? 'selected' : '' }}>
                        {{ $faena->name }}
                    </option>
                @endforeach
            </select>
            @error('faena_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        @endif
    </div>

    <!-- Fecha de trabajo -->
    <div>
        <label for="fecha_trabajo" class="block font-semibold">Fecha de trabajo</label>
        <input type="date" name="fecha_trabajo" id="fecha_trabajo"
            class="w-full px-2 py-1 border rounded @error('fecha_trabajo') is-invalid @enderror"
            value="{{ old('fecha_trabajo', $ordenfaena->fecha_trabajo ?? '') }}" required>
        @error('fecha_trabajo')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Equipo Minero -->
    <div>
        <label for="equipo_minero_id" class="block font-semibold">Equipo Minero</label>
        @if(isset($ordenfaena))
            <input type="text" class="w-full px-2 py-1 border rounded bg-gray-100"
                value="{{ $ordenfaena->equipoMinero->name }}" readonly>
            <input type="hidden" name="equipo_minero_id" value="{{ $ordenfaena->equipo_minero_id }}">
        @else
            <select name="equipo_minero_id" id="equipo_minero_id"
                class="w-full px-2 py-1 border rounded select2 @error('equipo_minero_id') is-invalid @enderror" required>
                <option value="">Buscar Equipo Minero...</option>
                @foreach($equiposMinero as $equipo)
                    <option value="{{ $equipo->id }}" {{ old('equipo_minero_id', $ordenfaena->equipo_minero_id ?? '') == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->name }}
                    </option>
                @endforeach
            </select>
            @error('equipo_minero_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        @endif
    </div>

        <!-- Script -->
    @push('scripts')
    <script>
        $(document).ready(function() {
            // inicializar select2 si lo usas
            $('#faena_id, #equipo_minero_id').select2();

            // cuando cambie la faena
            $('#faena_id').on('change', function() {
                let faenaId = $(this).val();

                if(faenaId) {
                    $.ajax({
                        url: '/equipos-mineros/' + faenaId,
                        type: 'GET',
                        success: function(data) {
                            let $equipoSelect = $('#equipo_minero_id');
                            $equipoSelect.empty();
                            $equipoSelect.append('<option value="">-- Selecciona un equipo minero --</option>');

                            $.each(data, function(id, name) {
                                $equipoSelect.append('<option value="'+id+'">'+name+'</option>');
                            });

                            // refrescar select2
                            $equipoSelect.trigger('change');
                        }
                    });
                } else {
                    // si no hay faena seleccionada, limpiar equipos
                    $('#equipo_minero_id').empty()
                        .append('<option value="">-- Selecciona un equipo minero --</option>')
                        .trigger('change');
                }
            });
        });
    </script>
    @endpush

    <!-- Estado -->
    <div class="col-md-4">
        <label for="estado" class="block font-semibold">Estado</label>
        <select name="estado" id="estado"
            class="w-full px-2 py-1 border rounded select @error('estado') is-invalid @enderror" required>
            <option value="">-- Selecciona el estado --</option>
            <option value="pendiente" {{ old('estado', $ordenfaena->estado ?? '') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en_proceso" {{ old('estado', $ordenfaena->estado ?? '') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
            <option value="completado" {{ old('estado', $ordenfaena->estado ?? '') == 'completado' ? 'selected' : '' }}>Completado</option>
        </select>
        @error('estado')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Serial UMAN -->
    <div>
        <label for="uman_serial" class="block font-semibold">Serial UMAN</label>
        @if(isset($ordenfaena))
            <input type="text" class="w-full px-2 py-1 border rounded bg-gray-100"
                value="{{ $ordenfaena->uman_serial }}" readonly>
            <input type="hidden" name="uman_serial" value="{{ $ordenfaena->uman_serial }}">
        @else
            <select name="uman_serial" id="uman_serial"
                class="w-full px-2 py-1 border rounded select2 @error('uman_serial') is-invalid @enderror" required>
                <option value="">Buscar Serial UMAN...</option>
                @foreach($equiposUman as $uman)
                    <option value="{{ $uman->serial }}" {{ old('uman_serial', $ordenfaena->uman_serial ?? '') == $uman->serial ? 'selected' : '' }}>
                        {{ $uman->serial }}
                    </option>
                @endforeach
            </select>
            @error('uman_serial')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        @endif
    </div>

    <!-- Cambio UMAN -->
    <div class="form-check mt-2">
        <input type="checkbox" name="cambio_uman" id="cambio_uman" value="1"
            class="form-check-input" {{ old('cambio_uman', $ordenfaena->cambio_uman ?? false) ? 'checked' : '' }}>
        <label for="cambio_uman" class="form-check-label">¿Cambio de UMAN?</label>
    </div>

    <!-- Serial Nueva UMAN -->
    <div id="serial_nueva_uman_container" class="{{ old('cambio_uman', $ordenfaena->cambio_uman ?? false) ? '' : 'd-none' }}">
        <label for="serial_nueva_uman" class="block font-semibold">Serial Nueva UMAN</label>
        <select name="serial_nueva_uman" id="serial_nueva_uman"
            class="form-select select2 @error('serial_nueva_uman') is-invalid @enderror">
            <option value="">Seleccione un nuevo serial</option>
            @foreach($equiposUman as $uman)
                <option value="{{ $uman->serial }}"
                    {{ old('serial_nueva_uman', $ordenfaena->serial_nueva_uman ?? '') == $uman->serial ? 'selected' : '' }}>
                    {{ $uman->serial }}
                </option>
            @endforeach
        </select>
        @error('serial_nueva_uman')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Falla -->
    <div>
        <label for="falla" class="block font-semibold">Falla</label>
        <input type="text" name="falla" id="falla"
            class="w-full px-2 py-1 border rounded @error('falla') is-invalid @enderror"
            value="{{ old('falla', $ordenfaena->falla ?? '') }}">
        @error('falla')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Descripción de la falla -->
    <div>
        <label for="descripcion_falla" class="block font-semibold">Descripción de la falla</label>
        <textarea name="descripcion_falla" id="descripcion_falla"
            class="w-full px-2 py-1 border rounded @error('descripcion_falla') is-invalid @enderror"
            rows="3">{{ old('descripcion_falla', $ordenfaena->descripcion_falla ?? '') }}</textarea>
        @error('descripcion_falla')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Imagen -->
    <div>
        <label for="imagen" class="block font-semibold">Imagen</label>
        <input type="file" name="imagen" id="imagen" accept="image/*"
            class="w-full px-2 py-1 border rounded @error('imagen') is-invalid @enderror">
        @error('imagen')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>


    {{-- Script para mostrar/ocultar campo de nueva UMAN --}}
    <script>
        document.getElementById('cambio_uman').addEventListener('change', function() {
            const container = document.getElementById('serial_nueva_uman_container');
            container.classList.toggle('d-none', !this.checked);
        });
    </script>
