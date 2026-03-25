<?php

use App\Http\Controllers\AConsultController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SolucoesController;
use App\Http\Controllers\TrabalheConoscoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aconsult', [AConsultController::class, 'index'])->name('aconsult');
Route::get('/solucoes/{tipo}', [SolucoesController::class, 'index'])->name('solucoes')->whereIn('tipo', ['empresas', 'ecommerce', 'comex']);
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
Route::get('/trabalhe-conosco', [TrabalheConoscoController::class, 'index'])->name('trabalhe-conosco');

/* News */
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'mostrar'])->name('news.mostrar');

/* Ebook */
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');
Route::post('/ebook/registrar-download', [EbookController::class, 'registrarDownload'])->name('ebook.registrar-download');
Route::get('/ebook/download/{download}', [EbookController::class, 'baixarArquivo'])->name('ebook.download.arquivo');
