<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Interface\InterfaceController;

//* Rutas sin protección:

Route::get('/', [InterfaceController::class, 'index'])->name('interface.index');
Route::get('/acerca', [InterfaceController::class, 'acerca'])->name('interface.acerca');
Route::get('/contacto', [InterfaceController::class, 'contacto'])->name('interface.contacto');


