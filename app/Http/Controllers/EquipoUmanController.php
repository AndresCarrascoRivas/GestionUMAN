<?php

namespace App\Http\Controllers;

use App\Models\EquipoUman;
use App\Models\Tecnico;
use App\Http\Requests\StoreEquipoUmanRequest;

class EquipoUmanController extends Controller
{
    public function index()
    {
        $equipos = EquipoUman::with('tecnico')->paginate(10);
        return view('equiposUman.index', compact('equipos'));
    }

    public function create()
    {
        $tecnicos = Tecnico::all();
        return view('equiposUman.create', compact('tecnicos'));
    }

    public function store(StoreEquipoUmanRequest $request)
    {
        EquipoUman::create($request->validated());

        return redirect()->route('equiposUman.index')
                         ->with('success', 'Equipo UMAN creado correctamente.');
    }

    public function show(EquipoUman $equiposUman)
    {
        return view('equiposUman.show', compact('equiposUman'));
    }

    public function edit(EquipoUman $equipoUman)
    {
        $tecnicos = Tecnico::where('estado', 'activo')->get();
        return view('equiposUman.edit', compact('equipoUman', 'tecnicos'));
    }

    public function update(StoreEquipoUmanRequest $request, EquipoUman $equipoUman)
    {
        $equipoUman->update($request->validated());

        return redirect()->route('equiposUman.index')
                         ->with('success', 'Equipo UMAN actualizado correctamente.');
    }
}

