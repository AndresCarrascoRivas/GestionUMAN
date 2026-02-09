<x-app-layout>

@section('title', 'Detalle de Orden de Laboratorio')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🔍 Detalle de Orden de faena #{{ $ordenfaena->id }}</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">UMAN Serial</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->uman_serial }}</dd>

                    <dt class="col-sm-4">¿Cambio de UMAN?</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->cambio_uman ? 'Sí' : 'No' }}</dd>

                    @if($ordenfaena->cambio_uman)
                        <dt class="col-sm-4">Serial Nueva UMAN</dt>
                        <dd class="col-sm-8">{{ $ordenfaena->serial_nueva_uman ?? '—' }}</dd>
                    @endif

                    <dt class="col-sm-4">Técnico</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->tecnico->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Faena</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->faena->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Fecha de Trabajo</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->fecha_trabajo }}</dd>

                    <dt class="col-sm-4">Equipo Minero</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->equipoMinero->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Estado</dt>
                    <dd class="col-sm-8">{{ ucfirst($ordenfaena->estado) }}</dd>

                    <dt class="col-sm-4">Falla</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->falla->name ?? '—' }}</dd>

                    <dt class="col-sm-4">Descripción de la Falla</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->descripcion_falla ?? '—' }}</dd>

                    <dt class="col-sm-4">Trabajo Realizado</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->trabajo_realizado }}</dd>

                    <dt class="col-sm-4">Descripcion Trabajo</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->descripcion_trabajo }}</dd>

                    <dt class="col-sm-4">Imagen Adjunta</dt>
                    <dd class="col-sm-8">
                        @if($ordenfaena->imagen)
                            <a href="{{ asset('storage/' . $ordenfaena->imagen) }}" target="_blank">📷 Ver imagen</a>
                        @else
                            —
                        @endif
                    </dd>

                    <dt class="col-sm-4">Creado el</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->created_at }}</dd>

                    <dt class="col-sm-4">Última actualización</dt>
                    <dd class="col-sm-8">{{ $ordenfaena->updated_at }}</dd>
                </dl>

            <div class="col-12 mt-3">
                <a href="{{ route('ordenfaena.index') }}" class="btn btn-secondary">
                    ← Volver al listado
                </a>
                <a href="{{ route('ordenfaena.edit', $ordenfaena->id) }}" class="btn btn-primary btn-sm">
                    ✏️ Editar Orden
                </a>
                <a href="{{ route('ordenfaena.pdf', $ordenfaena->id) }}" class="btn btn-outline-danger btn-sm">
                    🧾 Descargar PDF
                </a>
            </div>
        </div>
    </div>
</div>

</x-app-layout>