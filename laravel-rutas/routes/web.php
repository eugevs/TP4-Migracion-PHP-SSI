<?php

use App\Http\Controllers\RutaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('rutas.index');
});

Route::get('/rutas', [RutaController::class, 'index'])->name('rutas.index');
Route::get('/rutas/json', [RutaController::class, 'api'])->name('rutas.json');