<?php

use App\Http\Controllers\CheckFaenasController;
use App\Http\Controllers\EquipoMineroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoUmanController;
use App\Http\Controllers\FaenaController;
use App\Http\Controllers\FallaController;
use App\Http\Controllers\OrdenFaenaController;
use App\Http\Controllers\OrdenLaboratorioController;
use App\Http\Controllers\PcbUmanController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\VersionSdController;
use App\Http\Controllers\VersionUmanController;

Route::get('/', HomeController::class);

Route::resource('ordenlaboratorio', OrdenLaboratorioController::class);
Route::get('ordenlaboratorio/{id}/pdf', [OrdenLaboratorioController::class, 'descargarPDF'])->name('ordenlaboratorio.pdf');
Route::get('/ordenes/exportar', [OrdenLaboratorioController::class, 'exportarExcel'])->name('ordenes.exportar');

Route::get('/ordenfaena/exportar', [OrdenFaenaController::class, 'exportarExcel'])->name('ordenfaena.exportar');
Route::resource('ordenfaena', OrdenFaenaController::class);
Route::get('ordenfaena/{id}/pdf', [OrdenFaenaController::class, 'descargarPDF'])->name('ordenfaena.pdf');

Route::resource('equiposUman', EquipoUmanController::class)->except(['destroy']);
Route::get('/equipos-uman/export', [EquipoUmanController::class, 'export'])->name('equiposUman.export');
Route::get('/equiposuman/{serial}', [EquipoUmanController::class, 'getData'])
    ->name('equiposuman.getData');

Route::resource('tecnicos', TecnicoController::class);

Route::resource('faenas', FaenaController::class);

Route::resource('equiposUman', EquipoUmanController::class)
    ->parameters(['equiposUman' => 'equipoUman',])->except(['destroy']);
Route::get('/equipos-mineros/{faena}', [EquipoMineroController::class, 'getByFaena'])
    ->name('equiposmineros.getByFaena');

Route::resource('checkfaenas', CheckFaenasController::class);

Route::resource('pcbuman', PcbUmanController::class);

Route::resource('versionsd', VersionSdController::class);

Route::resource('versionuman', VersionUmanController::class);

route::resource('fallas', FallaController::class);