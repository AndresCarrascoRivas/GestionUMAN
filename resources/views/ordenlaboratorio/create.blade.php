<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar una orden</h1>

        <form action="{{ route('ordenlaboratorio.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Serial UMAN -->
            <div>
                <label for="equipo_uman_serial" class="block font-semibold">Serial UMAN</label>
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
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Técnico -->
            <div>
                <label for="tecnico_id" class="block font-semibold">Técnico</label>
                <select name="tecnico_id" id="tecnico_id"
                    class="w-full px-2 py-1 border rounded select2 @error('tecnico_id') is-invalid @enderror">
                    <option value="">-- Selecciona un técnico --</option>
                    @foreach($tecnicos as $id => $name)
                        <option value="{{ $id }}" {{ old('tecnico_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Faena -->
            <div>
                <label for="faena_id" class="block font-semibold">Faena</label>
                <select name="faena_id" id="faena_id"
                    class="w-full px-2 py-1 border rounded select2 @error('faena_id') is-invalid @enderror">
                    <option value="">-- Selecciona una faena --</option>
                    @foreach($faenas as $id => $name)
                        <option value="{{ $id }}" {{ old('faena_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Equipo Minero -->
            <div>
                <label for="equipo_minero_id" class="block font-semibold">Equipo Minero</label>
                <select name="equipo_minero_id" id="equipo_minero_id"
                    class="w-full px-2 py-1 border rounded select2 @error('equipo_minero_id') is-invalid @enderror">
                    <option value="">-- Selecciona un equipo minero --</option>
                    @foreach($equiposMineros as $id => $name)
                        <option value="{{ $id }}" {{ old('equipo_minero_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('equipo_minero_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Estado -->
            <div>
                <label for="estado" class="block font-semibold">Estado</label>
                <select name="estado" id="estado"
                    class="w-full px-2 py-1 border rounded @error('estado') is-invalid @enderror">
                    <option value="">-- Selecciona el estado --</option>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('estado')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campos técnicos -->
            @foreach([
                'pcb_uman_serial' => 'PCB UMAN',
                'ups_serial' => 'Versión UPS',
                'rpi_version' => 'Versión Raspberry',
                'firmware_version' => 'Versión Firmware',
                'falla' => 'Falla',
                'fecha_ingreso' => 'Fecha de Ingreso',
                'horas_reparacion' => 'Horas Reparación'
            ] as $field => $label)
                <div>
                    <label for="{{ $field }}" class="block font-semibold">{{ $label }}</label>
                    <input type="{{ $field === 'fecha_ingreso' ? 'date' : 'text' }}"
                        name="{{ $field }}" id="{{ $field }}"
                        class="w-full px-2 py-1 border rounded @error($field) is-invalid @enderror"
                        value="{{ old($field) }}">
                    @error($field)
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <!-- Descripción Falla -->
            <div class="col-span-2">
                <label for="descripcion_falla" class="block font-semibold">Descripción de la Falla</label>
                <textarea name="descripcion_falla" id="descripcion_falla"
                    class="w-full px-2 py-1 border rounded @error('descripcion_falla') is-invalid @enderror"
                    rows="3">{{ old('descripcion_falla') }}</textarea>
                @error('descripcion_falla')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detalle Reparación -->
            <div class="col-span-2">
                <label for="detalle_reparacion" class="block font-semibold">Detalle de la Reparación</label>
                <textarea name="detalle_reparacion" id="detalle_reparacion"
                    class="w-full px-2 py-1 border rounded @error('detalle_reparacion') is-invalid @enderror"
                    rows="3">{{ old('detalle_reparacion') }}</textarea>
                @error('detalle_reparacion')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    Ingresar Orden Laboratorio
                </button>
            </div>
        </form>
    </div>

</x-app-layout>