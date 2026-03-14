<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Throwable;

class SolucoesController extends Controller
{
    private const SOLUCOES = [
        'empresas' => [
            'titulo' => 'Soluções para Empresas',
            'subtitulo' => 'Tributação e contabilidade',
            'icone' => 'fa-solid fa-building',
            'breadcrumb' => 'Empresas',
        ],
        'ecommerce' => [
            'titulo' => 'Soluções para E-commerce',
            'subtitulo' => 'Lojas virtuais e marketplaces',
            'icone' => 'fa-solid fa-cart-shopping',
            'breadcrumb' => 'E-commerce',
        ],
        'comex' => [
            'titulo' => 'Soluções para Comex',
            'subtitulo' => 'Comércio exterior e RADAR',
            'icone' => 'fa-solid fa-ship',
            'breadcrumb' => 'Comex',
        ],
    ];

    public function index(string $tipo): View
    {
        try {
            if (!array_key_exists($tipo, self::SOLUCOES)) {
                abort(404);
            }

            $solucao = self::SOLUCOES[$tipo];
            $solucao['slug'] = $tipo;

            return view('solucoes.index', compact('solucao'));
        } catch (Throwable $erro) {
            Log::error('Erro ao carregar a pagina Solucoes.', [
                'tipo' => $tipo,
                'mensagem' => $erro->getMessage(),
            ]);
            abort(500, 'Pagina em construção.');
        }
    }
}
