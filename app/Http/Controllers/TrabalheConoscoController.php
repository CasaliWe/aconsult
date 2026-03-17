<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class TrabalheConoscoController extends Controller
{
    public function index(): View
    {
        try {
            return view('trabalhe-conosco.index');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina trabalhe conosco.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
