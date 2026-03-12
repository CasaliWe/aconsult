<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class ContatoController extends Controller
{
    public function index(): View
    {
        try {
            return view('contato.contato');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina contato.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
