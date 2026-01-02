<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckFaenaRequest;
use App\Models\CheckFaena;
use App\Models\EquipoMinero;
use App\Models\Faena;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class CheckFaenasController extends Controller
{
        public function index()
    {
        $checkFaenas = CheckFaena::with(['tecnico', 'faena', 'equipoMinero'])
                                 ->orderBy('id')->paginate(10);
        return view('checkfaenas.index', compact('checkFaenas'));
    }

    public function create()
    {
        $tecnicos = Tecnico::select('id', 'name')->orderBy('name')->get();
        $faenas = Faena::select('id', 'name')->orderBy('name')->get();
        $equiposMinero = EquipoMinero::select('id', 'serial')->get();

        return view('checkfaenas.create', compact('tecnicos', 'faenas', 'equiposMinero'));
    }

    public function store(StoreCheckFaenaRequest $request)
    {
        CheckFaena::create($request->validated());
        return redirect()->route('checkfaenas.index')
                         ->with('success', 'check de faena creado correctamente.');
    }
}
