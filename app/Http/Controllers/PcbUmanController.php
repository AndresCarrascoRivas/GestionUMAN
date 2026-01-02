<?php

namespace App\Http\Controllers;

use App\Models\PcbUman;
use Illuminate\Http\Request;

class PcbUmanController extends Controller
{
    public function index()
    {
        $pcbs = PcbUman::orderBy('name')->paginate(10);
        return view('pcbuman.index', compact('pcbs'));
    }

    public function create()
    {
        return view('pcbuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pcb_umans,name',
            'descripcion' => 'nullable|string',
        ]);

        PcbUman::create($request->only('name', 'descripcion'));

        return redirect()
            ->route('pcbuman.index')
            ->with('success', 'PCB UMAN creado correctamente.');
    }

    public function edit(PcbUman $pcbuman)
    {
        return view('pcbuman.edit', compact('pcbuman'));
    }

    public function update(Request $request, PcbUman $pcbuman)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pcb_umans,name,' . $pcbuman->id,
            'descripcion' => 'nullable|string',
        ]);

        $pcbuman->update($request->only('name', 'descripcion'));

        return redirect()
            ->route('pcbuman.index')
            ->with('success', 'PCB UMAN actualizado correctamente.');
    }

    public function show(PcbUman $pcbuman)
    {
        return view('pcbuman.show', compact('pcbuman'));
    }

    public function destroy(PcbUman $pcbuman)
    {
        $pcbuman->delete();

        return redirect()
            ->route('pcbuman.index')
            ->with('success', 'PCB UMAN eliminado correctamente.');
    }
}
