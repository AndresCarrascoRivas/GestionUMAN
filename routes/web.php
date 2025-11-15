<?php

use App\Http\Controllers\EquipoMineroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipoUmanController;
use App\Http\Controllers\FaenaController;
use App\Http\Controllers\OrdenFaenaController;
use App\Http\Controllers\OrdenLaboratorioController;
use App\Http\Controllers\TecnicoController;

Route::get('/', HomeController::class);

Route::resource('ordenlaboratorio', OrdenLaboratorioController::class);
Route::get('ordenlaboratorio/{id}/pdf', [OrdenLaboratorioController::class, 'descargarPDF'])->name('ordenlaboratorio.pdf');
Route::get('/ordenes/exportar', [OrdenLaboratorioController::class, 'exportarExcel'])->name('ordenes.exportar');

Route::get('/ordenfaena/exportar', [OrdenFaenaController::class, 'exportarExcel'])->name('ordenfaena.exportar');
Route::resource('ordenfaena', OrdenFaenaController::class);
Route::get('ordenfaena/{id}/pdf', [OrdenFaenaController::class, 'descargarPDF'])->name('ordenfaena.pdf');

Route::resource('equiposUman', EquipoUmanController::class)->except(['destroy']);

Route::resource('tecnicos', TecnicoController::class);

Route::resource('faenas', FaenaController::class);

Route::resource('equiposmineros', EquipoMineroController::class);