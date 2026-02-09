<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipoMineroRequest;
use App\Http\Requests\UpdateEquipoMineroRequest;
use App\Models\EquipoMinero;
use App\Models\Faena;
use Illuminate\Http\Request;

class EquipoMineroController extends Controller
{
    public function index(Request $request)
    {
        $query = EquipoMinero::with(['faena'])
                            ->orderByDesc('id');

            if ($request->filled('faena_id')) {
                $query->where('faena_id', $request->faena_id);
            }

        $equiposmineros = $query->paginate(10);
        $faenas = Faena::orderBy('name')->get();
        return view('equiposmineros.index', compact('equiposmineros', 'faenas'));
    }

    public function create()
    {
        $faenas = Faena::select('id', 'name')->orderBy('name')->get();

        return view('equiposmineros.create', compact('faenas'));
    }

    public function store(StoreEquipoMineroRequest $request)
    {
        EquipoMinero::create($request->validated());

        return redirect()->route('equiposmineros.index')
            ->with('success', 'Equipo minero creado correctamente.');
    }

    public function show(EquipoMinero $equiposminero)
    {
        $equiposminero->load('faena');

        return view('equiposmineros.show', compact('equiposminero'));
    }

    public function edit(EquipoMinero $equiposminero)
    {
        $faenas = Faena::select('id', 'name')->orderBy('name')->get();

        return view('equiposmineros.edit', compact('equiposminero', 'faenas'));
    }

    public function update(UpdateEquipoMineroRequest $request, EquipoMinero $equiposminero)
    {
        $equiposminero->update($request->validated());

        return redirect()->route('equiposmineros.index')
            ->with('success', 'Equipo minero actualizado correctamente.');
    }

    public function getByFaena($faenaId)
    {
        $equipos = EquipoMinero::where('faena_id', $faenaId)->pluck('name', 'id');

        return response()->json($equipos);
    }
}
