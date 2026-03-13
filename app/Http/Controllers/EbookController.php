<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class EbookController extends Controller
{
    /* Página de ebooks */
    public function index(): View
    {
        try {
            return view('ebook.index');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina de ebooks.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
