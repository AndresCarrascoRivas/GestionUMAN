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

class OrdenFaenaController extends Controller
{
    public function index()
    {
        $ordenesFaena = OrdenFaena::with(['equipoMinero', 'faena'])->orderBy('id', 'desc')->paginate(10);
        return view('ordenfaena.index', compact('ordenesFaena'));
    }

    public function create()
    {
        $equiposMinero= EquipoMinero::select('id', 'name')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposUman = EquipoUman::select('serial')->orderBy('serial')->get();
        return view ('ordenfaena.create', compact('equiposMinero', 'tecnicos', 'faenas', 'equiposUman'));
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

        return view('ordenfaena.edit', compact('ordenfaena', 'equiposMinero', 'tecnicos', 'faenas', 'equiposUman'));
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

}
