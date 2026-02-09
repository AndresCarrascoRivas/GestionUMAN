<div class="container">
    <div class="row">
        <div class="col-md-6"> {{-- ✅ ancho reducido a 6 columnas --}}            
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del equipo*</label>
                <input type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $equiposminero->name ?? '') }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo"
                    class="form-control @error('modelo') is-invalid @enderror"
                    value="{{ old('modelo', $equiposminero->modelo ?? '') }}" required>
                @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo"
                    class="form-control @error('tipo') is-invalid @enderror"
                    value="{{ old('tipo', $equiposminero->tipo ?? '') }}" required>
                @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="faena_id" class="form-label">Faena*</label>
                <select name="faena_id" id="faena_id"
                    class="form-select select2 @error('faena_id') is-invalid @enderror" required>
                    <option value="">-- Selecciona una faena --</option>
                    @foreach($faenas as $faena)
                        <option value="{{ $faena->id }}"
                            {{ old('faena_id', $equiposminero->faena_id ?? '') == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="uman_serial" class="form-label">Serial UMAN</label>
                <input type="text" name="uman_serial" id="uman_serial"
                    class="form-control @error('uman_serial') is-invalid @enderror"
                    value="{{ old('uman_serial', $equiposminero->uman_serial ?? '') }}">
                @error('uman_serial') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="posicion_equipo_uman" class="form-label">Posición del equipo UMAN</label>
                <input type="text" name="posicion_equipo_uman" id="posicion_equipo_uman"
                    class="form-control @error('posicion_equipo_uman') is-invalid @enderror"
                    value="{{ old('posicion_equipo_uman', $equiposminero->posicion_equipo_uman ?? '') }}">
                @error('posicion_equipo_uman') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="dcdc" id="dcdc" value="1"
                    class="form-check-input"
                    {{ old('dcdc', $equiposminero->dcdc ?? false) ? 'checked' : '' }}>
                <label for="dcdc" class="form-check-label">DCDC</label>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="puesta_tierra" id="puesta_tierra" value="1"
                    class="form-check-input"
                    {{ old('puesta_tierra', $equiposminero->puesta_tierra ?? false) ? 'checked' : '' }}>
                <label for="puesta_tierra" class="form-check-label">Puesta a tierra</label>
            </div>

            <div class="mb-3">
                <label for="antena_rf_mt" class="form-label">Antena RF (mt)</label>
                <input type="number" step="0.01" name="antena_rf_mt" id="antena_rf_mt"
                    class="form-control @error('antena_rf_mt') is-invalid @enderror"
                    value="{{ old('antena_rf_mt', $equiposminero->antena_rf_mt ?? '') }}">
                @error('antena_rf_mt') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="antena_gps_mt" class="form-label">Antena GPS (mt)</label>
                <input type="number" step="0.01" name="antena_gps_mt" id="antena_gps_mt"
                    class="form-control @error('antena_gps_mt') is-invalid @enderror"
                    value="{{ old('antena_gps_mt', $equiposminero->antena_gps_mt ?? '') }}">
                @error('antena_gps_mt') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="hmi_mt" class="form-label">HMI (mt)</label>
                <input type="number" step="0.01" name="hmi_mt" id="hmi_mt"
                    class="form-control @error('hmi_mt') is-invalid @enderror"
                    value="{{ old('hmi_mt', $equiposminero->hmi_mt ?? '') }}">
                @error('hmi_mt') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="cable_alimentacion_mt" class="form-label">Cable alimentación (mt)</label>
                <input type="number" step="0.01" name="cable_alimentacion_mt" id="cable_alimentacion_mt"
                    class="form-control @error('cable_alimentacion_mt') is-invalid @enderror"
                    value="{{ old('cable_alimentacion_mt', $equiposminero->cable_alimentacion_mt ?? '') }}">
                @error('cable_alimentacion_mt') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</div>