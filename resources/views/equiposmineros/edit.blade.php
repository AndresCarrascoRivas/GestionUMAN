<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Editar equipos mineros</h1>

        <form action="{{ route('equiposmineros.update', $equiposminero) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <!-- Nombre del equipo minero -->
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name"
                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                    value="{{ old('name', $equiposminero->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Faena asociada -->
            <div class="col-md-6">
                <label for="faena_id" class="form-label">Faena</label>
                <select name="faena_id" id="faena_id"
                    class="form-select form-select-sm @error('faena_id') is-invalid @enderror">
                    <option value="">Seleccione una faena</option>
                    @foreach ($faenas as $faena)
                        <option value="{{ $faena->id }}"
                            {{ old('faena_id', $equiposminero->faena_id) == $faena->id ? 'selected' : '' }}>
                            {{ $faena->name }}
                        </option>
                    @endforeach
                </select>
                @error('faena_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

                        <!-- Largo antena RF -->
            <div class="col-md-6">
                <label for="antena_rf" class="form-label">Antena RF</label>
                <input type="number" name="antena_rf" id="antena_rf"
                    class="form-control form-control-sm @error('antena_rf') is-invalid @enderror"
                    value="{{ old('antena_rf') }}">
                @error('antena_rf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Largo antena GPS -->
            <div class="col-md-6">
                <label for="antena_gps" class="form-label">Antena GPS</label>
                <input type="number" name="antena_gps" id="antena_gps"
                    class="form-control form-control-sm @error('antena_gps') is-invalid @enderror"
                    value="{{ old('antena_gps') }}">
                @error('antena_gps')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success btn-sm">
                    Actualizar Equipos Mineros
                </button>
            </div>
        </form>
    </div>
</x-app-layout>