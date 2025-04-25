<?php

use App\Livewire\ConsultaTramite;
use App\Livewire\FormularioTramite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TramiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::post('/tramite', [TramiteController::class, 'store'])->name('tramite.store');
Route::get('/formulario-tramite', FormularioTramite::class)->name('formulario.tramite');
Route::get('/consulta-tramite', ConsultaTramite::class)->name('consulta.tramite');
