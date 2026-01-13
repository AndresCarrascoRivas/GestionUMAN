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
        public function index(Request $request)
        {
            $query = CheckFaena::with(['tecnico', 'faena', 'equipoMinero'])
                            ->orderBy('id');

            if ($request->filled('faena_id')) {
                $query->where('faena_id', $request->faena_id);
            }

            if ($request->filled('tecnico_id')) {
                $query->where('tecnico_id', $request->tecnico_id);
            }

            if ($request->filled('equipo_minero_id')){
                $query->where('equipo_minero_id', $request->equipo_minero_id);
            }

            $checkFaenas = $query->paginate(10);

            $faenas = Faena::orderBy('name')->get();
            $tecnicos = Tecnico::orderBy('name')->get();
            $equiposMinero = EquipoMinero::orderby('name')->get();

            return view('checkfaenas.index', compact('checkFaenas', 'faenas', 'tecnicos', 'equiposMinero'));
        }

    public function create()
    {
        $tecnicos = Tecnico::select('id', 'name')->orderBy('name')->get();
        $faenas = Faena::select('id', 'name')->orderBy('name')->get();
        $equiposMinero = EquipoMinero::select('id', 'name')->get();

        return view('checkfaenas.create', compact('tecnicos', 'faenas', 'equiposMinero'));
    }

    public function store(StoreCheckFaenaRequest $request)
    {
        CheckFaena::create($request->validated());
        return redirect()->route('checkfaenas.index')
                         ->with('success', 'check de faena creado correctamente.');
    }
}
