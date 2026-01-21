<div class="row g-3">

    @csrf

    <!-- Serial UMAN -->
    <div>
        <label for="equipo_uman_serial" class="block font-semibold">Serial UMAN*</label>

        @if(isset($ordenlaboratorio))
            <!-- En EDIT solo mostramos el texto -->
            <input type="text" 
                class="w-full px-2 py-1 border rounded bg-gray-100" 
                value="{{ $ordenlaboratorio->equipo_uman_serial }}" 
                readonly>
            <input type="hidden" name="equipo_uman_serial" value="{{ $ordenlaboratorio->equipo_uman_serial }}">
        @else
            <!-- En CREATE mostramos el select con búsqueda -->
            <select name="equipo_uman_serial" id="equipo_uman_serial"
                class="w-full px-2 py-1 border rounded select2 @error('equipo_uman_serial') is-invalid @enderror">
                <option value="">Buscar Serial UMAN...</option>
                @foreach($equiposUMAN as $serial => $label)
                    <option value="{{ $serial }}" {{ old('equipo_uman_serial') == $serial ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('equipo_uman_serial')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        @endif
    </div>

    @push('scripts')
    <script>
    $(document).ready(function() {
        $('#equipo_uman_serial').on('change', function() {
            let serial = $(this).val();
            if(serial) {
                let url = "{{ route('equiposuman.getData', ':serial') }}".replace(':serial', serial);
                $.get(url, function(data) {
                    $('#version_sd_id').val(data.version_sd_id);
                    $('#pcb_uman_id').val(data.pcb_uman_id);
                    $('#uman_version_id').val(data.uman_version_id);
                    $('#rpi_version').val(data.rpi_version);
                    $('#ups_version').val(data.ups_version);
                    $('#bam').val(data.bam ? '1' : '0');
		            toggleBamFields();
                    $('#marca_bam').val(data.marca_bam);
                    $('#chip').val(data.chip);
                    $('#imei_chip').val(data.imei_chip);
                    $('#estado').val(data.estado);
                    $('#modelo_uman').val(data.modelo_uman);
                });
            }
        });
    });
    </script>
    @endpush

    <!-- Técnico -->
    <div>
        <label for="tecnico_id" class="block font-semibold">Técnico*</label>
        <select name="tecnico_id" id="tecnico_id"
            class="w-full px-2 py-1 border rounded select2 @error('tecnico_id') is-invalid @enderror">
            <option value="">-- Selecciona un técnico --</option>
            @foreach($tecnicos as $id => $name)
                <option value="{{ $id }}" {{ old('tecnico_id', $ordenlaboratorio->tecnico_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('tecnico_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Faena -->
    <div>
        <label for="faena_id" class="block font-semibold">Faena*</label>
        <select name="faena_id" id="faena_id"
            class="w-full px-2 py-1 border rounded select2 @error('faena_id') is-invalid @enderror">
            <option value="">-- Selecciona una faena --</option>
            @foreach($faenas as $id => $name)
                <option value="{{ $id }}" {{ old('faena_id', $ordenlaboratorio->faena_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('faena_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Equipo Minero -->
    <div>
        <label for="equipo_minero_id" class="block font-semibold">Equipo Minero</label>
        <select name="equipo_minero_id" id="equipo_minero_id"
            class="w-full px-2 py-1 border rounded select2 @error('equipo_minero_id') is-invalid @enderror">
            <option value="">-- Selecciona un equipo minero --</option>
            @foreach($equiposMineros as $id => $name)
                <option value="{{ $id }}" {{ old('equipo_minero_id', $ordenlaboratorio->equipo_minero_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('equipo_minero_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
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
    <div>
        <label for="estado" class="block font-semibold">Estado*</label>
        <select name="estado" id="estado"
            class="w-full px-2 py-1 border rounded @error('estado') is-invalid @enderror">
            <option value="">-- Selecciona el estado --</option>
            <option value="pendiente" {{ old('estado', $ordenlaboratorio->estado ?? '') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en_proceso" {{ old('estado', $ordenlaboratorio->estado ?? '') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
            <option value="completado" {{ old('estado', $ordenlaboratorio->estado ?? '') == 'completado' ? 'selected' : '' }}>Completado</option>
        </select>
        @error('estado')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión SD -->
    <div>
        <label for="version_sd_id" class="form-label">Versión SD*</label>
        <select name="version_sd_id" id="version_sd_id"
            class="w-full px-2 py-1 border rounded @error('version_sd_id') is-invalid @enderror">
            <option value="">Seleccione versión SD</option>
            @foreach ($versionSds as $id => $version)
                <option value="{{ $id }}"
                    {{ old('version_sd_id', $ordenlaboratorio->version_sd_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $version }}
                </option>
            @endforeach
        </select>
        @error('version_sd_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- PCB UMAN -->
    <div>
        <label for="pcb_uman_id" class="form-label">PCB UMAN*</label>
        <select name="pcb_uman_id" id="pcb_uman_id"
            class="w-full px-2 py-1 border rounded @error('pcb_uman_id') is-invalid @enderror">
            <option value="">Seleccione PCB UMAN</option>
            @foreach ($pcbUmans as $id => $name)
                <option value="{{ $id }}"
                    {{ old('pcb_uman_id', $ordenlaboratorio->pcb_uman_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('pcb_uman_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión UMAN -->
    <div>
        <label for="uman_version_id" class="block font-semibold">Versión UMAN*</label>
        <select name="uman_version_id" id="uman_version_id"
            class="w-full px-2 py-1 border rounded @error('uman_version_id') is-invalid @enderror">
            <option value="">Seleccione versión UMAN</option>
            @foreach ($umanVersions as $id => $name)
                <option value="{{ $id }}"
                    {{ old('uman_version_id', $ordenlaboratorio->uman_version_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('uman_version_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- BAM -->
    <div>
        <label for="bam" class="block font-semibold">BAM</label>
        <select name="bam" id="bam" class="w-full px-2 py-1 border rounded">
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>
    </div>

    <!-- Marca BAM -->
    <div id="marcaBamField" style="display:none;">
        <label for="marca_bam">Marca BAM*</label>
        <input type="text" name="marca_bam" id="marca_bam">
    </div>

    <!-- Chip -->
    <div id="chipField" style="display:none;">
        <label for="chip">Chip*</label>
        <input type="text" name="chip" id="chip">
    </div>

    <!-- IMEI Chip -->
    <div id="imeiChipField" style="display:none;">
        <label for="imei_chip">IMEI Chip*</label>
        <input type="text" name="imei_chip" id="imei_chip">
    </div>

            <!-- Datos técnicos Tecnicos texto -->
    @foreach([
        'ups_version' => 'Versión UPS',
        'rpi_version' => 'Versión Raspberry',
    ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
            <input type="text" name="{{ $field }}" id="{{ $field }}"
                class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                value="{{ old($field, $ordenlaboratorio->$field ?? '') }}">
            @error($field)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    <!-- Falla -->
    <div>
        <label for="falla_id" class="block font-semibold">Falla*</label>
        <select name="falla_id" id="falla_id"
            class="w-full px-2 py-1 border rounded @error('falla_id') is-invalid @enderror">
            <option value="">-- Selecciona una falla --</option>
            @foreach($fallas as $id => $name)
                <option value="{{ $id }}"
                    {{ old('falla_id', $ordenlaboratorio->falla_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('falla_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Descripción Falla -->
    <div class="col-span-2">
        <label for="descripcion_falla" class="block font-semibold">Descripción de la Falla</label>
        <textarea name="descripcion_falla" id="descripcion_falla"
            class="w-full px-2 py-1 border rounded @error('descripcion_falla') is-invalid @enderror"
            rows="3">{{ old('descripcion_falla', $ordenlaboratorio->descripcion_falla ?? '') }}</textarea>
        @error('descripcion_falla')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Detalle Reparación -->
    <div class="col-span-2">
        <label for="detalle_reparacion" class="block font-semibold">Detalle de la Reparación</label>
        <textarea name="detalle_reparacion" id="detalle_reparacion"
            class="w-full px-2 py-1 border rounded @error('detalle_reparacion') is-invalid @enderror"
            rows="3">{{ old('detalle_reparacion', $ordenlaboratorio->detalle_reparacion ?? '') }}</textarea>
        @error('detalle_reparacion')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="horas_reparacion" class="block font-semibold">Horas Reparación</label>
        <input type="number" name="horas_reparacion" id="horas_reparacion"
            class="w-full px-2 py-1 border rounded @error('horas_reparacion') is-invalid @enderror"
            value="{{ old('horas_reparacion', $ordenlaboratorio->horas_reparacion ?? '') }}">
        @error('horas_reparacion')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

            <!-- Fechas -->
    @foreach([
        'fecha_ingreso' => 'Fecha de Ingreso*',
        'fecha_reparacion' => 'Fecha de Reparación'
    ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
            <input type="date" name="{{ $field }}" id="{{ $field }}"
                class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                value="{{ old($field, $ordenlaboratorio->$field ?? '') }}">
            @error($field)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
    
    <!-- Script para mostrar campos de bam -->
    <script>
        const bamSelect     = document.getElementById('bam');
        const marcaBamField = document.getElementById('marcaBamField');
        const chipField     = document.getElementById('chipField');
        const imeiChipField = document.getElementById('imeiChipField');

        function toggleBamFields() {
            if (bamSelect.value === '1') {
                marcaBamField.style.display = 'block';
                chipField.style.display     = 'block';
                imeiChipField.style.display = 'block';
            } else {
                marcaBamField.style.display = 'none';
                chipField.style.display     = 'none';
                imeiChipField.style.display = 'none';

                // opcional: limpiar valores
                document.getElementById('marca_bam').value = '';
                document.getElementById('chip').value = '';
                document.getElementById('imei_chip').value = '';
            }
        }

        bamSelect.addEventListener('change', toggleBamFields);
        window.addEventListener('DOMContentLoaded', toggleBamFields);
    </script>

    
</div>