<?php

use App\Http\Controllers\EquipoMineroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\EquipoUmanController;
use App\Http\Controllers\FaenaController;
use App\Http\Controllers\OrdenFaenaController;
use App\Http\Controllers\OrdenLaboratorioController;
use App\Http\Controllers\TecnicoController;
use App\Models\Order;

Route::get('/', HomeController::class);

Route::resource('ordenes', OrdenController::class)->parameters([
    'ordenes' => 'order'
]);

Route::resource('ordenlaboratorio', OrdenLaboratorioController::class);

Route::resource('ordenfaena', OrdenFaenaController::class);

Route::resource('equiposUman', EquipoUmanController::class)->except(['destroy']);

Route::resource('tecnicos', TecnicoController::class);

Route::resource('faenas', FaenaController::class);

Route::resource('equiposmineros', EquipoMineroController::class);