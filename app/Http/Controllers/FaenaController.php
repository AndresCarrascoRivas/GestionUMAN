<?php

namespace App\Http\Controllers;
use App\Models\Faena;

use Illuminate\Http\Request;

class FaenaController extends Controller
{
    public function index()
    {
        $faenas = Faena::orderBy('name')->paginate(10);
        return view('faenas.index', compact('faenas'));
    }

    public function create()
    {
        return view('faenas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:faenas,name',
        ]);

        Faena::create($request->only('name'));

        return redirect()->route('faenas.index')->with('success', 'Faena creada exitosamente.');
    }

    public function edit(Faena $faena)
    {
        return view('faenas.edit', compact('faena'));
    }

    public function update(Request $request, Faena $faena)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:faenas,name,' . $faena->id,
        ]);

        $faena->update($request->only('name'));

        return redirect()->route('faenas.index')->with('success', 'Faena actualizada correctamente.');
    }

    public function show(Faena $faena)
    {
        return view('faenas.show', compact('faena'));
    }

    public function destroy(Faena $faena)
    {
        $faena->delete();

        return redirect()->route('faenas.index')->with('success', 'Faena eliminada.');
    }
}
