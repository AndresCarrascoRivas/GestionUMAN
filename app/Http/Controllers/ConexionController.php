<?php

namespace App\Http\Controllers;

use App\Models\Conexion;
use App\Models\Faena;
use App\Http\Requests\StoreConexionRequest;
use App\Http\Requests\UpdateConexionRequest;
use Illuminate\Http\Request;


class ConexionController extends Controller
{
    public function index(Request $request)
    {
        $query = Conexion::with(['faena'])
                            ->orderByDesc('id');

            if ($request->filled('faena_id')) {
                $query->where('faena_id', $request->faena_id);
            }
        $conexiones = $query->paginate(10);
        $faenas = Faena::all();
        return view('conexiones.index', compact('conexiones', 'faenas'));
    }

    public function create()
    {
        $faenas = Faena::all();
        return view('conexiones.create', compact('faenas'));
    }

    public function store(StoreConexionRequest $request)
    {
        Conexion::create($request->validated());

        return redirect()->route('conexiones.index')
                         ->with('success', 'Conexión creada correctamente.');
    }

    public function show(Conexion $conexion)
    {
        return view('conexiones.show', compact('conexion'));
    }

    public function edit(Conexion $conexion)
    {
        $faenas = Faena::all();
        return view('conexiones.edit', compact('conexion', 'faenas'));
    }

    public function update(UpdateConexionRequest $request, Conexion $conexion)
    {
        $conexion->update($request->validated());

        return redirect()->route('conexiones.index')
                         ->with('success', 'Conexión actualizada correctamente.');
    }

    public function destroy(Conexion $conexion)
    {
        $conexion->delete();

        return redirect()->route('conexiones.index')
                         ->with('success', 'Conexión eliminada correctamente.');
    }
}
