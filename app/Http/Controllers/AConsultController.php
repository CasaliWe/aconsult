<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\FaqItem;
use App\Models\PaginaAconsultCard;
use App\Models\PaginaAconsultSobre;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class AConsultController extends Controller
{
    public function index(): View
    {
        try {
            $sobreAconsult = PaginaAconsultSobre::first();

            $cards = PaginaAconsultCard::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get()
                ->groupBy('tipo');

            $valoresAconsult = $cards->get('valor', collect());
            $diferenciaisAconsult = $cards->get('diferencial', collect());
            $missaoAconsult = $cards->get('missao', collect());

            $avaliacoes = Avaliacao::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();

            $faqItens = FaqItem::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();

            return view('aconsult.index', compact('sobreAconsult', 'valoresAconsult', 'diferenciaisAconsult', 'missaoAconsult', 'avaliacoes', 'faqItens'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina A Consult.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
