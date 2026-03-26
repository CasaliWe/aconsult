<?php

namespace App\Http\Controllers;

use App\Models\BannerHome;
use App\Models\Configuracao;
use App\Models\FaqItem;
use App\Models\LogoParceiro;
use App\Models\Noticia;
use App\Models\Avaliacao;
use App\Models\Reel;
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
            $reels = Reel::where('ativo', true)
                ->orderBy('ordem')
                ->orderByDesc('id')
                ->get();
            $configuracao = Configuracao::first();
            $instagramMarcaId = $this->extrairInstagramHandle($configuracao?->social_instagram);

            return view('home.home', compact('banners', 'logosParceiros', 'noticiasPreview', 'avaliacoes', 'faqItens', 'categoriasSolucoes', 'reels', 'instagramMarcaId'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina home.', [
                'mensagem' => $erro->getMessage(),
            ]);

            abort(500, 'Pagina em construção.');
        }
    }

    private function extrairInstagramHandle(?string $urlOuHandle): string
    {
        if (empty($urlOuHandle)) {
            return 'aconsultcontabilidade';
        }

        $valor = trim($urlOuHandle);

        if (str_contains($valor, 'instagram.com')) {
            $path = (string) parse_url($valor, PHP_URL_PATH);
            $partes = array_values(array_filter(explode('/', trim($path, '/'))));
            if (!empty($partes[0])) {
                return ltrim($partes[0], '@');
            }
        }

        return ltrim($valor, '@');
    }
}
