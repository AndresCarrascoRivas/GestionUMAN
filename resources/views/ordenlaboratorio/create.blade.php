<x-app-layout>

    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar una orden</h1>

        <form action="{{ route('ordenlaboratorio.store') }}" method="POST" class="row g-3">
            @csrf
            @include('ordenlaboratorio._form')
            <div class="text-start mt-4">
                <a href="{{ route('ordenlaboratorio.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

</x-app-layout>