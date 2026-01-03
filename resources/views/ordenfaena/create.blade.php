<x-app-layout>
    <h1 class="mb-4">📋 Ingreso de Orden de Faena</h1>

    <form action="{{ route('ordenfaena.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @include('ordenfaena._form')

        <div class="text-start mt-4">
            <a href="{{ route('ordenfaena.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Orden de Faena</button>
        </div>
    </form>
</x-app-layout>