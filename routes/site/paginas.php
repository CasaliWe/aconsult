<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
