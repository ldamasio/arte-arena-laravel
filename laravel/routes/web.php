<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContaController;

Route::middleware(['auth'])->group(function () {
    Route::resource('contas', ContaController::class);
});

Route::get('/', function () {
    return view('welcome');
});
