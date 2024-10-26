<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContaController;
use App\Models\Conta;
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
    Route::middleware(['auth'])->group(function () {
        Route::get('/contas', [ContaController::class, 'index'])->name('contas.index');
    });
    Route::get('/criar-conta', [ContaController::class, 'create'])->name('criar.conta');
    Route::post('/criar-conta', [ContaController::class, 'store'])->name('contas.store');
    Route::get('/contas/criada', function () { return view('contas.criada'); })->name('contas.criada');
    Route::get('/relatorios', [ContaController::class, 'relatorios'])->name('contas.relatorios');
    // Route::get('/contas/{conta}', function (Conta $conta) {
    //     return view('contas.show', compact('conta'));
    // })->middleware(['auth', 'can:view,conta']);
});

require __DIR__.'/auth.php';
