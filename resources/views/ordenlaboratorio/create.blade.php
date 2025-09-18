<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar una orden</h1>

        <form action="{{ route('ordenlaboratorio.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Serial UMAN -->
            <div>
                <label for="uman_serial" class="block font-semibold">Serial UMAN</label>
                <select name="uman_serial" id="uman_serial"
                    class="w-full px-2 py-1 border rounded select2 @error('uman_serial') is-invalid @enderror">
                    <option value="">Serial UMAN</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->serial }}" {{ old('uman_serial') == $equipo->serial ? 'selected' : '' }}>
                            {{ $equipo->serial }}
                        </option>
                    @endforeach
                </select>
                @error('uman_serial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Técnico asignado --}}
            <div>
                <label for="tecnico_id" class="block font-semibold">Técnico:</label>
                <select id="tecnico_id" name="tecnico_id"
                    class="w-full px-2 py-1 border rounded select2 @error('tecnico_id') is-invalid @enderror">
                    <option value="">-- Selecciona un técnico --</option>
                    @foreach ($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                            {{ $tecnico->name }}
                        </option>
                    @endforeach
                </select>
                @error('tecnico_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Faena asignada --}}
            <div>
                <label for="faena_id" class="block font-semibold">Faena:</label>
                <select id="faena_id" name="faena_id"
                    class="w-full px-2 py-1 border rounded select2 @error('faena_id') is-invalid @enderror">
                    <option value="">-- Selecciona una faena --</option>
                    @foreach ($faenas as $faena)
                        <option value="{{ $faena->id }}" {{ old('faena_id') == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Estado --}}
            <div>
                <label for="estado" class="block font-semibold">Estado:</label>
                <select id="estado" name="estado"
                    class="w-full px-2 py-1 border rounded @error('estado') is-invalid @enderror">
                    <option value="">-- Selecciona el estado --</option>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

                        <!-- SERIAL PCB UMAN -->
            <div class="col-md-4">
                <label for="pcb_uman_serial" class="form-label">PCB UMAN</label>
                <input type="text" name="pcb_uman_serial" id="pcb_uman_serial"
                    class="form-control form-control-sm @error('pcb_uman_serial') is-invalid @enderror"
                    value="{{ old('pcb_uman_serial') }}">
                @error('pcb_uman_serial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

                        <!-- SERIAL UPS  -->
            <div class="col-md-4" >
                <label for="ups_serial" class="form-label">Versión UPS</label>
                <input type="text" name="ups_serial" id="ups_serial"
                    class="form-control form-control-sm @error('ups_serial') is-invalid @enderror"
                    value="{{ old('ups_serial') }}">
                @error('ups_serial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

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

            <div class="w-100 my-0  "></div>

            <!-- Versión Firmware -->
            <div class="col-md-4">
                <label for="firmware_version" class="form-label">Versión Firmware</label>
                <input type="text" name="firmware_version" id="firmware_version"
                    class="form-control form-control-sm @error('firmware_version') is-invalid @enderror"
                    value="{{ old('firmware_version') }}">
                @error('firmware_version')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

            <!-- Falla -->
            <div class="col-md-4">
                <label for="falla" class="form-label"> Falla</label>
                <input type="text" name="falla" id="falla"
                    class="form-control form-control-sm @error('falla') is-invalid @enderror"
                    value="{{ old('falla') }}">
                @error('falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

            <!-- Descripcion Falla -->
            <div class="col-md-4">
                <label for="descripcion_falla" class="form-label"> Descripcion Falla</label>
                <textarea name="descripcion_falla" id="descripcion_falla"
                    class="form-control form-control-sm @error('descripcion_falla') is-invalid @enderror"> {{ old('descripcion_falla') }}</textarea>
                @error('descripcion_falla')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

            <!-- Detalle Reparacion -->
            <div class="col-md-4">
                <label for="detalle_reparacion" class="form-label"> Detalle Reparacion</label>
                <textarea name="detalle_reparacion" id="detalle_reparacion"
                    class="form-control form-control-sm @error('detalle_reparacion') is-invalid @enderror"> {{ old('detalle_reparacion') }}</textarea>
                @error('detalle_reparacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="w-100 my-0  "></div>

            <!-- Fecha de Ingreso -->
            <div class="col-md-4">
                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso"
                    class="form-control form-control-sm @error('fecha_ingreso') is-invalid @enderror"
                    value="{{ old('fecha_ingreso') }}">
                @error('fecha_ingreso')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-100 my-0  "></div>

            <!-- Horas Reparacion -->
            <div class="col-md-4">
                <label for="horas_reparacion" class="form-label"> Horas Reparacion</label>
                <input type="text" name="horas_reparacion" id="horas_reparacion"
                    class="form-control form-control-sm @error('horas_reparacion') is-invalid @enderror"
                    value="{{ old('horas_reparacion') }}">
                @error('horas_reparacion')
                    <div class="invalid-feedback">{{ $message }}</div>
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