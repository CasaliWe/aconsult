<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\PaginaSolucaoConteudo;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Throwable;

class SolucoesController extends Controller
{
    public function index(string $tipo): View
    {
        try {
            $solucoesAtivas = PaginaSolucaoConteudo::query()
                ->where('ativo', true)
                ->orderBy('ordem')
                ->orderBy('id')
                ->get();

            if ($solucoesAtivas->isEmpty()) {
                abort(404);
            }

            $solucao = $solucoesAtivas->firstWhere('tipo', $tipo);

            if (!$solucao) {
                abort(404);
            }

            $faqItens = FaqItem::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();

            return view('solucoes.index', compact('solucao', 'solucoesAtivas', 'faqItens'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina Solucoes.', [
                'tipo' => $tipo,
                'mensagem' => $erro->getMessage(),
            ]);
            abort(500, 'Pagina em construção.');
        }
    }
}
