<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

/* News */
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'mostrar'])->name('news.mostrar');

/* Ebook */
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');
