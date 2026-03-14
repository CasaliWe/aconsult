<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class AConsultController extends Controller
{
    public function index(): View
    {
        try {
            return view('aconsult.index');
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina A Consult.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
