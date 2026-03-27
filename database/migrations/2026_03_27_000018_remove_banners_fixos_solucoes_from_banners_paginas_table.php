<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::table('banners_paginas')
            ->whereIn('pagina', ['solucoes-empresas', 'solucoes-ecommerce', 'solucoes-comex'])
            ->delete();
    }

    public function down(): void
    {
        $agora = now();

        DB::table('banners_paginas')->insert([
            [
                'pagina' => 'solucoes-empresas',
                'nome_exibicao' => 'Soluções — Empresas',
                'super_titulo' => 'Empresas',
                'titulo' => 'Soluções para <span style="color: #e21850;">empresas</span>',
                'descricao' => 'Tributação fiscal, contabilidade inteligente e gestão estratégica para o seu negócio crescer com segurança.',
                'imagem' => 'arquivos/imagens-empresa/aconsult-4.jpg',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'pagina' => 'solucoes-ecommerce',
                'nome_exibicao' => 'Soluções — E-commerce',
                'super_titulo' => 'E-commerce',
                'titulo' => 'Soluções para <span style="color: #e21850;">e-commerce</span>',
                'descricao' => 'Contabilidade especializada para lojas virtuais, marketplaces e negócios digitais.',
                'imagem' => 'arquivos/imagens-empresa/aconsult-3.jpg',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
            [
                'pagina' => 'solucoes-comex',
                'nome_exibicao' => 'Soluções — Comércio Exterior',
                'super_titulo' => 'Comércio Exterior',
                'titulo' => 'Especialistas em <span style="color: #e21850;">comércio exterior</span>',
                'descricao' => 'Assessoria estratégica em RADAR, regimes especiais e operações internacionais.',
                'imagem' => 'arquivos/imagens-empresa/aconsult-5.jpg',
                'created_at' => $agora,
                'updated_at' => $agora,
            ],
        ]);
    }
};
