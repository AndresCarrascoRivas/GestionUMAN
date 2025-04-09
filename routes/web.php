<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenController;
use App\Models\Order;

Route::get('/', HomeController::class);

Route::get('/ordenes', [OrdenController::class, 'index']) ->name('ordenes.index');

Route::get('/orden/crear',[OrdenController::class, 'create']) ->name('ordenes.create');

Route::post('/ordenes', [OrdenController::class, 'store']) ->name('ordenes.store');

Route::get('/ordenes/{order}',[OrdenController::class, 'show']) ->name('ordenes.show');

Route::get('/ordenes/{order}/edit',[OrdenController::class, 'edit']) ->name('ordenes.edit');

Route::put('/ordenes/{order}', [OrdenController::class, 'update']) ->name('ordenes.update');

