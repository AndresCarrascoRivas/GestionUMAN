<x-app-layout>
    <div class="container py-4">
        <h1 class="mb-4">Formulario para ingresar una Equipo minero</h1>

        <form action="{{ route('equiposmineros.store') }}" method="POST" class="row g-3">
            @csrf
            @include('equiposmineros._form')
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</x-app-layout>