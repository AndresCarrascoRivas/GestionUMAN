<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar orden de laboratorio</h1>

        <form action="{{ route('ordenlaboratorio.update', $ordenlaboratorio->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <!-- Serial UMAN -->
           <!-- Mostrar el serial como texto -->
            <div>
                <label class="block font-semibold">Serial UMAN</label>
                <input type="text" value="{{ $ordenlaboratorio->uman_serial }}" disabled
                    class="w-full px-2 py-1 border rounded bg-light text-muted">
                <input type="hidden" name="uman_serial" value="{{ $ordenlaboratorio->uman_serial }}">
            </div>

            <!-- Técnico asignado -->
            <div>
                <label for="tecnico_id" class="block font-semibold">Técnico:</label>
                <select id="tecnico_id" name="tecnico_id"
                    class="w-full px-2 py-1 border rounded select2 @error('tecnico_id') is-invalid @enderror">
                    <option value="">-- Selecciona un técnico --</option>
                    @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}"
                            {{ old('tecnico_id', $ordenlaboratorio->tecnico_id) == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Faena asignada -->
            <div>
                <label for="faena_id" class="block font-semibold">Faena:</label>
                <select id="faena_id" name="faena_id"
                    class="w-full px-2 py-1 border rounded select2 @error('faena_id') is-invalid @enderror">
                    <option value="">-- Selecciona una faena --</option>
                    @foreach ($faenas as $faena)
                        <option value="{{ $faena->id }}"
                            {{ old('faena_id', $ordenlaboratorio->faena_id) == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Estado -->
            <div>
                <label for="estado" class="block font-semibold">Estado:</label>
                <select id="estado" name="estado"
                    class="w-full px-2 py-1 border rounded @error('estado') is-invalid @enderror">
                    <option value="">-- Selecciona el estado --</option>
                    <option value="pendiente" {{ old('estado', $ordenlaboratorio->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ old('estado', $ordenlaboratorio->estado) == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="completado" {{ old('estado', $ordenlaboratorio->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campos técnicos -->
            @php
                $campos = [
                    'pcb_uman_serial' => 'PCB UMAN',
                    'ups_serial' => 'Versión UPS',
                    'rpi_version' => 'Versión Raspberry',
                    'firmware_version' => 'Versión Firmware',
                    'falla' => 'Falla',
                    'descripcion_falla' => 'Descripción Falla',
                    'detalle_reparacion' => 'Detalle Reparación',
                    'fecha_ingreso' => 'Fecha de Ingreso',
                    'horas_reparacion' => 'Horas Reparación',
                ];
            @endphp

            @foreach ($campos as $campo => $label)
                <div class="col-md-4">
                    <label for="{{ $campo }}" class="form-label">{{ $label }}</label>
                    @if (str_contains($campo, 'descripcion') || str_contains($campo, 'detalle'))
                        <textarea name="{{ $campo }}" id="{{ $campo }}"
                            class="form-control form-control-sm @error($campo) is-invalid @enderror">{{ old($campo, $ordenlaboratorio->$campo) }}</textarea>
                    @else
                        <input type="{{ $campo === 'fecha_ingreso' ? 'date' : 'text' }}" name="{{ $campo }}" id="{{ $campo }}"
                            class="form-control form-control-sm @error($campo) is-invalid @enderror"
                            value="{{ old($campo, $ordenlaboratorio->$campo) }}">
                    @endif
                    @error($campo)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-100 my-0"></div>
            @endforeach

            <!-- Fecha de Reparación -->
            <div class="col-md-4">
                <label for="fecha_reparacion" class="form-label">Fecha de Reparación</label>
                <input type="date" name="fecha_reparacion" id="fecha_reparacion"
                    class="form-control form-control-sm @error('fecha_reparacion') is-invalid @enderror"
                    value="{{ old('fecha_reparacion', $ordenlaboratorio->fecha_reparacion) }}">
                @error('fecha_reparacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success btn-sm">
                    Actualizar Orden Laboratorio
                </button>
            </div>
        </form>
    </div>
</x-app-layout>