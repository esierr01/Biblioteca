<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Interface\InterfaceController;

//* Rutas sin protección:

Route::get('/', [InterfaceController::class, 'index'])->name('interface.index');


