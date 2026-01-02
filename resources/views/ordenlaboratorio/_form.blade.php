<div class="row g-3">

    @csrf

    <!-- Serial UMAN -->
    <div>
        <label for="equipo_uman_serial" class="block font-semibold">Serial UMAN</label>

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
                    $('#pcb_uman_id').val(data.pcb_uman_id);
                    $('#uman_version_id').val(data.uman_version_id);
                    $('#rpi_version').val(data.rpi_version);
                    $('#ups_version').val(data.ups_version);
                    $('#bam').val(data.bam ? 1 : 0);
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
        <label for="tecnico_id" class="block font-semibold">Técnico</label>
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
        <label for="faena_id" class="block font-semibold">Faena</label>
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

    <!-- Estado -->
    <div>
        <label for="estado" class="block font-semibold">Estado</label>
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

    <!-- PCB UMAN -->
    <div class="col-md-4">
        <label for="pcb_uman_id" class="form-label">PCB UMAN</label>
        <select name="pcb_uman_id" id="pcb_uman_id"
            class="w-full px-2 py-1 border rounded @error('pcb_uman_id') is-invalid @enderror">
            <option value="">Seleccione PCB UMAN</option>
            @foreach($pcbUmans as $pcb)
                <option value="{{ $pcb->id }}"
                    {{ old('pcb_uman_id', $ordenlaboratorio->pcb_uman_id ?? '') == $pcb->id ? 'selected' : '' }}>
                    {{ $pcb->name }}
                </option>
            @endforeach
        </select>
        @error('pcb_uman_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión UMAN -->
    <div>
        <label for="uman_version_id" class="block font-semibold">Versión UMAN</label>
        <select name="uman_version_id" id="uman_version_id"
            class="w-full px-2 py-1 border rounded @error('uman_version_id') is-invalid @enderror">
            <option value="">Seleccione versión UMAN</option>
            @foreach($umanVersions as $version)
                <option value="{{ $version->id }}"
                    {{ old('uman_version_id', $ordenlaboratorio->uman_version_id ?? '') == $version->id ? 'selected' : '' }}>
                    {{ $version->name }}
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
        <select name="bam" id="bam"
            class="w-full px-2 py-1 border rounded @error('bam') is-invalid @enderror">
            <option value="0" {{ old('bam', $ordenlaboratorio->bam ?? 0) == 0 ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('bam', $ordenlaboratorio->bam ?? 0) == 1 ? 'selected' : '' }}>Sí</option>
        </select>
        @error('bam')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Marca BAM -->
    <div>
        <label for="marca_bam" class="block font-semibold">Marca BAM</label>
        <input type="text" name="marca_bam" id="marca_bam"
            class="w-full px-2 py-1 border rounded @error('marca_bam') is-invalid @enderror"
            value="{{ old('marca_bam', $ordenlaboratorio->marca_bam ?? '') }}">
        @error('marca_bam')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Chip -->
    <div>
        <label for="chip" class="block font-semibold">Chip</label>
        <input type="text" name="chip" id="chip"
            class="w-full px-2 py-1 border rounded @error('chip') is-invalid @enderror"
            value="{{ old('chip', $ordenlaboratorio->chip ?? '') }}">
        @error('chip')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- IMEI Chip -->
    <div>
        <label for="imei_chip" class="block font-semibold">IMEI Chip</label>
        <input type="text" name="imei_chip" id="imei_chip"
            class="w-full px-2 py-1 border rounded @error('imei_chip') is-invalid @enderror"
            value="{{ old('imei_chip', $ordenlaboratorio->imei_chip ?? '') }}">
        @error('imei_chip')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

        <!-- Otros campos técnicos 1-->
    @foreach([
        'ups_version' => 'Versión UPS',
        'rpi_version' => 'Versión Raspberry',
    ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
            <input type="{{ in_array($field, ['fecha_ingreso','fecha_reparacion']) ? 'date' : ($field === 'horas_reparacion' ? 'number' : 'text') }}"
                name="{{ $field }}" id="{{ $field }}"
                class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                value="{{ old($field, $ordenlaboratorio->$field ?? '') }}">
            @error($field)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

            <!-- Otros campos técnicos -->
    @foreach([
        'falla' => 'Falla',
        'fecha_ingreso' => 'Fecha de Ingreso',
    ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
            <input type="{{ in_array($field, ['fecha_ingreso','fecha_reparacion']) ? 'date' : ($field === 'horas_reparacion' ? 'number' : 'text') }}"
                name="{{ $field }}" id="{{ $field }}"
                class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                value="{{ old($field, $ordenlaboratorio->$field ?? '') }}">
            @error($field)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach


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

            <!-- Otros campos técnicos -->
    @foreach([
        'fecha_reparacion' => 'Fecha de Reparación',
        'horas_reparacion' => 'Horas Reparación'
    ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
            <input type="{{ in_array($field, ['fecha_ingreso','fecha_reparacion']) ? 'date' : ($field === 'horas_reparacion' ? 'number' : 'text') }}"
                name="{{ $field }}" id="{{ $field }}"
                class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                value="{{ old($field, $ordenlaboratorio->$field ?? '') }}">
            @error($field)
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
    
</div>