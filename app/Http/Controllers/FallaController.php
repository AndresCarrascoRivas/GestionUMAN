<?php

namespace App\Http\Controllers;

use App\Models\Falla;
use Illuminate\Http\Request;

class FallaController extends Controller
{
    public function index()
    {
        $fallas = Falla::latest()->paginate(10);
        return view('fallas.index', compact('fallas'));
    }

    public function create()
    {
        return view('fallas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'min:3'],
            'descripcion' => ['nullable', 'string'],
        ]);

        Falla::create($validated);

        return redirect()->route('fallas.index')
                         ->with('success', 'Falla creada correctamente.');
    }

    public function show(Falla $falla)
    {
        return view('fallas.show', compact('falla'));
    }

    public function edit(Falla $falla)
    {
        return view('fallas.edit', compact('falla'));
    }

    public function update(Request $request, Falla $falla)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'min:3'],
            'descripcion' => ['nullable', 'string'],
        ]);

        $falla->update($validated);

        return redirect()->route('fallas.index')
                         ->with('success', 'Falla actualizada correctamente.');
    }

    public function destroy(Falla $falla)
    {
        $falla->delete();

        return redirect()->route('fallas.index')
                         ->with('success', 'Falla eliminada correctamente.');
    }
}
