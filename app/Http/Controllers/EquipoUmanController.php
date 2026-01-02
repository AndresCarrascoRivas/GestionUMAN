<?php

namespace App\Http\Controllers;

use App\Models\EquipoUman;
use App\Models\Tecnico;
use App\Http\Requests\StoreEquipoUmanRequest;
use App\Models\PcbUman;
use App\Models\VersionSd;
use App\Models\VersionUman;
use App\Exports\EquiposUmanExport;
use Maatwebsite\Excel\Facades\Excel;

class EquipoUmanController extends Controller
{
    public function index()
    {
        $equipos = EquipoUman::with(['tecnico','versionSd','versionUman','pcbUman'])->paginate(10);
        return view('equiposUman.index', compact('equipos',));
    }

    public function create()
    {
        $tecnicos = Tecnico::all();
        $umanVersions = VersionUman::all();
        $versionSds = VersionSd::all();
        $pcbUmans = PcbUman::all();
        return view('equiposUman.create', compact('tecnicos', 'umanVersions','versionSds', 'pcbUmans'));
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
        $tecnicos = Tecnico::where('estado', 'activo')->get();
        return view('equiposUman.edit', compact('equipoUman', 'tecnicos'));
    }

    public function update(StoreEquipoUmanRequest $request, EquipoUman $equipoUman)
    {
        $equipoUman->update($request->validated());

        return redirect()->route('equiposUman.index')
                         ->with('success', 'Equipo UMAN actualizado correctamente.');
    }

    public function getData($serial)
    {
        $equipo = EquipoUman::where('serial', $serial)->firstOrFail();

        return response()->json([
            'pcb_uman_id'   => $equipo->pcb_uman_id,
            'uman_version_id' => $equipo->uman_version_id,
            'rpi_version'   => $equipo->rpi_version,
            'ups_version'   => $equipo->ups_version,
            'bam'           => $equipo->bam,
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

