<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class NewsController extends Controller
{
    /* Lista todas as notícias */
    public function index(): View
    {
        try {
            return view('news.index');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina de noticias.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }

    /* Exibe uma notícia individual */
    public function mostrar(string $id): View
    {
        try {
            return view('news.mostrar', compact('id'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a noticia.', [
                'mensagem' => $erro->getMessage(),
                'id' => $id,
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
