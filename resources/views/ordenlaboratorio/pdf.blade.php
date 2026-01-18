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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 6px 10px;
            width: 50%;
        }
        strong {
            display: block;
            margin-bottom: 2px;
        }
    </style>
</head>
<body>
    <h2>Detalle de Orden #{{ $ordenlaboratorio->id }}</h2>

    <table>
        <tr>
            <td>
                <strong>UMAN Serial</strong>
                {{ $ordenlaboratorio->equipoUman->serial ?? $ordenlaboratorio->equipo_uman_serial }}
            </td>
            <td>
                <strong>Técnico</strong>
                {{ optional($ordenlaboratorio->tecnico)->name ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Faena</strong>
                {{ optional($ordenlaboratorio->faena)->name ?? '—' }}
            </td>
            <td>
                <strong>Equipo Minero</strong>
                {{ optional($ordenlaboratorio->equipoMinero)->name ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Estado</strong>
                {{ ucfirst($ordenlaboratorio->estado) }}
            </td>
            <td>
                <strong>PCB UMAN</strong>
                {{ optional($ordenlaboratorio->pcbUman)->name ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Versión UMAN</strong>
                {{ optional($ordenlaboratorio->versionUman)->name ?? '—' }}
            </td>
            <td>
                <strong>Versión SD</strong>
                {{ optional($ordenlaboratorio->versionSd)->version ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Versión UPS</strong>
                {{ $ordenlaboratorio->ups_version ?? '—' }}
            </td>
            <td>
                <strong>Versión Raspberry</strong>
                {{ $ordenlaboratorio->rpi_version ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>BAM</strong>
                {{ $ordenlaboratorio->bam ? 'Sí' : 'No' }}
            </td>
            <td>
                <strong>Marca BAM</strong>
                {{ $ordenlaboratorio->marca_bam ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Chip</strong>
                {{ $ordenlaboratorio->chip ?? '—' }}
            </td>
            <td>
                <strong>IMEI Chip</strong>
                {{ $ordenlaboratorio->imei_chip ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Falla</strong>
                {{ $ordenlaboratorio->falla ?? '—' }}
            </td>
            <td>
                <strong>Descripción de la Falla</strong>
                {{ $ordenlaboratorio->descripcion_falla ?? '—' }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Detalle de Reparación</strong>
                {{ $ordenlaboratorio->detalle_reparacion ?? '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Fecha de Ingreso</strong>
                {{ $ordenlaboratorio->fecha_ingreso ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_ingreso)->format('d-m-Y') : '—' }}
            </td>
            <td>
                <strong>Fecha de Reparación</strong>
                {{ $ordenlaboratorio->fecha_reparacion ? \Carbon\Carbon::parse($ordenlaboratorio->fecha_reparacion)->format('d-m-Y') : '—' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Horas de Reparación</strong>
                {{ $ordenlaboratorio->horas_reparacion ?? '—' }}
            </td>
            <td>
                <strong>Creado el</strong>
                {{ $ordenlaboratorio->created_at->format('d-m-Y H:i') }}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Última actualización</strong>
                {{ $ordenlaboratorio->updated_at->format('d-m-Y H:i') }}
            </td>
        </tr>
    </table>
</body>
</html>