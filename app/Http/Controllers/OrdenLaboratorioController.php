<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenLaboratorioRequest;
use App\Http\Requests\UpdateOrdenLaboratorioRequest;
use App\Models\EquipoMinero;
use App\Models\OrdenLaboratorio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\EquipoUman;
use App\Models\Tecnico;
use App\Models\Faena;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OrdenesLaboratorioExport;
use App\Models\Falla;
use App\Models\PcbUman;
use App\Models\VersionSd;
use App\Models\VersionUman;
use Maatwebsite\Excel\Facades\Excel;

class OrdenLaboratorioController extends Controller
{
    public function index(Request $request)
    {
        $query = OrdenLaboratorio::with(['tecnico', 'faena', 'equipoMinero', 'equipoUman'])
                                ->orderByDesc('id');

        if ($request->filled('equipo_uman_serial')) {
            $query->where('equipo_uman_serial', 'like', '%'.$request->equipo_uman_serial.'%');
        }

        if ($request->filled('faena_id')) {
            $query->where('faena_id', $request->faena_id);
        }

        $ordenes = $query->paginate(10);
        $faenas = Faena::orderBy('name')->get();

        return view('ordenlaboratorio.index', compact('ordenes','faenas'));
    }

    public function create()
    {
        $equiposUMAN = EquipoUman::pluck('serial', 'serial');
        $tecnicos = Tecnico::pluck('name', 'id');
        $faenas = Faena::pluck('name', 'id');
        $equiposMineros = EquipoMinero::pluck('name', 'id');
        $fallas = Falla::pluck('name', 'id');

        $umanVersions = VersionUman::pluck('name', 'id');
        $versionSds   = VersionSd::pluck('version', 'id'); 
        $pcbUmans     = PcbUman::pluck('name', 'id');

        return view('ordenlaboratorio.create', compact(
            'equiposUMAN',
            'tecnicos',
            'faenas',
            'equiposMineros',
            'umanVersions',
            'versionSds',
            'pcbUmans',
            'fallas'
        ));
    }


    public function store(StoreOrdenLaboratorioRequest $request)
    {
        $orden = OrdenLaboratorio::create($request->validated());

        // Buscar el equipo asociado
        $equipo = EquipoUman::where('serial', $orden->equipo_uman_serial)->first();

        if ($equipo) {
            $equipo->update([
                'pcb_uman_id'     => $orden->pcb_uman_id,
                'pcb_antenna'     => $orden->pcb_antenna,
                'radiometrix'     => $orden->radiometrix,
                'ups_version'     => $orden->ups_version,
                'rpi_version'     => $orden->rpi_version,
                'version_sd_id'   => $orden->version_sd_id,
                'uman_version_id' => $orden->uman_version_id,
                'bam'             => $orden->bam,
                'marca_bam'       => $orden->marca_bam,
                'chip'            => $orden->chip,
                'imei_chip'       => $orden->imei_chip,
            ]);
        }
        return redirect()->route('ordenlaboratorio.index')
                         ->with('success', 'orden creada correctamente.');
    }

    public function show(OrdenLaboratorio $ordenlaboratorio)
    {
        $ordenlaboratorio->load(['tecnico', 'faena', 'equipoMinero', 'equipoUman']);

        return view('ordenlaboratorio.show', compact('ordenlaboratorio'));
    }

    public function edit(OrdenLaboratorio $ordenlaboratorio)
    {
        $equiposUMAN = EquipoUman::pluck('serial', 'serial');
        $tecnicos = Tecnico::pluck('name', 'id');
        $faenas = Faena::pluck('name', 'id');
        $equiposMineros = EquipoMinero::pluck('name', 'id');
        $umanVersions = VersionUman::pluck('name', 'id');
        $versionSds   = VersionSd::pluck('version', 'id');
        $pcbUmans     = PcbUman::pluck('name', 'id');

        return view('ordenlaboratorio.edit', compact('ordenlaboratorio', 'equiposUMAN', 'tecnicos',
         'faenas', 'equiposMineros', 'umanVersions', 'versionSds' ,'pcbUmans'));
    }

    public function update(UpdateOrdenLaboratorioRequest $request, OrdenLaboratorio $ordenlaboratorio)
    {
        $ordenlaboratorio->update($request->validated());

            // Buscar el equipo asociado
        $equipo = EquipoUman::where('serial', $ordenlaboratorio->equipo_uman_serial)->first();

        if ($equipo) {
            $equipo->update([
                'pcb_uman_id'     => $ordenlaboratorio->pcb_uman_id,
                'pcb_antenna'     => $ordenlaboratorio->pcb_antenna,
                'radiometrix'     => $ordenlaboratorio->radiometrix,
                'ups_version'     => $ordenlaboratorio->ups_version,
                'rpi_version'     => $ordenlaboratorio->rpi_version,
                'version_sd_id'   => $ordenlaboratorio->version_sd_id,
                'uman_version_id' => $ordenlaboratorio->uman_version_id,
                'bam'             => $ordenlaboratorio->bam,
                'marca_bam'       => $ordenlaboratorio->marca_bam,
                'chip'            => $ordenlaboratorio->chip,
                'imei_chip'       => $ordenlaboratorio->imei_chip,
                'estado'          => $ordenlaboratorio->estado,
            ]);
        }

        return redirect()->route('ordenlaboratorio.index')
                         ->with('success', 'Orden actualizada correctamente.');
    }

    public function descargarPDF($id)
    {
        $ordenlaboratorio = OrdenLaboratorio::with([
            'tecnico',
            'faena',
            'equipoMinero',
            'equipoUman',
            'versionSd',
            'pcbUman',
            'versionUman'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('ordenlaboratorio.pdf', compact('ordenlaboratorio'));
        return $pdf->download("orden_Laboratorio_{$ordenlaboratorio->id}.pdf");
    }

    public function exportarExcel()
    {
        return Excel::download(new OrdenesLaboratorioExport, 'ordenes_laboratorio.xlsx');
    }
}
