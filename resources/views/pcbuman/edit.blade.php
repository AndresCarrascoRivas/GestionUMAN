<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Editar PCB UMAN
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow-sm">
            <div class="card-body">

                <form action="{{ route('pcbuman.update', $pcbuman) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('pcbuman._form')

                    <div class="text-end">
                        <a href="{{ route('pcbuman.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-app-layout>
