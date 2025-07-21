<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenController;
use App\Models\Order;

Route::get('/', HomeController::class);

Route::resource('ordenes', OrdenController::class)->parameters([
    'ordenes' => 'order'
]);