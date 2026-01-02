<?php

namespace App\Http\Controllers;

use App\Models\VersionSd;
use Illuminate\Http\Request;

class VersionSdController extends Controller
{
    public function index()
    {
        $versions = VersionSd::paginate(10); // paginación
        return view('versionsd.index', compact('versions'));
    }

    public function create()
    {
        return view('versionsd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'version' => 'required|string|max:255|unique:version_sds,version',
            'descripcion' => 'nullable|string',
        ]);

        VersionSd::create($request->only(['version','descripcion']));

        return redirect()->route('versionsd.index')
                     ->with('success', 'Versión SD creada correctamente.');
    }

    public function show(VersionSd $versionsd)
    {
        return view('versionsd.show', compact('versionsd'));
    }

    public function edit(VersionSd $versionsd)
    {
        return view('versionsd.edit', compact('versionsd'));
    }

    public function update(Request $request, VersionSd $versionsd)
    {
        $request->validate([
            'version' => 'required|string|max:255|unique:version_sds,version,' . $versionsd->id,
            'descripcion' => 'nullable|string',
        ]);

        $versionsd->update($request->only(['version','descripcion']));

        return redirect()->route('versionsd.index')
                     ->with('success', 'Versión SD actualizada correctamente.');
    }

    public function destroy(VersionSd $versionsd)
    {
        $versionsd->delete();

        return redirect()->route('versionsd.index')
                         ->with('success', 'Versión SD eliminada correctamente.');
    }
}
