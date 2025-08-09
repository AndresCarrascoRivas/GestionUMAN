<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar un equipo</h1>

        <form action="{{ route('equiposUb.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Serial UB -->
            <div class="col-md-4">
                <label for="serialUb" class="form-label">Serial UB</label>
                <input type="text" name="serialUb" id="serialUb"
                    class="form-control form-control-sm @error('serialUb') is-invalid @enderror"
                    value="{{ old('serialUb') }}">
                @error('serialUb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Estado -->
            <div class="col-md-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado"
                    class="form-select form-select-sm @error('estado') is-invalid @enderror">
                    <option value="operativo" selected>Operativo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="dañado">Dañado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión UMAN -->
            <div class="col-md-3">
                <label for="versionUman" class="form-label">Versión UMAN</label>
                <select name="versionUman" id="versionUman"
                    class="form-select form-select-sm @error('versionUman') is-invalid @enderror">
                    <option value="UMAN BLUE" {{ old('versionUman') == 'UMAN BLUE' ? 'selected' : '' }}>UMAN BLUE</option>
                    <option value="UMAN CM4" {{ old('versionUman') == 'UMAN CM4' ? 'selected' : '' }}>UMAN CM4</option>
                </select>
                @error('versionUman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión Raspberry -->
            <div class="col-md-4">
                <label for="versionRpi" class="form-label">Versión Raspberry</label>
                <input type="text" name="versionRpi" id="versionRpi"
                    class="form-control form-control-sm @error('versionRpi') is-invalid @enderror"
                    value="{{ old('versionRpi') }}">
                @error('versionRpi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Versión UPS (condicional) -->
            <div class="col-md-4" id="upsField" style="display: none;">
                <label for="versionUps" class="form-label">Versión UPS</label>
                <input type="text" name="versionUps" id="versionUps"
                    class="form-control form-control-sm @error('versionUps') is-invalid @enderror"
                    value="{{ old('versionUps') }}">
                @error('versionUps')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pcb Uman -->
            <div class="col-md-4">
                <label for="PcbUman" class="form-label">PCB UMAN</label>
                <input type="text" name="PcbUman" id="PcbUman"
                    class="form-control form-control-sm @error('PcbUman') is-invalid @enderror"
                    value="{{ old('PcbUman') }}">
                @error('PcbUman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pcb Antena -->
            <div class="col-md-4">
                <label for="PcbAntena" class="form-label">PCB Antena</label>
                <input type="text" name="PcbAntena" id="PcbAntena"
                    class="form-control form-control-sm @error('PcbAntena') is-invalid @enderror"
                    value="{{ old('PcbAntena') }}">
                @error('PcbAntena')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Radiometrix -->
            <div class="col-md-4">
                <label for="Radiometrix" class="form-label">Radiometrix</label>
                <input type="text" name="Radiometrix" id="Radiometrix"
                    class="form-control form-control-sm @error('Radiometrix') is-invalid @enderror"
                    value="{{ old('Radiometrix') }}">
                @error('Radiometrix')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha de Fabricación -->
            <div class="col-md-4">
                <label for="fechaFabricacion" class="form-label">Fecha de Fabricación</label>
                <input type="date" name="fechaFabricacion" id="fechaFabricacion"
                    class="form-control form-control-sm @error('fechaFabricacion') is-invalid @enderror"
                    value="{{ old('fechaFabricacion') }}">
                @error('fechaFabricacion')
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
        const versionUmanSelect = document.getElementById('versionUman');
        const upsField = document.getElementById('upsField');

        function toggleUpsField() {
            upsField.style.display = versionUmanSelect.value === 'UMAN BLUE' ? 'block' : 'none';
        }

        versionUmanSelect.addEventListener('change', toggleUpsField);
        window.addEventListener('DOMContentLoaded', toggleUpsField);
    </script>
</x-app-layout>