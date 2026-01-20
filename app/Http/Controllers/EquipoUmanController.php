<?php

namespace App\Http\Controllers;

use App\Models\EquipoUman;
use App\Models\Tecnico;
use App\Http\Requests\StoreEquipoUmanRequest;
use App\Models\PcbUman;
use App\Models\VersionSd;
use App\Models\VersionUman;
use App\Exports\EquiposUmanExport;
use App\Models\Faena;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EquipoUmanController extends Controller
{
    public function index(Request $request)
{
    $query = EquipoUman::with(['tecnico','versionSd','versionUman','pcbUman'])
                       ->orderByDesc('serial');

    if ($request->filled('serial')) {
        $query->where('serial', 'like', '%'.$request->serial.'%');
    }

    if ($request->filled('tecnico_id')) {
        $query->where('tecnico_id', $request->tecnico_id);
    }

    $equipos = $query->paginate(10);

    $tecnicos = Tecnico::orderBy('name')->get();

    return view('equiposUman.index', compact('equipos','tecnicos'));
}


    public function create()
    {
        $tecnicos = Tecnico::all();
        $faenas = Faena::pluck('name', 'id');
        $umanVersions = VersionUman::all();
        $versionSds = VersionSd::all();
        $pcbUmans = PcbUman::all();
        return view('equiposUman.create', compact('tecnicos', 'faenas' , 'umanVersions','versionSds', 'pcbUmans'));
    }

    public function store(StoreEquipoUmanRequest $request)
    {
        EquipoUman::create($request->validated());

        return redirect()->route('equiposUman.index')
                         ->with('success', 'Equipo UMAN creado correctamente.');
    }

    public function show(EquipoUman $equiposUman)
    {
        $equiposUman->load(['tecnico','versionSd','versionUman','pcbUman', 'ordenesLaboratorio']);
        return view('equiposUman.show', compact('equiposUman'));
    }

    public function edit(EquipoUman $equipoUman)
    {
        $faenas = Faena::all();
        return view('equiposUman.edit', compact('equipoUman', 'faenas'));
    }

    public function update(Request $request, EquipoUman $equipoUman)
    {
        $validated = $request->validate([
            'estado'   => ['required', 'string', 'max:50'],
            'faena_id' => ['required', 'exists:faenas,id'],
        ]);

        $equipoUman->update($validated);

        return redirect()->route('equiposUman.index')
                        ->with('success', 'Equipo UMAN actualizado correctamente.');
    }

    public function getData($serial)
    {
        $equipo = EquipoUman::where('serial', $serial)->firstOrFail();

        return response()->json([
            'pcb_uman_id'   => $equipo->pcb_uman_id,
            'version_sd_id'   => $equipo->version_sd_id,
            'uman_version_id' => $equipo->uman_version_id,
            'rpi_version'   => $equipo->rpi_version,
            'ups_version'   => $equipo->ups_version,
            'bam'           => (bool) $equipo->bam,
            'marca_bam'     => $equipo->marca_bam,
            'chip'          => $equipo->chip,
            'imei_chip'     => $equipo->imei_chip,
            'estado'        => $equipo->estado,
            'modelo_uman'   => $equipo->modelo_uman,
        ]);
    }

    public function export()
    {
        return Excel::download(new EquiposUmanExport, 'equipos_uman.xlsx');
    }
}

