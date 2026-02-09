<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenFaenaRequest;
use App\Http\Requests\UpdateOrdenFaenaRequest;
use App\Models\EquipoMinero;
use App\Models\EquipoUman;
use App\Models\Faena;
use App\Models\OrdenFaena;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\OrdenesFaenaExport;
use App\Models\Falla;
use Maatwebsite\Excel\Facades\Excel;

class OrdenFaenaController extends Controller
{
    public function index(Request $request)
    {
        $query = OrdenFaena::with(['faena', 'equipoMinero'])
                            ->orderByDesc('id');

            if ($request->filled('faena_id')) {
                $query->where('faena_id', $request->faena_id);
            }

            if ($request->filled('equipo_minero_id')){
                $query->where('equipo_minero_id', $request->equipo_minero_id);
            }

        $ordenesFaena = $query->paginate(10);
        $faenas = Faena::orderBy('name')->get();
        $equiposMinero = EquipoMinero::orderby('name')->get();
        return view('ordenfaena.index', compact('ordenesFaena', 'faenas', 'equiposMinero'));
    }

    public function create()
    {
        $equiposMinero= EquipoMinero::select('id', 'name')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposUman = EquipoUman::select('serial')->orderBy('serial')->get();
        $fallas = Falla::pluck('name', 'id');
        return view ('ordenfaena.create', compact('equiposMinero', 'tecnicos', 'faenas', 'equiposUman', 'fallas'));
    }

    public function store(StoreOrdenFaenaRequest $request)
    {
        OrdenFaena::create($request->validated());
        return redirect()->route('ordenfaena.index')
                         ->with('success', 'orden creada correctamente.');
    }

    public function show(OrdenFaena $ordenfaena)
    {
        $ordenfaena->load(['tecnico', 'faena', 'equipoMinero']);
        return view('ordenfaena.show', compact('ordenfaena'));
    }

    public function edit(OrdenFaena $ordenfaena)
    {
        $equiposMinero = EquipoMinero::select('id', 'name')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposUman = EquipoUman::select('serial')->orderBy('serial')->get();
        $fallas = Falla::pluck('name', 'id');

        return view('ordenfaena.edit', compact('ordenfaena', 'equiposMinero', 'tecnicos', 'faenas', 'equiposUman', 'fallas'));
    }

    public function update(UpdateOrdenFaenaRequest $request, OrdenFaena $ordenfaena)
    {
        $ordenfaena->fill($request->validated());
        $ordenfaena->save();

        return redirect()->route('ordenfaena.index')
                     ->with('success', 'Orden actualizada correctamente.');

    }

    public function descargarPDF($id)
    {
        $ordenfaena = OrdenFaena::with(['tecnico', 'faena'])->findOrFail($id);

        $pdf = Pdf::loadView('ordenfaena.pdf', compact('ordenfaena'));
        return $pdf->download("orden_Faena_{$ordenfaena->id}.pdf");
    }

    public function exportarExcel()
    {
        return Excel::download(new OrdenesFaenaExport, 'ordenes_faena.xlsx');
    }

}
