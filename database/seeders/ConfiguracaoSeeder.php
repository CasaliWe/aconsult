<?php

namespace Database\Seeders;

use App\Models\BannerHome;
use App\Models\BannerPagina;
use App\Models\Configuracao;
use App\Models\Noticia;
use App\Models\NossoNumero;
use Illuminate\Database\Seeder;

class ConfiguracaoSeeder extends Seeder
{
    public function run(): void
    {
        Configuracao::firstOrCreate(['id' => 1], [
            'telefone'             => '(47) 2125-0281',
            'email'                => 'contato@aconsultcontabilidade.com.br',
            'whatsapp_numero'      => '554721250281',
            'whatsapp_mensagem'    => 'Olá! Bem-vindo à Aconsult! 👋 Como podemos ajudar?',
            'horario_atendimento'  => 'Seg — Sex: 8h às 12h e 13h30 às 18h',
            'endereco_rua'         => 'Rua São Cristovão, 879',
            'endereco_bairro'      => 'Cordeiros',
            'endereco_cidade'      => 'Itajaí',
            'endereco_estado'      => 'SC',
            'endereco_cep'         => '88310-161',
            'mapa_embed_url'       => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.788!2d-48.6686!3d-26.9089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb2a5f8e7e3d%3A0x1!2sRua%20S%C3%A3o%20Crist%C3%B3v%C3%A3o%2C%20879%20-%20Cordeiros%2C%20Itaja%C3%AD%20-%20SC%2C%2088310-161!5e0!3m2!1spt-BR!2sbr!4v1',
            'mapa_link_url'        => 'https://www.google.com/maps/search/Rua+S%C3%A3o+Cristov%C3%A3o+879+Cordeiros+Itaja%C3%AD+SC',
            'social_instagram'     => 'https://www.instagram.com/aconsultcontabilidade/',
            'social_facebook'      => 'https://www.facebook.com/aconsultcontabilidade',
            'social_linkedin'      => 'https://www.linkedin.com/company/aconsult-contabilidade/',
            'social_youtube'       => '',
            'link_area_cliente'    => 'https://onvio.com.br/#/',
            'link_app_store'       => 'https://apps.apple.com/br/app/onvio-documentos/id1005121694',
            'link_google_play'     => 'https://play.google.com/store/apps/details?id=com.thomsonreuters.cs.onvio.drive',
            'link_google_form_proposta' => null,
        ]);

        // Banners Home
        $banners = [
            [
                'super_titulo'           => 'Aconsult Contabilidade',
                'titulo'                 => 'Contabilidade e <span class="text-marca">inteligência tributária</span><br><span class="text-white/85">para o seu negócio</span>',
                'descricao'              => 'Otimizamos suas operações tributárias e potencializamos o crescimento da sua empresa.',
                'imagem'                 => 'arquivos/imagens-empresa/toda-equipe.jpg',
                'botao_primario_texto'   => 'Conhecer soluções',
                'botao_primario_link'    => 'whatsapp',
                'botao_secundario_texto' => 'Fale conosco',
                'botao_secundario_link'  => 'contato',
                'ordem'                  => 1,
            ],
            [
                'super_titulo'           => 'Soluções Empresariais',
                'titulo'                 => 'Soluções para<br><span class="text-marca">sua empresa</span>',
                'descricao'              => 'Tributação fiscal, contabilidade inteligente e gestão estratégica para o seu negócio crescer com segurança.',
                'imagem'                 => 'arquivos/imagens-empresa/aconsult-4.jpg',
                'botao_primario_texto'   => 'Saiba mais',
                'botao_primario_link'    => '/solucoes/empresas',
                'botao_secundario_texto' => null,
                'botao_secundario_link'  => null,
                'ordem'                  => 2,
            ],
            [
                'super_titulo'           => 'E-commerce',
                'titulo'                 => 'Soluções para<br><span class="text-marca">e-commerce</span>',
                'descricao'              => 'Contabilidade especializada para lojas virtuais, marketplaces e negócios digitais.',
                'imagem'                 => 'arquivos/imagens-empresa/3-funcionarias-conversando.jpg',
                'botao_primario_texto'   => 'Saiba mais',
                'botao_primario_link'    => '/solucoes/ecommerce',
                'botao_secundario_texto' => null,
                'botao_secundario_link'  => null,
                'ordem'                  => 3,
            ],
            [
                'super_titulo'           => 'Comércio Exterior',
                'titulo'                 => 'Especialistas em<br><span class="text-marca">comércio exterior</span>',
                'descricao'              => 'Assessoria estratégica em RADAR, regimes especiais e operações internacionais.',
                'imagem'                 => 'arquivos/imagens-empresa/aconsult-5.jpg',
                'botao_primario_texto'   => 'Saiba mais',
                'botao_primario_link'    => '/solucoes/comex',
                'botao_secundario_texto' => null,
                'botao_secundario_link'  => null,
                'ordem'                  => 4,
            ],
        ];

        foreach ($banners as $banner) {
            BannerHome::firstOrCreate(
                ['ordem' => $banner['ordem']],
                $banner
            );
        }

        // Banners das Páginas
        $bannersPaginas = [
            [
                'pagina'        => 'aconsult',
                'nome_exibicao' => 'Aconsult (Sobre Nós)',
                'super_titulo'  => 'Sobre nós',
                'titulo'        => 'Conheça a <span style="color: #e21850;">Aconsult</span>',
                'descricao'     => 'Um escritório de contabilidade comprometido em impulsionar o crescimento e o sucesso dos negócios por todo o Brasil.',
                'imagem'        => 'arquivos/imagens-empresa/toda-equipe.jpg',
            ],
            [
                'pagina'        => 'contato',
                'nome_exibicao' => 'Contato',
                'super_titulo'  => 'Fale conosco',
                'titulo'        => 'Vamos conversar sobre o <span style="color: #e21850;">seu negócio</span>',
                'descricao'     => 'Estamos prontos para atender você. Entre em contato e descubra como podemos transformar a gestão da sua empresa.',
                'imagem'        => 'arquivos/imagens-empresa/aconsult-5.jpg',
            ],
            [
                'pagina'        => 'trabalhe-conosco',
                'nome_exibicao' => 'Trabalhe Conosco',
                'super_titulo'  => 'Carreiras',
                'titulo'        => 'Faça parte do time da <span style="color: #e21850;">Aconsult</span>',
                'descricao'     => 'Envie seu currículo e candidate-se para futuras oportunidades em uma equipe focada em excelência contábil e atendimento próximo.',
                'imagem'        => 'arquivos/imagens-empresa/toda-equipe.jpg',
            ],
            [
                'pagina'        => 'news',
                'nome_exibicao' => 'News (Blog)',
                'super_titulo'  => 'Universo Aconsult',
                'titulo'        => 'Fique por dentro das <span style="color: #e21850;">novidades</span>',
                'descricao'     => 'Informações essenciais sobre contabilidade, gestão e negócios para o seu crescimento.',
                'imagem'        => 'arquivos/imagens-empresa/aconsult-4.jpg',
            ],
            [
                'pagina'        => 'ebook',
                'nome_exibicao' => 'Ebooks',
                'super_titulo'  => 'Material gratuito',
                'titulo'        => 'Conhecimento que <span style="color: #e21850;">transforma</span> negócios',
                'descricao'     => 'Ebooks gratuitos preparados por especialistas para impulsionar sua empresa.',
                'imagem'        => 'arquivos/imagens-empresa/time-pequeno-feliz-trabalhando.jpg',
            ],
        ];

        foreach ($bannersPaginas as $bp) {
            BannerPagina::firstOrCreate(
                ['pagina' => $bp['pagina']],
                $bp
            );
        }

        // Nossos Números (home)
        $numeros = [
            ['ordem' => 1, 'valor' => 7, 'titulo' => 'Anos de história'],
            ['ordem' => 2, 'valor' => 30, 'titulo' => 'Colaboradores'],
            ['ordem' => 3, 'valor' => 350, 'titulo' => 'Clientes atendidos'],
            ['ordem' => 4, 'valor' => 10, 'titulo' => 'Estados diferentes'],
        ];

        foreach ($numeros as $numero) {
            NossoNumero::updateOrCreate(
                ['ordem' => $numero['ordem']],
                $numero
            );
        }

        // News (Blog)
        $noticias = [
            [
                'categoria' => 'Tributário',
                'titulo' => 'O erro silencioso de 2026 que coloca sua empresa em risco',
                'mini_descricao' => 'Descubra quais mudanças fiscais de 2026 podem impactar diretamente o seu negócio e como se preparar.',
                'thumb' => 'arquivos/imagens-empresa/3-funcionarias-conversando.jpg',
                'tempo_leitura' => 5,
                'data_publicacao' => '2026-02-18',
                'ativo' => true,
                'conteudo' => '<p>Muitas empresas brasileiras estão cometendo um <strong>erro silencioso</strong> que pode resultar em multas e problemas com o fisco em 2026.</p><h2>O que está mudando em 2026?</h2><p>Com a implementação gradual do IBS e da CBS, o ano de 2026 marca um período crítico de adaptação.</p><h2>Como se preparar?</h2><p>A preparação começa com diagnóstico tributário e revisão de processos fiscais.</p>',
            ],
            [
                'categoria' => 'Fiscal',
                'titulo' => 'IBS e CBS em 2026: por que o ano de teste já exige postura definitiva',
                'mini_descricao' => 'Entenda por que as empresas precisam se posicionar agora diante das mudanças do IBS e CBS.',
                'thumb' => 'arquivos/imagens-empresa/1-funcionario-concentrado-computador.jpg',
                'tempo_leitura' => 7,
                'data_publicacao' => '2026-02-12',
                'ativo' => true,
                'conteudo' => '<p>A fase de transição exige ajustes reais de processo e governança tributária.</p><h2>Pontos de atenção</h2><ul><li>Classificação fiscal correta</li><li>Revisão de cadastros</li><li>Adequação de sistemas</li></ul>',
            ],
            [
                'categoria' => 'Compliance',
                'titulo' => 'Compliance tributário e a Reforma Tributária: papel mais estratégico',
                'mini_descricao' => 'Saiba por que o compliance tributário ganha importância com a Reforma Tributária no Brasil.',
                'thumb' => 'arquivos/imagens-empresa/3-mulheres-em-pe.jpg',
                'tempo_leitura' => 6,
                'data_publicacao' => '2026-01-21',
                'ativo' => true,
                'conteudo' => '<p>Compliance não é só controle, é estratégia para reduzir risco e melhorar previsibilidade.</p><h2>Benefícios</h2><p>Maior segurança jurídica, melhor gestão e tomada de decisão mais precisa.</p>',
            ],
            [
                'categoria' => 'E-commerce',
                'titulo' => 'Tributação para e-commerce em 2026: o que muda para lojistas virtuais',
                'mini_descricao' => 'Conheça as novas regras de tributação que afetam vendas online e marketplaces no Brasil.',
                'thumb' => 'arquivos/imagens-empresa/3-mulheres-trabalhando-alegre.jpg',
                'tempo_leitura' => 4,
                'data_publicacao' => '2026-01-05',
                'ativo' => true,
                'conteudo' => '<p>As operações digitais terão impactos diretos em apuração e obrigações acessórias.</p><p>Mapear a operação por canal de venda é essencial.</p>',
            ],
            [
                'categoria' => 'Comércio Exterior',
                'titulo' => 'RADAR Siscomex: como habilitar sua empresa para importar e exportar',
                'mini_descricao' => 'Guia completo sobre o processo de habilitação no RADAR e os requisitos para operar no comércio exterior.',
                'thumb' => 'arquivos/imagens-empresa/2-funcionario-descontraidos-sorrindo-1.jpg',
                'tempo_leitura' => 8,
                'data_publicacao' => '2025-12-28',
                'ativo' => true,
                'conteudo' => '<p>O RADAR é etapa obrigatória para operações de importação e exportação.</p><h2>Passo a passo</h2><p>Organize documentação, valide enquadramento e prepare o processo com suporte especializado.</p>',
            ],
            [
                'categoria' => 'Tributário',
                'titulo' => 'Planejamento tributário 2026: estratégias para reduzir a carga fiscal',
                'mini_descricao' => 'Entenda como um planejamento tributário bem feito pode gerar economia significativa para sua empresa.',
                'thumb' => 'arquivos/imagens-empresa/toda-equipe.jpg',
                'tempo_leitura' => 5,
                'data_publicacao' => '2025-12-15',
                'ativo' => true,
                'conteudo' => '<p>Planejamento tributário é processo contínuo e orientado a dados.</p><p>Com análise certa, sua empresa paga o tributo correto e evita riscos.</p>',
            ],
        ];

        foreach ($noticias as $noticia) {
            Noticia::updateOrCreate(
                ['titulo' => $noticia['titulo']],
                $noticia
            );
        }
    }
}
