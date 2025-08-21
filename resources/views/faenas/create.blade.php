<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar una faena</h1>

        <form action="{{ route('faenas.store') }}" method="POST" class="row g-3">
            @csrf

            <!-- Nombre de la faena -->
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre de la faena</label>
                <input type="text" name="name" id="name"
                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary btn-sm">
                    Ingresar Faena
                </button>
            </div>
        </form>
    </div>
</x-app-layout>