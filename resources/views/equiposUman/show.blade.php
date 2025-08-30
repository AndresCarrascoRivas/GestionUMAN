<x-app-layout>

    <div class="container py-4">

        <a href="{{ route('equiposUman.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
            ← Volver a equipos
        </a>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detalles del equipo UMAN</h5>
            </div>

            <div class="card-body">
                <h4 class="mb-3">
                    <span class="text-muted">Serial:</span> {{ $equiposUman->serial }}
                </h4>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Técnico asignado:</strong>
                        {{ $equiposUman->tecnico?->name ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Estado:</strong> {{ ucfirst($equiposUman->estado) }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión UMAN:</strong> {{ $equiposUman->uman_version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión Raspberry:</strong> {{ $equiposUman->rpi_version ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión UPS:</strong> {{ $equiposUman->ups_version ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>PCB UMAN:</strong> {{ $equiposUman->pcb_uman ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>PCB Antena:</strong> {{ $equiposUman->pcb_antenna ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Radiometrix:</strong> {{ $equiposUman->radiometrix ?? '—' }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Timeserial:</strong> {{ $equiposUman->timeserial ?? '—' }}
                    </div>
                    <div class="col-md-6">
                        <strong>Fecha de Fabricación:</strong>
                        {{ \Carbon\Carbon::parse($equiposUman->fecha_fabricacion)->format('d/m/Y') }}
                    </div>
                </div>

                <hr>

                <p class="text-muted mb-0">
                    Última actualización: {{ $equiposUman->updated_at }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>