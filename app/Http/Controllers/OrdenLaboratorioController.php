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
use App\Models\PcbUman;
use App\Models\VersionSd;
use App\Models\VersionUman;
use Maatwebsite\Excel\Facades\Excel;

class OrdenLaboratorioController extends Controller
{
    public function index()
    {
        $ordenes = OrdenLaboratorio::with(['tecnico', 'faena', 'equipoMinero', 'equipoUman'])
            ->orderByDesc('id')
            ->paginate(10);

        return view('ordenlaboratorio.index', compact('ordenes'));
    }

    public function create()
    {
        $equiposUMAN = EquipoUman::pluck('serial', 'serial');
        $tecnicos = Tecnico::pluck('name', 'id');
        $faenas = Faena::pluck('name', 'id');
        $equiposMineros = EquipoMinero::pluck('name', 'id');
        $umanVersions = VersionUman::all();
        $pcbUmans = PcbUman::all();

        return view('ordenlaboratorio.create', compact('equiposUMAN', 'tecnicos', 'faenas', 'equiposMineros',
         'pcbUmans', 'umanVersions'));
    }

    public function store(StoreOrdenLaboratorioRequest $request)
    {
        OrdenLaboratorio::create($request->validated());
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
        $umanVersions = VersionUman::all();
        $pcbUmans = PcbUman::all();

        return view('ordenlaboratorio.edit', compact('ordenlaboratorio', 'equiposUMAN', 'tecnicos',
         'faenas', 'equiposMineros', 'umanVersions', 'pcbUmans'));
    }

    public function update(UpdateOrdenLaboratorioRequest $request, OrdenLaboratorio $ordenlaboratorio)
    {
        $ordenlaboratorio->update($request->validated());

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
