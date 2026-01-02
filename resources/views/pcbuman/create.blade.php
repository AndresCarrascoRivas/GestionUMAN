<x-app-layout>

    @section('title', 'Nuevo PCB UMAN')

    @section('content')
    <div class="container mt-4">

        <h2 class="mb-4"> Crear nuevo PCB UMAN</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('pcbuman.store') }}" method="POST">
                    @csrf

                    @include('pcbuman._form')

                    <div class="text-end">
                        <a href="{{ route('pcbuman.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-app-layout>