<?php

namespace App\Http\Controllers;

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
        $faenas = Faena::orderBy('name')->get();
        return view('equiposmineros.create', compact('faenas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faena_id' => 'required|exists:faenas,id',
            'antena_rf' => 'nullable|numeric|min:0',
            'antena_gps' => 'nullable|numeric|min:0',
        ]);

        EquipoMinero::create([
            'name' => $request->name,
            'faena_id' => $request->faena_id,
            'antena_rf' => $request->antena_rf,
            'antena_gps' => $request->antena_gps,
        ]);

        return redirect()->route('equiposmineros.index')->with('success', 'Equipo minero creado exitosamente.');
    }

        public function show(EquipoMinero $equiposminero)
    {
        return view('equiposmineros.show', compact('equiposminero'));
    }

    public function edit(EquipoMinero $equiposminero)
    {
        $faenas = Faena::all();
        return view('equiposmineros.edit', compact('equiposminero', 'faenas'));
    }

    public function update(Request $request, EquipoMinero $equiposminero)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'faena_id' => 'nullable|exists:faenas,id',
            'antena_rf' => 'nullable|numeric|min:0',
            'antena_gps' => 'nullable|numeric|min:0',
        ]);

        $equiposminero->update($request->only('name', 'faena_id', 'antena_rf', 'antena_gps'));

        return redirect()->route('equiposmineros.index')->with('success', 'Equipo Minero actualizado correctamente.');
    }

    public function destroy(EquipoMinero $equiposminero)
    {
        $equiposminero->delete();

        return redirect()->route('equiposmineros.index')->with('success', 'Equipo Minero eliminado.');
    }

    public function getByFaena($faenaId)
    {
        $equipos = EquipoMinero::where('faena_id', $faenaId)->pluck('name', 'id');

        return response()->json($equipos);
    }
}
