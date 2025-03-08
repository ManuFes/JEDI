<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GestionEdificiosController;
use App\Http\Controllers\EdificiosController; // Agregado para que Laravel encuentre la clase
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

// Agrupamos las rutas que requieren autenticación
Route::middleware('auth')->group(function () {

    // Rutas MAIN
    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::post('/main', [MainController::class, 'store'])->name('main.store');

    // Gestión de edificios por departamento
    Route::get('/gestion-edificios/{id}', [GestionEdificiosController::class, 'index'])
        ->name('gestion-edificios');

    // Asociar edificio a un departamento
    Route::get('/asociar-edificio/{id}', [GestionEdificiosController::class, 'asociarEdificio'])
        ->name('asociar-edificio');
    Route::post('/guardar-asociacion', [GestionEdificiosController::class, 'guardarAsociacion'])
        ->name('guardar-asociacion');

    // Actualizar y eliminar despachos de asociación
    Route::post('/actualizar-despachos/{id}', [GestionEdificiosController::class, 'actualizarDespachos'])
        ->name('actualizar-despachos');
    Route::post('/eliminar-asociacion/{id}', [GestionEdificiosController::class, 'eliminarAsociacion'])
        ->name('eliminar-asociacion');

    // Vista "En construcción" para profesores
    Route::get('/en-construccion', function () {
        return view('en-construccion');
    })->name('en-construccion');

    // Rutas de perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestión general de edificios
    Route::get('/gestion-edificios-general', [EdificiosController::class, 'index'])
        ->name('gestion-edificios-general');

        // Rutas para la gestión de edificios (CRUD completo)
    Route::get('/edificios/create', [EdificiosController::class, 'create'])->name('edificios.create');
    Route::post('/edificios', [EdificiosController::class, 'store'])->name('edificios.store');
    Route::get('/edificios/{id}/edit', [EdificiosController::class, 'edit'])->name('edificios.edit');
    Route::put('/edificios/{id}', [EdificiosController::class, 'update'])->name('edificios.update');
    Route::delete('/edificios/{id}', [EdificiosController::class, 'destroy'])->name('edificios.destroy');



});

require __DIR__.'/auth.php';
