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
use Maatwebsite\Excel\Facades\Excel;

class OrdenLaboratorioController extends Controller
{
    public function index()
    {
        $ordenLaboratorio = OrdenLaboratorio::orderBy('id', 'desc')->paginate(10);
        return view('ordenlaboratorio.index', compact('ordenLaboratorio'));
    }

    public function create()
    {
        $equipos = EquipoUman::select('serial')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposMinero= EquipoMinero::select('id', 'name')->get();
        return view ('ordenlaboratorio.create', compact('equipos', 'tecnicos', 'faenas', 'equiposMinero'));
    }

    public function store(StoreOrdenLaboratorioRequest $request)
    {
        OrdenLaboratorio::create($request->validated());
        return redirect()->route('ordenlaboratorio.index')
                         ->with('success', 'orden creada correctamente.');
    }

    public function show(OrdenLaboratorio $ordenlaboratorio)
    {
        $ordenlaboratorio->load(['tecnico', 'faena', 'equipominero']);
        return view('ordenlaboratorio.show', compact('ordenlaboratorio'));
    }

    public function edit(OrdenLaboratorio $ordenlaboratorio)
    {
        $equipos = EquipoUman::select('serial')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposMinero= EquipoMinero::select('id', 'name')->get();

        return view('ordenlaboratorio.edit', compact('ordenlaboratorio', 'equipos', 'tecnicos', 'faenas', 'equiposMinero'));
    }

    public function update(UpdateOrdenLaboratorioRequest $request, OrdenLaboratorio $ordenlaboratorio)
    {
        $ordenlaboratorio->fill($request->validated());
        $ordenlaboratorio->save();

        return redirect()->route('ordenlaboratorio.index')
                     ->with('success', 'Orden actualizada correctamente.');

    }

    public function descargarPDF($id)
    {
        $ordenlaboratorio = OrdenLaboratorio::with(['tecnico', 'faena', 'equipominero'])->findOrFail($id);

        $pdf = Pdf::loadView('ordenlaboratorio.pdf', compact('ordenlaboratorio'));
        return $pdf->download("orden_Laboratorio_{$ordenlaboratorio->id}.pdf");
    }

    public function exportarExcel()
    {
        return Excel::download(new OrdenesLaboratorioExport, 'ordenes_laboratorio.xlsx');
    }
}
