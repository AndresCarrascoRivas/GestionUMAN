<x-app-layout>
    <div class="container py-4">

        <a href="{{ route('equiposUb.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
            ← Volver a equipos
        </a>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detalles del equipo UB</h5>
            </div>

            <div class="card-body">
                <h4 class="mb-3">
                    <span class="text-muted">Serial UB:</span> {{ $equipoUb->serialUb }}
                </h4>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Estado:</strong> {{ ucfirst($equipoUb->estado) }}
                    </div>
                    <div class="col-md-6">
                        <strong>Versión UMAN:</strong> {{ $equipoUb->versionUman }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Versión Raspberry:</strong> {{ $equipoUb->versionraspberry ?? '—' }}
                    </div>
                    @if($equipoUb->tipoEquipo !== 'CM4' && !empty($equipoUb->versionUps))
                        <div class="col-md-6">
                            <strong>Versión UPS:</strong> {{ $equipoUb->versionUps }}
                        </div>
                    @endif
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>PCB UMAN:</strong> {{ $equipoUb->PcbUman }}
                    </div>
                    <div class="col-md-6">
                        <strong>PCB Antena:</strong> {{ $equipoUb->PcbAntena }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <strong>Radiometrix:</strong> {{ $equipoUb->Radiometrix }}
                    </div>
                    <div class="col-md-6">
                        <strong>Fecha de Fabricación:</strong>
                        {{ \Carbon\Carbon::parse($equipoUb->fechaFabricacion)->format('d/m/Y') }}
                    </div>
                </div>

                <hr>

                <p class="text-muted mb-0">
                    Última actualización: {{ $equipoUb->updated_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>