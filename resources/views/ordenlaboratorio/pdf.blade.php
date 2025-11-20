<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Orden #{{ $ordenlaboratorio->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        dt {
            font-weight: bold;
            margin-top: 10px;
        }
        dd {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>
    <h2> Detalle de Orden #{{ $ordenlaboratorio->id }}</h2>

    <dl>
        <dt>UMAN Serial</dt>
        <dd>{{ $ordenlaboratorio->equipoUMAN->serial ?? $ordenlaboratorio->uman_serial }}</dd>

        <dt>Técnico</dt>
        <dd>{{ $ordenlaboratorio->tecnico->name ?? '—' }}</dd>

        <dt>Faena</dt>
        <dd>{{ $ordenlaboratorio->faena->name ?? '—' }}</dd>

        <dt>Equipo Minero</dt>
        <dd>{{ $ordenlaboratorio->equipoMinero->name ?? '—' }}</dd>

        <dt>Estado</dt>
        <dd>{{ ucfirst($ordenlaboratorio->estado) }}</dd>

        <dt>PCB UMAN Serial</dt>
        <dd>{{ $ordenlaboratorio->pcb_uman_serial ?? '—' }}</dd>

        <dt>UPS Serial</dt>
        <dd>{{ $ordenlaboratorio->ups_serial ?? '—' }}</dd>

        <dt>Raspberry Pi Version</dt>
        <dd>{{ $ordenlaboratorio->rpi_version ?? '—' }}</dd>

        <dt>Firmware Version</dt>
        <dd>{{ $ordenlaboratorio->firmware_version ?? '—' }}</dd>

        <dt>Falla</dt>
        <dd>{{ $ordenlaboratorio->falla ?? '—' }}</dd>

        <dt>Descripción de la Falla</dt>
        <dd>{{ $ordenlaboratorio->descripcion_falla ?? '—' }}</dd>

        <dt>Detalle de Reparación</dt>
        <dd>{{ $ordenlaboratorio->detalle_reparacion ?? '—' }}</dd>

        <dt>Fecha de Ingreso</dt>
        <dd>{{ $ordenlaboratorio->fecha_ingreso ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_ingreso)->format('d-m-Y') : '—' }}</dd>

        <dt>Fecha de Reparación</dt>
        <dd>{{ $ordenlaboratorio->fecha_reparacion ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_reparacion)->format('d-m-Y') : '—' }}</dd>

        <dt>Horas de Reparación</dt>
        <dd>{{ $ordenlaboratorio->horas_reparacion ?? '—' }}</dd>

        <dt>Creado el</dt>
        <dd>{{ $ordenlaboratorio->created_at->format('d-m-Y H:i') }}</dd>

        <dt>Última actualización</dt>
        <dd>{{ $ordenlaboratorio->updated_at->format('d-m-Y H:i') }}</dd>
    </dl>
</body>
</html>