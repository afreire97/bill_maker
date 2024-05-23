<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CulturaController;
use App\Http\Controllers\DistribuidorController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::get('/listar-clientes', [DistribuidorController::class, 'listar_clientes'])->name('listarClientes');




    //PRESUPUESTOS

    Route::get('/presupuestos', [PresupuestoController::class, 'create'])->name('presupuestos.create');
    Route::post('/previsualizar-presupuesto', [PresupuestoController::class, 'previsualizarPresupuesto'])->name('previsualizar');




});


Route::middleware(SetLocale::class)->group(function () {

    Route::get('/monedas', [CulturaController::class, 'index'])->name('dashboardMonedas');
    Route::post('setLocale', [CulturaController::class, 'setLocale'])->name('setLocale');


});





require __DIR__.'/auth.php';
