<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Formulario para crear una nueva orden</h1>

    <form action="{{ route('ordenes.store') }}" method="POST" class="space-y-4 w-full max-w-xl">
        @csrf

        {{-- Serial UB --}}
        <div>
            <label for="serialUb" class="block font-semibold">Serial UB:</label>
            <select id="serialUb" name="serialUb"
                class="w-full px-2 py-1 border rounded select2 @error('serialUb') border-red-500 @enderror">
                <option value="">-- Selecciona un equipo UB --</option>
                @foreach ($equiposUb as $equipo)
                    <option value="{{ $equipo->serialUb }}" {{ old('serialUb') == $equipo->serialUb ? 'selected' : '' }}>
                        {{ $equipo->serialUb }}
                    </option>
                @endforeach
            </select>
            @error('serialUb')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Estado --}}

        <div>
            <label for="estado" class="block font-semibold">Estado:</label>
            <select id="estado" name="estado"
        class="w-full px-2 py-1 border rounded @error('estado') border-red-500 @enderror">
                <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
            </select>
            @error('estado')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Serial TMS --}}
        <div>
            <label for="serialTms" class="block font-semibold">Serial TMS:</label>
            <input type="number" id="serialTms" name="serialTms" value="{{ old('serialTms') }}"
                class="w-full px-2 py-1 border rounded @error('serialTms') border-red-500 @enderror">
            @error('serialTms')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Serial UPS --}}
        <div>
            <label for="serialUps" class="block font-semibold">Serial UPS:</label>
            <input type="number" id="serialUps" name="serialUps" value="{{ old('serialUps') }}"
                class="w-full px-2 py-1 border rounded @error('serialUps') border-red-500 @enderror">
            @error('serialUps')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Version RPI --}}
        <div>
            <label for="versionRpi" class="block font-semibold">Versión RPI:</label>
            <input type="text" id="versionRpi" name="versionRpi" value="{{ old('versionRpi') }}"
                class="w-full px-2 py-1 border rounded @error('versionRpi') border-red-500 @enderror">
            @error('versionRpi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Version Firmware --}}
        <div>
            <label for="versionFirmware" class="block font-semibold">Versión Firmware:</label>
            <input type="text" id="versionFirmware" name="versionFirmware" value="{{ old('versionFirmware') }}"
                class="w-full px-2 py-1 border rounded @error('versionFirmware') border-red-500 @enderror">
            @error('versionFirmware')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Técnico --}}
        <div>
            <label for="tecnico" class="block font-semibold">Técnico:</label>
            <input type="number" id="tecnico" name="tecnico" value="{{ old('tecnico') }}"
                class="w-full px-2 py-1 border rounded @error('tecnico') border-red-500 @enderror">
            @error('tecnico')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Faena --}}
        <div>
            <label for="faena" class="block font-semibold">Faena:</label>
            <input type="number" id="faena" name="faena" value="{{ old('faena') }}"
                class="w-full px-2 py-1 border rounded @error('faena') border-red-500 @enderror">
            @error('faena')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Falla --}}
        <div>
            <label for="falla" class="block font-semibold">Falla:</label>
            <input type="text" id="falla" name="falla" value="{{ old('falla') }}"
                class="w-full px-2 py-1 border rounded @error('falla') border-red-500 @enderror">
            @error('falla')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Descripción Falla --}}
        <div>
            <label for="descripcionFalla" class="block font-semibold">Descripción de la Falla:</label>
            <textarea id="descripcionFalla" name="descripcionFalla" rows="4"
                class="w-full px-2 py-1 border rounded @error('descripcionFalla') border-red-500 @enderror">{{ old('descripcionFalla') }}</textarea>
            @error('descripcionFalla')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Horas de Reparación --}}
        <div>
            <label for="hReparacion" class="block font-semibold">Horas de Reparación:</label>
            <input type="text" id="hReparacion" name="hReparacion" value="{{ old('hReparacion') }}"
                class="w-full px-2 py-1 border rounded @error('hReparacion') border-red-500 @enderror">
            @error('hReparacion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Fecha de Ingreso --}}
        <div>
            <label for="fechaIngreso" class="block font-semibold">Fecha de Ingreso:</label>
            <input type="date" id="fechaIngreso" name="fechaIngreso" value="{{ old('fechaIngreso') }}"
                class="w-full px-2 py-1 border rounded @error('fechaIngreso') border-red-500 @enderror">
            @error('fechaIngreso')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón --}}
        <div class="mt-6">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Crear Orden
            </button>
        </div>
    </form>

    {{-- Select2 --}}
    <script>
        $(document).ready(function () {
            $('#serialUb').select2({
                placeholder: "Busca o selecciona un equipo UB",
                allowClear: true,
                width: 'resolve'
            });
        });
    </script>
</x-app-layout>