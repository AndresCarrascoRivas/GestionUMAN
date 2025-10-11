<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenFaenaRequest;
use App\Models\EquipoMinero;
use App\Models\EquipoUman;
use App\Models\Faena;
use App\Models\OrdenFaena;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class OrdenFaenaController extends Controller
{
    public function index()
    {
        $ordenesFaena = OrdenFaena::orderBy('id', 'desc')->paginate(10);
        return view('ordenfaena.index', compact('ordenesFaena'));
    }

    public function create()
    {
        $equiposminero= EquipoMinero::select('id', 'name')->get();
        $tecnicos = Tecnico::select('id', 'name')->get();
        $faenas = Faena::select('id', 'name')->get();
        $equiposUman = EquipoUman::select('serial')->orderBy('serial')->get();
        return view ('ordenfaena.create', compact('equiposminero', 'tecnicos', 'faenas', 'equiposUman'));
    }

    public function store(StoreOrdenFaenaRequest $request)
    {
        OrdenFaena::create($request->validated());
        return redirect()->route('ordenfaena.index')
                         ->with('success', 'orden creada correctamente.');
    }
}
