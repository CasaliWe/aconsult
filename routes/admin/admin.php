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

        // Configurações
        Route::get('/configuracoes', [AdminController::class, 'configuracoes'])->name('admin.configuracoes');
        Route::post('/configuracoes', [AdminController::class, 'configuracoesSalvar'])->name('admin.configuracoes.salvar');

        // Banners
        Route::get('/banners', [AdminController::class, 'banners'])->name('admin.banners');
        Route::post('/banners', [AdminController::class, 'bannerSalvar'])->name('admin.banners.salvar');
        Route::delete('/banners/{id}', [AdminController::class, 'bannerExcluir'])->name('admin.banners.excluir');
        Route::post('/banners-pagina', [AdminController::class, 'bannerPaginaSalvar'])->name('admin.banners.pagina.salvar');

        // Logos Parceiros
        Route::get('/logos', [AdminController::class, 'logos'])->name('admin.logos');
        Route::post('/logos', [AdminController::class, 'logoSalvar'])->name('admin.logos.salvar');
        Route::delete('/logos/{id}', [AdminController::class, 'logoExcluir'])->name('admin.logos.excluir');

        Route::get('/solucoes', [AdminController::class, 'solucoes'])->name('admin.solucoes');
        Route::post('/solucoes/categorias', [AdminController::class, 'solucaoCategoriaSalvar'])->name('admin.solucoes.categorias.salvar');
        Route::delete('/solucoes/categorias/{id}', [AdminController::class, 'solucaoCategoriaExcluir'])->name('admin.solucoes.categorias.excluir');
        Route::post('/solucoes/cards', [AdminController::class, 'solucaoCardSalvar'])->name('admin.solucoes.cards.salvar');
        Route::delete('/solucoes/cards/{id}', [AdminController::class, 'solucaoCardExcluir'])->name('admin.solucoes.cards.excluir');
        Route::get('/numeros', [AdminController::class, 'numeros'])->name('admin.numeros');
        Route::post('/numeros', [AdminController::class, 'numerosSalvar'])->name('admin.numeros.salvar');
        Route::get('/news', [AdminController::class, 'news'])->name('admin.news');
        Route::post('/news', [AdminController::class, 'newsSalvar'])->name('admin.news.salvar');
        Route::delete('/news/{id}', [AdminController::class, 'newsExcluir'])->name('admin.news.excluir');
        Route::post('/news/upload-imagem', [AdminController::class, 'newsUploadImagem'])->name('admin.news.upload-imagem');
        Route::get('/reels', [AdminController::class, 'reels'])->name('admin.reels');
        Route::get('/avaliacoes', [AdminController::class, 'avaliacoes'])->name('admin.avaliacoes');
        Route::post('/avaliacoes', [AdminController::class, 'avaliacaoSalvar'])->name('admin.avaliacoes.salvar');
        Route::delete('/avaliacoes/{id}', [AdminController::class, 'avaliacaoExcluir'])->name('admin.avaliacoes.excluir');
        Route::get('/faq', [AdminController::class, 'faq'])->name('admin.faq');
        Route::post('/faq', [AdminController::class, 'faqSalvar'])->name('admin.faq.salvar');
        Route::delete('/faq/{id}', [AdminController::class, 'faqExcluir'])->name('admin.faq.excluir');
        Route::get('/ebook', [AdminController::class, 'ebook'])->name('admin.ebook');
        Route::post('/ebook/configuracoes', [AdminController::class, 'ebookConfiguracaoSalvar'])->name('admin.ebook.configuracoes.salvar');
        Route::post('/ebook/cards', [AdminController::class, 'ebookCardSalvar'])->name('admin.ebook.cards.salvar');
        Route::delete('/ebook/cards/{id}', [AdminController::class, 'ebookCardExcluir'])->name('admin.ebook.cards.excluir');
        Route::get('/pagina-aconsult', [AdminController::class, 'paginaAconsult'])->name('admin.pagina-aconsult');
        Route::get('/pagina-solucoes', [AdminController::class, 'paginaSolucoes'])->name('admin.pagina-solucoes');
    });
});
