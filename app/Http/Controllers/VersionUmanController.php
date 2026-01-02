<?php

namespace App\Http\Controllers;

use App\Models\VersionUman;
use Illuminate\Http\Request;

class VersionUmanController extends Controller
{
    public function index()
    {
        $versiones = VersionUman::paginate(10);
        return view('versionuman.index', compact('versiones'));
    }   

    public function create()
    {
        return view('versionuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        VersionUman::create($request->all());

        return redirect()->route('versionuman.index')
                         ->with('success', 'Versión UMAN creada correctamente.');
    }

    public function show(VersionUman $versionuman)
    {
        return view('versionuman.show', compact('versionuman'));
    }

    public function edit(VersionUman $versionuman)
    {
        return view('versionuman.edit', compact('versionuman'));
    }

    public function update(Request $request, VersionUman $versionuman)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $versionuman->update($request->all());

        return redirect()->route('versionuman.index')
                         ->with('success', 'Versión UMAN actualizada correctamente.');
    }

    public function destroy(VersionUman $versionuman)
    {
        $versionuman->delete();

        return redirect()->route('versionuman.index')
                         ->with('success', 'Versión UMAN eliminada correctamente.');
    }
}
