<x-app-layout>

    <div class="container">
        <h1>Nuevo Check de Faena</h1>

        <form action="{{ route('checkfaenas.store') }}" method="POST">
            @csrf

            {{-- Técnico --}}
            <div class="mb-3">
                <label for="tecnico_id" class="form-label">Técnico</label>
                <select name="tecnico_id" id="tecnico_id" class="form-select select2">
                    <option value="">Seleccione...</option>
                    @foreach($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Faena --}}
            <div class="mb-3">
                <label for="faena_id" class="form-label">Faena</label>
                <select name="faena_id" id="faena_id" class="form-select select2">
                    <option value="">Seleccione...</option>
                    @foreach($faenas as $faena)
                        <option value="{{ $faena->id }}" {{ old('faena_id') == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Equipo Minero --}}
            <div class="mb-3">
                <label for="equipo_minero_id" class="form-label">Equipo Minero</label>
                <select name="equipo_minero_id" id="equipo_minero_id" class="form-select select2">
                    <option value="">Seleccione...</option>
                    @foreach($equiposMinero as $equipo)
                        <option value="{{ $equipo->id }}" {{ old('equipo_minero_id') == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->name }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_minero_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha de trabajo -->
            <div>
                <label for="fecha_ingreso" class="block font-semibold">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso"
                    class="w-full px-2 py-1 border rounded @error('fecha_ingreso') is-invalid @enderror"
                    value="{{ old('fecha_ingreso') }}" required>
                @error('fecha_ingreso')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Checks booleanos --}}
            @php
                $checks = [
                    'caja_uman' => 'Caja Uman',
                    'hmi' => 'HMI',
                    'antena_rf' => 'Antena RF',
                    'antena_gps' => 'Antena GPS',
                    'conexion_electrica' => 'Conexión Eléctrica',
                    'sensores_internos' => 'Sensores Internos',
                ];
            @endphp

            <div class="row">
                @foreach($checks as $field => $label)
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="{{ $field }}" id="{{ $field }}" class="form-check-input"
                                value="1" {{ old($field, true) ? 'checked' : '' }}>
                            <label for="{{ $field }}" class="form-check-label">{{ $label }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Observación --}}
            <div class="mb-3">
                <label for="observacion" class="form-label">Observación</label>
                <textarea name="observacion" id="observacion" class="form-control" rows="3">{{ old('observacion') }}</textarea>
                @error('observacion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botón --}}
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</x-app-layout>