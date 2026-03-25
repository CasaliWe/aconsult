<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class NewsController extends Controller
{
    /* Lista todas as notícias */
    public function index(): View
    {
        try {
            $noticias = Noticia::where('ativo', true)
                ->orderByDesc('data_publicacao')
                ->orderByDesc('id')
                ->get();

            return view('news.index', compact('noticias'));
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
            $noticia = Noticia::where('ativo', true)->findOrFail((int) $id);

            $outrasNoticias = Noticia::where('ativo', true)
                ->where('id', '!=', $noticia->id)
                ->orderByDesc('data_publicacao')
                ->orderByDesc('id')
                ->limit(3)
                ->get();

            return view('news.mostrar', compact('noticia', 'outrasNoticias'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a noticia.', [
                'mensagem' => $erro->getMessage(),
                'id' => $id,
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
