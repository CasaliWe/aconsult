<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class AdminController extends Controller
{
    /**
     * Página de Configurações (página inicial do admin).
     */
    public function configuracoes(): View
    {
        try {
            return view('admin.paginas.configuracoes');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de configurações.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Banners.
     */
    public function banners(): View
    {
        try {
            return view('admin.paginas.banners');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de banners.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Logos da Empresa.
     */
    public function logos(): View
    {
        try {
            return view('admin.paginas.logos');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de logos.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Soluções.
     */
    public function solucoes(): View
    {
        try {
            return view('admin.paginas.solucoes');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de soluções.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Nossos Números.
     */
    public function numeros(): View
    {
        try {
            return view('admin.paginas.numeros');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de nossos números.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de News.
     */
    public function news(): View
    {
        try {
            return view('admin.paginas.news');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de news.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Reels.
     */
    public function reels(): View
    {
        try {
            return view('admin.paginas.reels');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de reels.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Avaliações.
     */
    public function avaliacoes(): View
    {
        try {
            return view('admin.paginas.avaliacoes');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de avaliações.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Perguntas Frequentes.
     */
    public function faq(): View
    {
        try {
            return view('admin.paginas.faq');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de FAQ.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página de Ebook.
     */
    public function ebook(): View
    {
        try {
            return view('admin.paginas.ebook');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de ebook.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página Aconsult (textos, imagens, nossos valores, nossos diferenciais).
     */
    public function paginaAconsult(): View
    {
        try {
            return view('admin.paginas.pagina-aconsult');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página Aconsult.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }

    /**
     * Página Soluções (conteúdos das 3 soluções).
     */
    public function paginaSolucoes(): View
    {
        try {
            return view('admin.paginas.pagina-solucoes');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar página de soluções detalhadas.', ['mensagem' => $erro->getMessage()]);
            abort(500, 'Erro ao carregar a página.');
        }
    }
}
