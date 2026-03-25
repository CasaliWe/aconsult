<?php

namespace App\Http\Controllers;

use App\Models\BannerHome;
use App\Models\FaqItem;
use App\Models\LogoParceiro;
use App\Models\Noticia;
use App\Models\Avaliacao;
use App\Models\SolucaoCategoria;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Throwable;

class HomeController extends Controller
{
    public function index(): View
    {
        try {
            $banners = BannerHome::where('ativo', true)->orderBy('ordem')->get();
            $logosParceiros = LogoParceiro::where('ativo', true)->orderBy('ordem')->get();
            $noticiasPreview = Noticia::where('ativo', true)
                ->orderByDesc('data_publicacao')
                ->orderByDesc('id')
                ->limit(3)
                ->get();
            $avaliacoes = Avaliacao::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();
            $faqItens = FaqItem::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();
            $categoriasSolucoes = SolucaoCategoria::where('ativo', true)
                ->with(['cards' => function ($query) {
                    $query->where('ativo', true)
                        ->orderBy('ordem')
                        ->orderByDesc('id');
                }])
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();

            return view('home.home', compact('banners', 'logosParceiros', 'noticiasPreview', 'avaliacoes', 'faqItens', 'categoriasSolucoes'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina home.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }
}
