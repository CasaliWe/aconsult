<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/* ── Login Admin ───────────────────────────────────────── */
Route::prefix('admin')->group(function () {

    // Rotas públicas (login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    // Rotas protegidas (autenticado)
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Redireciona /admin para configurações
        Route::get('/', fn() => redirect()->route('admin.configuracoes'));

        Route::get('/configuracoes', [AdminController::class, 'configuracoes'])->name('admin.configuracoes');
        Route::get('/banners', [AdminController::class, 'banners'])->name('admin.banners');
        Route::get('/logos', [AdminController::class, 'logos'])->name('admin.logos');
        Route::get('/solucoes', [AdminController::class, 'solucoes'])->name('admin.solucoes');
        Route::get('/numeros', [AdminController::class, 'numeros'])->name('admin.numeros');
        Route::get('/news', [AdminController::class, 'news'])->name('admin.news');
        Route::get('/reels', [AdminController::class, 'reels'])->name('admin.reels');
        Route::get('/avaliacoes', [AdminController::class, 'avaliacoes'])->name('admin.avaliacoes');
        Route::get('/faq', [AdminController::class, 'faq'])->name('admin.faq');
        Route::get('/ebook', [AdminController::class, 'ebook'])->name('admin.ebook');
        Route::get('/pagina-aconsult', [AdminController::class, 'paginaAconsult'])->name('admin.pagina-aconsult');
        Route::get('/pagina-solucoes', [AdminController::class, 'paginaSolucoes'])->name('admin.pagina-solucoes');
    });
});
