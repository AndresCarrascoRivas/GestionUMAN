<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Models\Faena;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::with('faena')->paginate(10);
        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        $faenas = Faena::orderBy('name')->get();
        return view('tecnicos.create', compact('faenas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faena_id' => 'required|exists:faenas,id',
        ]);

        Tecnico::create([
            'name' => $request->name,
            'faena_id' => $request->faena_id,
        ]);

        return redirect()->route('tecnicos.index')->with('success', 'Técnico creado correctamente.');
    }

    public function show(Tecnico $tecnico)
    {
        return view('tecnicos.show', compact('tecnico'));
    }

    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(Request $request, Tecnico $tecnico)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $tecnico->update($request->only('name'));

        return redirect()->route('tecnicos.index')->with('success', 'Técnico actualizado correctamente.');
    }

    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();

        return redirect()->route('tecnicos.index')->with('success', 'Técnico eliminado.');
    }
}