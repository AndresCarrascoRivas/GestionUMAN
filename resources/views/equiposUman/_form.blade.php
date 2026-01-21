<div class="row g-3">

    <!-- Serial -->
    <div class="col-md-4">
        <label for="serial" class="form-label">Serial*</label>
        <input type="text" name="serial" id="serial"
            class="form-control form-control-sm @error('serial') is-invalid @enderror"
            value="{{ old('serial', $equipoUman->serial ?? '') }}" >
        @error('serial')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Técnico -->
    <div class="col-md-4">
        <label for="tecnico_id" class="form-label">Técnico asignado*</label>
        <select name="tecnico_id" id="tecnico_id"
            class="form-select form-select-sm @error('tecnico_id') is-invalid @enderror" required>
            <option value="">Seleccione un técnico</option>
            @foreach($tecnicos as $tecnico)
                <option value="{{ $tecnico->id }}"
                    {{ old('tecnico_id', $equipoUman->tecnico_id ?? '') == $tecnico->id ? 'selected' : '' }}>
                    {{ $tecnico->name }}
                </option>
            @endforeach
        </select>
        @error('tecnico_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <!-- Lugar -->
    <div class="col-md-4">
        <label for="faena_id" class="form-label">Lugar Actual*</label>
        <select name="faena_id" id="faena_id"
            class="form-select form-select-sm @error('faena_id') is-invalid @enderror">
            <option value="">-- Selecciona una faena --</option>
            @foreach($faenas as $id => $name)
                <option value="{{ $id }}" {{ old('faena_id', $equipoUman->faena_id ?? '') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('faena_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <!-- Estado -->
    <div class="col-md-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado"
            class="form-select form-select-sm @error('estado') is-invalid @enderror" required>
            <option value="activo" {{ old('estado', $equipoUman->estado ?? '') == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ old('estado', $equipoUman->estado ?? '') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('estado')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Modelo UMAN -->
    <div class="col-md-4">
        <label for="modelo_uman" class="form-label">Modelo UMAN</label>
        <select name="modelo_uman" id="modelo_uman"
            class="form-select form-select-sm @error('modelo_uman') is-invalid @enderror">
            <option value="UMAN BLUE" {{ old('modelo_uman') == 'UMAN BLUE' ? 'selected' : '' }}>UMAN BLUE</option>
            <option value="UMAN G8" {{ old('modelo_uman') == 'UMAN G8' ? 'selected' : '' }}>UMAN G8</option>
        </select>
        @error('modelo_uman')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión UMAN -->
    <div class="col-md-4">
        <label for="uman_version_id" class="form-label">Versión UMAN*</label>
        <select name="uman_version_id" id="uman_version_id"
            class="form-select form-select-sm @error('uman_version_id') is-invalid @enderror" required>
            <option value="">Seleccione versión UMAN</option>
            @foreach($umanVersions as $version)
                <option value="{{ $version->id }}"
                    {{ old('uman_version_id', $equipoUman->uman_version_id ?? '') == $version->id ? 'selected' : '' }}>
                    {{ $version->name }}
                </option>
            @endforeach
        </select>
        @error('uman_version_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Imagen SD -->
    <div class="col-md-4">
        <label for="version_sd_id" class="form-label">Imagen SD*</label>
        <select name="version_sd_id" id="version_sd_id"
            class="form-select form-select-sm @error('version_sd_id') is-invalid @enderror" required>
            <option value="">Seleccione versión SD</option>
            @foreach($versionSds as $sd)
                <option value="{{ $sd->id }}"
                    {{ old('version_sd_id', $equipoUman->version_sd_id ?? '') == $sd->id ? 'selected' : '' }}>
                    {{ $sd->version }}
                </option>
            @endforeach
        </select>
        @error('version_sd_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- PCB UMAN -->
    <div class="col-md-4">
        <label for="pcb_uman_id" class="form-label">PCB UMAN*</label>
        <select name="pcb_uman_id" id="pcb_uman_id"
            class="form-select form-select-sm @error('pcb_uman_id') is-invalid @enderror" required>
            <option value="">Seleccione PCB UMAN</option>
            @foreach($pcbUmans as $pcb)
                <option value="{{ $pcb->id }}"
                    {{ old('pcb_uman_id', $equipoUman->pcb_uman_id ?? '') == $pcb->id ? 'selected' : '' }}>
                    {{ $pcb->name }}
                </option>
            @endforeach
        </select>
        @error('pcb_uman_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión Raspberry -->
    <div class="col-md-4">
        <label for="rpi_version" class="form-label">Versión Raspberry</label>
        <input type="text" name="rpi_version" id="rpi_version"
            class="form-control form-control-sm @error('rpi_version') is-invalid @enderror"
            value="{{ old('rpi_version', $equipoUman->rpi_version ?? '') }}">
        @error('rpi_version')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Versión UPS -->
    <div class="col-md-4" id="upsField" style="display: none;">
        <label for="ups_version" class="form-label">Versión UPS</label>
        <input type="text" name="ups_version" id="ups_version"
            class="form-control form-control-sm @error('ups_version') is-invalid @enderror"
            value="{{ old('ups_version') }}">
        @error('ups_version')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- PCB Antena -->
    <div class="col-md-4">
        <label for="pcb_antenna" class="form-label">PCB Antena</label>
        <input type="text" name="pcb_antenna" id="pcb_antenna"
            class="form-control form-control-sm @error('pcb_antenna') is-invalid @enderror"
            value="{{ old('pcb_antenna', $equipoUman->pcb_antenna ?? '') }}">
        @error('pcb_antenna')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Radiometrix -->
    <div class="col-md-4">
        <label for="radiometrix" class="form-label">Radiometrix</label>
        <input type="text" name="radiometrix" id="radiometrix"
            class="form-control form-control-sm @error('radiometrix') is-invalid @enderror"
            value="{{ old('radiometrix', $equipoUman->radiometrix ?? '') }}">
        @error('radiometrix')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- BAM -->
    <div class="col-md-2">
        <label for="bam" class="form-label">¿Tiene BAM?</label>
        <select name="bam" id="bam"
            class="form-select form-select-sm @error('bam') is-invalid @enderror">
            <option value="0" {{ old('bam', $equipoUman->bam ?? '') == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('bam', $equipoUman->bam ?? '') == '1' ? 'selected' : '' }}>Sí</option>
        </select>
        @error('bam')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Marca BAM -->
    <div class="col-md-4" id="marcaBamField" style="display: none;">
        <label for="marca_bam" class="form-label">Marca BAM</label>
        <input type="text" name="marca_bam" id="marca_bam"
            class="form-control form-control-sm @error('marca_bam') is-invalid @enderror"
            value="{{ old('marca_bam', $equipoUman->marca_bam ?? '') }}">
        @error('marca_bam')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Chip -->
    <div class="col-md-4" id="chipField" style="display: none;">
        <label for="chip" class="form-label">Chip</label>
        <input type="text" name="chip" id="chip"
            class="form-control form-control-sm @error('chip') is-invalid @enderror"
            value="{{ old('chip') }}">
        @error('chip')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- IMEI del chip -->
    <div class="col-md-4">
        <label for="imei_chip" class="form-label">IMEI del chip</label>
        <input type="text" name="imei_chip" id="imei_chip"
            class="form-control form-control-sm @error('imei_chip') is-invalid @enderror"
            value="{{ old('imei_chip') }}">
        @error('imei_chip')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Fecha de Fabricación -->
    <div class="col-md-4">
        <label for="fecha_fabricacion" class="form-label">Fecha de Fabricación*</label>
        <input type="date" name="fecha_fabricacion" id="fecha_fabricacion"
            class="form-control form-control-sm @error('fecha_fabricacion') is-invalid @enderror"
            value="{{ old('fecha_fabricacion') }}">
        @error('fecha_fabricacion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <!-- Script para mostrar campo UPS -->
    <script>
        const modeloUmanSelect = document.getElementById('modelo_uman');
        const upsField = document.getElementById('upsField');

        function toggleUpsField() {
            if (modeloUmanSelect.value === 'UMAN BLUE') {
                upsField.style.display = 'block';
            } else {
                upsField.style.display = 'none';
            }
        }

        modeloUmanSelect.addEventListener('change', toggleUpsField);
        window.addEventListener('DOMContentLoaded', toggleUpsField);
    </script>

    <!-- Script para mostrar campos de bam -->
    <script>
        const bamSelect     = document.getElementById('bam');
        const marcaBamField = document.getElementById('marca_bam').closest('.col-md-4');
        const chipField     = document.getElementById('chip').closest('.col-md-4');
        const imeiChipField = document.getElementById('imei_chip').closest('.col-md-4');

        function toggleBamFields() {
            if (bamSelect.value === '1') {
                marcaBamField.style.display = 'block';
                chipField.style.display     = 'block';
                imeiChipField.style.display = 'block';
            } else {
                marcaBamField.style.display = 'none';
                chipField.style.display     = 'none';
                imeiChipField.style.display = 'none';
            }
        }

        bamSelect.addEventListener('change', toggleBamFields);
        window.addEventListener('DOMContentLoaded', toggleBamFields);
    </script>
    
</div>