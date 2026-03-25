<?php

namespace App\Providers;

use App\Models\BannerPagina;
use App\Models\Configuracao;
use App\Models\NossoNumero;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (Schema::hasTable('configuracoes')) {
            $config = Configuracao::first();
            View::share('config', $config);
        }

        if (Schema::hasTable('banners_paginas')) {
            $bannersPaginas = BannerPagina::all()->keyBy('pagina');
            View::share('bannersPaginas', $bannersPaginas);
        }

        if (Schema::hasTable('nossos_numeros')) {
            $nossosNumeros = NossoNumero::orderBy('ordem')->get();
            View::share('nossosNumeros', $nossosNumeros);
        }
    }
}
