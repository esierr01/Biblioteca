<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Interface\InterfaceController;
use App\Http\Controllers\LibroController;

//* Rutas sin protección:

Route::get('/', [InterfaceController::class, 'index'])->name('interface.index');
Route::get('/acerca', [InterfaceController::class, 'acerca'])->name('interface.acerca');
Route::get('/contacto', [InterfaceController::class, 'contacto'])->name('interface.contacto');
Route::get('/login', [InterfaceController::class, 'login'])->name('login');
Route::post('/login', [InterfaceController::class, 'valida_login'])->name('interface.valida_login');
Route::post('signout', [InterfaceController::class, 'signout'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::get('index_menu', function(){
        return view('modules.index');
    })->name('index_menu');

    Route::resource('libros', LibroController::class);
});
