<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar un equipo</h1>

        <form action="{{ route('equiposUman.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Serial -->
            <div class="col-md-4">
                <label for="serial" class="form-label">Serial</label>
                <input type="text" name="serial" id="serial"
                    class="form-control form-control-sm @error('serial') is-invalid @enderror"
                    value="{{ old('serial') }}">
                @error('serial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Técnico -->
            <div class="col-md-4">
                <label for="tecnico_id" class="form-label">Técnico asignado</label>
                <select name="tecnico_id" id="tecnico_id"
                    class="form-select form-select-sm @error('tecnico_id') is-invalid @enderror">
                    <option value="">Seleccione un técnico</option>
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

            <!-- Estado -->
            <div class="col-md-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado"
                    class="form-select form-select-sm @error('estado') is-invalid @enderror">
                    <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>activo</option>
                    <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>inactivo</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión UMAN -->
            <div class="col-md-3">
                <label for="uman_version" class="form-label">Versión UMAN</label>
                <select name="uman_version" id="uman_version"
                    class="form-select form-select-sm @error('uman_version') is-invalid @enderror">
                    <option value="UMAN BLUE" {{ old('uman_version') == 'UMAN BLUE' ? 'selected' : '' }}>UMAN BLUE</option>
                    <option value="UMAN CM4" {{ old('uman_version') == 'UMAN CM4' ? 'selected' : '' }}>UMAN CM4</option>
                </select>
                @error('uman_version')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión Raspberry -->
            <div class="col-md-4">
                <label for="rpi_version" class="form-label">Versión Raspberry</label>
                <input type="text" name="rpi_version" id="rpi_version"
                    class="form-control form-control-sm @error('rpi_version') is-invalid @enderror"
                    value="{{ old('rpi_version') }}">
                @error('rpi_version')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión UPS (condicional) -->
            <div class="col-md-4" id="upsField" style="display: none;">
                <label for="ups_version" class="form-label">Versión UPS</label>
                <input type="text" name="ups_version" id="ups_version"
                    class="form-control form-control-sm @error('ups_version') is-invalid @enderror"
                    value="{{ old('ups_version') }}">
                @error('ups_version')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PCB UMAN -->
            <div class="col-md-4">
                <label for="pcb_uman" class="form-label">PCB UMAN</label>
                <input type="text" name="pcb_uman" id="pcb_uman"
                    class="form-control form-control-sm @error('pcb_uman') is-invalid @enderror"
                    value="{{ old('pcb_uman') }}">
                @error('pcb_uman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PCB Antena -->
            <div class="col-md-4">
                <label for="pcb_antenna" class="form-label">PCB Antena</label>
                <input type="text" name="pcb_antenna" id="pcb_antenna"
                    class="form-control form-control-sm @error('pcb_antenna') is-invalid @enderror"
                    value="{{ old('pcb_antenna') }}">
                @error('pcb_antenna')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Radiometrix -->
            <div class="col-md-4">
                <label for="radiometrix" class="form-label">Radiometrix</label>
                <input type="text" name="radiometrix" id="radiometrix"
                    class="form-control form-control-sm @error('radiometrix') is-invalid @enderror"
                    value="{{ old('radiometrix') }}">
                @error('radiometrix')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- TimeSerial -->
            <div class="col-md-4">
                <label for="timeserial" class="form-label">TimeSerial</label>
                <input type="text" name="timeserial" id="timeserial"
                    class="form-control form-control-sm @error('timeserial') is-invalid @enderror"
                    value="{{ old('timeserial') }}">
                @error('timeserial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha de Fabricación -->
            <div class="col-md-4">
                <label for="fecha_fabricacion" class="form-label">Fecha de Fabricación</label>
                <input type="date" name="fecha_fabricacion" id="fecha_fabricacion"
                    class="form-control form-control-sm @error('fecha_fabricacion') is-invalid @enderror"
                    value="{{ old('fecha_fabricacion') }}">
                @error('fecha_fabricacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    Ingresar Equipo UMAN
                </button>
            </div>
        </form>
    </div>

    <!-- Script para mostrar campo UPS -->
    <script>
        const versionUmanSelect = document.getElementById('uman_version');
        const upsField = document.getElementById('upsField');

        function toggleUpsField() {
            upsField.style.display = versionUmanSelect.value === 'UMAN BLUE' ? 'block' : 'none';
        }

        versionUmanSelect.addEventListener('change', toggleUpsField);
        window.addEventListener('DOMContentLoaded', toggleUpsField);
    </script>
</x-app-layout>