<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $defaults = [
            'empresas' => [
                'nome_menu' => 'Soluções para Empresas',
                'mini_descricao' => 'Tributação e contabilidade',
                'icone_classe' => 'fa-solid fa-building',
                'breadcrumb' => 'Empresas',
                'banner_super_titulo' => 'Empresas',
                'banner_titulo' => 'Soluções para <span style="color: #e21850;">empresas</span>',
                'banner_descricao' => 'Tributação fiscal, contabilidade inteligente e gestão estratégica para o seu negócio crescer com segurança.',
                'banner_imagem' => 'arquivos/imagens-empresa/aconsult-4.jpg',
                'ordem' => 1,
            ],
            'ecommerce' => [
                'nome_menu' => 'Soluções para E-commerce',
                'mini_descricao' => 'Lojas virtuais e marketplaces',
                'icone_classe' => 'fa-solid fa-cart-shopping',
                'breadcrumb' => 'E-commerce',
                'banner_super_titulo' => 'E-commerce',
                'banner_titulo' => 'Soluções para <span style="color: #e21850;">e-commerce</span>',
                'banner_descricao' => 'Contabilidade especializada para lojas virtuais, marketplaces e negócios digitais.',
                'banner_imagem' => 'arquivos/imagens-empresa/aconsult-3.jpg',
                'ordem' => 2,
            ],
            'comex' => [
                'nome_menu' => 'Soluções para Comex',
                'mini_descricao' => 'Comércio exterior e RADAR',
                'icone_classe' => 'fa-solid fa-ship',
                'breadcrumb' => 'Comex',
                'banner_super_titulo' => 'Comércio Exterior',
                'banner_titulo' => 'Especialistas em <span style="color: #e21850;">comércio exterior</span>',
                'banner_descricao' => 'Assessoria estratégica em RADAR, regimes especiais e operações internacionais.',
                'banner_imagem' => 'arquivos/imagens-empresa/aconsult-5.jpg',
                'ordem' => 3,
            ],
        ];

        foreach ($defaults as $tipo => $dados) {
            $registro = DB::table('pagina_solucoes_conteudos')->where('tipo', $tipo)->first();
            if (!$registro) {
                continue;
            }

            $atualizar = [];
            foreach ($dados as $campo => $valor) {
                if (empty($registro->{$campo})) {
                    $atualizar[$campo] = $valor;
                }
            }

            if (!empty($atualizar)) {
                $atualizar['updated_at'] = now();
                DB::table('pagina_solucoes_conteudos')->where('id', $registro->id)->update($atualizar);
            }
        }
    }

    public function down(): void
    {
        // Sem rollback de dados para evitar perda de ajustes manuais.
    }
};
