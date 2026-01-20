<x-app-layout>
    <form action="{{ route('equiposUman.update', ['equipoUman' => $equipoUman]) }}" method="POST">
        
        @csrf
        @method('PUT')

        <!-- Estado -->
        <div>
            <label for="estado" class="block font-semibold">Estado</label>
            <select name="estado" id="estado" class="w-full border rounded">
                <option value="activo" {{ old('estado', $equipoUman->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $equipoUman->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                <option value="en reparación" {{ old('estado', $equipoUman->estado) == 'en reparación' ? 'selected' : '' }}>En reparación</option>
            </select>
            @error('estado')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Faena -->
        <div>
            <label for="faena_id" class="block font-semibold">Faena</label>
            <select name="faena_id" id="faena_id" class="w-full border rounded">
                <option value="">-- Selecciona una faena --</option>
                @foreach($faenas as $faena)
                    <option value="{{ $faena->id }}"
                        {{ old('faena_id', $equipoUman->faena_id) == $faena->id ? 'selected' : '' }}>
                        {{ $faena->name }}
                    </option>
                @endforeach
            </select>
            @error('faena_id')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Guardar cambios
        </button>
    </form>
</x-app-layout>