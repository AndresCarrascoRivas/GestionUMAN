<x-app-layout>
    <h1 class="text-2xl font-bold mb-6">Editar orden #{{ $order->id }}</h1>

    <form action="{{ route('ordenes.update', $order) }}" method="POST" class="space-y-6 max-w-2xl">
        @csrf
        @method('PUT')

        {{-- Serial UB (no editable) --}}
        <div>
            <label for="serialUb" class="block font-semibold">Serial UB:</label>
            <select name="serialUb" disabled
                class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-600">
                <option value="{{ $order->serialUb }}">{{ $order->serialUb }}</option>
            </select>
            <input type="hidden" name="serialUb" value="{{ $order->serialUb }}">
        </div>

        {{-- Seriales --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="serialTms" class="block font-semibold">Serial TMS:</label>
                <input type="number" name="serialTms" id="serialTms"
                    value="{{ old('serialTms', $order->serialTms) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="serialUps" class="block font-semibold">Serial UPS:</label>
                <input type="number" name="serialUps" id="serialUps"
                    value="{{ old('serialUps', $order->serialUps) }}"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Versiones --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="versionRpi" class="block font-semibold">Versión RPI:</label>
                <input type="text" name="versionRpi" id="versionRpi"
                    value="{{ old('versionRpi', $order->versionRpi) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="versionFirmware" class="block font-semibold">Versión Firmware:</label>
                <input type="text" name="versionFirmware" id="versionFirmware"
                    value="{{ old('versionFirmware', $order->versionFirmware) }}"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Técnico y Faena --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="tecnico" class="block font-semibold">Técnico:</label>
                <input type="number" name="tecnico" id="tecnico"
                    value="{{ old('tecnico', $order->tecnico) }}"
                    class="w-full border rounded px-3 py-2 @error('tecnico') border-red-500 @enderror">
                @error('tecnico')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="faena" class="block font-semibold">Faena:</label>
                <input type="number" name="faena" id="faena"
                    value="{{ old('faena', $order->faena) }}"
                    class="w-full border rounded px-3 py-2 @error('faena') border-red-500 @enderror">
                @error('faena')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Falla y descripción --}}
        <div>
            <label for="falla" class="block font-semibold">Falla:</label>
            <input type="text" name="falla" id="falla"
                value="{{ old('falla', $order->falla) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="descripcionFalla" class="block font-semibold">Descripción de la Falla:</label>
            <textarea name="descripcionFalla" id="descripcionFalla" rows="3"
                class="w-full border rounded px-3 py-2">{{ old('descripcionFalla', $order->descripcionFalla) }}</textarea>
        </div>

        {{-- Detalle Reparación --}}
        <div>
            <label for="DetalleReparacion" class="block font-semibold">Detalle de Reparación:</label>
            <textarea name="DetalleReparacion" id="DetalleReparacion" rows="3"
                class="w-full border rounded px-3 py-2 @error('DetalleReparacion') border-red-500 @enderror">{{ old('DetalleReparacion', $order->DetalleReparacion) }}</textarea>
            @error('DetalleReparacion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Horas y fechas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="hReparacion" class="block font-semibold">Horas de Reparación:</label>
                <input type="text" name="hReparacion" id="hReparacion"
                    value="{{ old('hReparacion', $order->hReparacion) }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label for="fechaIngreso" class="block font-semibold">Fecha de Ingreso:</label>
                <input type="date" name="fechaIngreso" id="fechaIngreso"
                    value="{{ old('fechaIngreso', $order->fechaIngreso) }}"
                    class="w-full border rounded px-3 py-2 @error('fechaIngreso') border-red-500 @enderror">
                @error('fechaIngreso')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="fechaReparacion" class="block font-semibold">Fecha de Reparación:</label>
                <input type="date" name="fechaReparacion" id="fechaReparacion"
                    value="{{ old('fechaReparacion', $order->fechaReparacion) }}"
                    class="w-full border rounded px-3 py-2 @error('fechaReparacion') border-red-500 @enderror">
                @error('fechaReparacion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Botón --}}
        <div class="mt-6">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Actualizar Orden
            </button>
        </div>
    </form>
</x-app-layout>