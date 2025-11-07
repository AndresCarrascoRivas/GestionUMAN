<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden #{{ $ordenlaboratorio->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        dt { font-weight: bold; }
        dd { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2> Detalle de Orden #{{ $ordenlaboratorio->id }}</h2>
    <dl>
        <dt class="col-sm-4">UMAN Serial</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->uman_serial }}</dd>

                <dt class="col-sm-4">Técnico</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->tecnico->name ?? '—' }}</dd>

                <dt class="col-sm-4">Faena</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->faena->name ?? '—' }}</dd>

                <dt class="col-sm-4">Equipo Minero</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->equipominero->name ?? '—' }}</dd>

                <dt class="col-sm-4">Estado</dt>
                <dd class="col-sm-8">{{ ucfirst($ordenlaboratorio->estado) }}</dd>

                <dt class="col-sm-4">PCB UMAN Serial</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->pcb_uman_serial ?? '—' }}</dd>

                <dt class="col-sm-4">UPS Serial</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->ups_serial ?? '—' }}</dd>

                <dt class="col-sm-4">Raspberry Pi Version</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->rpi_version ?? '—' }}</dd>

                <dt class="col-sm-4">Firmware Version</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->firmware_version ?? '—' }}</dd>

                <dt class="col-sm-4">Falla</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->falla ?? '—' }}</dd>

                <dt class="col-sm-4">Descripción de la Falla</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->descripcion_falla ?? '—' }}</dd>

                <dt class="col-sm-4">Detalle de Reparación</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->detalle_reparacion ?? '—' }}</dd>

                <dt class="col-sm-4">Fecha de Ingreso</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->fecha_ingreso }}</dd>

                <dt class="col-sm-4">Fecha de Reparación</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->fecha_reparacion }}</dd>

                <dt class="col-sm-4">Horas de Reparación</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->horas_reparacion ?? '—' }}</dd>

                <dt class="col-sm-4">Creado el</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->created_at }}</dd>

                <dt class="col-sm-4">Última actualización</dt>
                <dd class="col-sm-8">{{ $ordenlaboratorio->updated_at }}</dd>
            </dl>
    </dl>
</body>
</html>