<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaenaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\EquipoMineroController;
use App\Http\Controllers\EquipoUmanController;
use App\Http\Controllers\OrdenFaenaController;
use App\Http\Controllers\OrdenLaboratorioController;
use App\Http\Controllers\CheckFaenasController;
use App\Http\Controllers\ConexionController;
use App\Http\Controllers\PcbUmanController;
use App\Http\Controllers\VersionSdController;
use App\Http\Controllers\VersionUmanController;
use App\Http\Controllers\FallaController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard protegido
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil de usuario (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Usuarios
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

//Roles
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RoleController::class);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Aquí van todas tus rutas de negocio
    Route::resource('ordenlaboratorio', OrdenLaboratorioController::class);
    Route::get('ordenlaboratorio/{id}/pdf', [OrdenLaboratorioController::class, 'descargarPDF'])->name('ordenlaboratorio.pdf');
    Route::get('/ordenes/exportar', [OrdenLaboratorioController::class, 'exportarExcel'])->name('ordenes.exportar');

    Route::get('/ordenfaena/exportar', [OrdenFaenaController::class, 'exportarExcel'])->name('ordenfaena.exportar');
    Route::resource('ordenfaena', OrdenFaenaController::class);
    Route::get('ordenfaena/{id}/pdf', [OrdenFaenaController::class, 'descargarPDF'])->name('ordenfaena.pdf');

    Route::resource('equiposUman', EquipoUmanController::class)->parameters(['equiposUman' => 'equipoUman'])->except(['destroy']);
    Route::get('/equipos-uman/export', [EquipoUmanController::class, 'export'])->name('equiposUman.export');
    Route::get('/equiposuman/{serial}', [EquipoUmanController::class, 'getData'])->name('equiposuman.getData');

    Route::resource('tecnicos', TecnicoController::class);
    Route::resource('faenas', FaenaController::class);
    Route::resource('equiposmineros', EquipoMineroController::class);
    Route::get('/equipos-mineros/{faena}', [EquipoMineroController::class, 'getByFaena'])->name('equiposmineros.getByFaena');

    Route::resource('checkfaenas', CheckFaenasController::class);
    Route::resource('conexiones', ConexionController::class)->parameters(['conexiones' => 'conexion']);
    Route::resource('pcbuman', PcbUmanController::class);
    Route::resource('versionsd', VersionSdController::class);
    Route::resource('versionuman', VersionUmanController::class);
    Route::resource('fallas', FallaController::class);
});

// Rutas de autenticación Breeze
require __DIR__.'/auth.php';
