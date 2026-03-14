{{-- Seção FAQ - Página Soluções (dinâmico por tipo) --}}
@props(['solucao'])

@php
    $perguntas = [
        'empresas' => [
            ['Como a Aconsult pode ajudar minha empresa?', 'A Aconsult oferece soluções completas em contabilidade, tributação fiscal, folha de pagamento e gestão estratégica, ajudando sua empresa a crescer com segurança e conformidade legal.'],
            ['Quais tipos de empresas a Aconsult atende?', 'Atendemos empresas de todos os portes e segmentos, desde MEI e Simples Nacional até Lucro Presumido e Lucro Real, com soluções personalizadas para cada necessidade.'],
            ['Como funciona o processo de migração para a Aconsult?', 'O processo é simples e assistido. Nossa equipe cuida de toda a transição contábil, garantindo que nenhuma obrigação seja perdida durante a mudança.'],
            ['A Aconsult oferece consultoria tributária?', 'Sim! Fazemos planejamento tributário estratégico para identificar oportunidades de economia fiscal e garantir que sua empresa esteja sempre em conformidade.'],
            ['Como faço para começar?', 'Entre em contato pelo WhatsApp ou formulário de contato. Um especialista irá entender suas necessidades e apresentar a melhor solução para o seu negócio.'],
        ],
        'ecommerce' => [
            ['A Aconsult é especializada em e-commerce?', 'Sim! Temos uma equipe dedicada que entende as particularidades fiscais e contábeis de lojas virtuais, marketplaces e negócios digitais.'],
            ['Vocês atendem vendedores de marketplace?', 'Atendemos vendedores de todos os principais marketplaces como Mercado Livre, Shopee, Amazon, Magalu e outros, com contabilidade adaptada a cada plataforma.'],
            ['Como funciona a tributação para e-commerce?', 'A tributação varia conforme o regime tributário e tipo de operação. Nossa equipe analisa seu cenário e indica o melhor enquadramento para maximizar seus lucros.'],
            ['Vocês ajudam com emissão de notas fiscais?', 'Sim, orientamos todo o processo de emissão de notas fiscais eletrônicas, incluindo configuração de sistemas e integração com plataformas de venda.'],
            ['Como iniciar minha contabilidade de e-commerce?', 'Basta entrar em contato conosco. Fazemos uma análise completa do seu negócio digital e apresentamos um plano personalizado.'],
        ],
        'comex' => [
            ['O que é o RADAR e como a Aconsult pode ajudar?', 'O RADAR é o Registro e Rastreamento da Atuação dos Intervenientes Aduaneiros, necessário para importar e exportar. A Aconsult cuida de todo o processo de habilitação e manutenção.'],
            ['A Aconsult atende operações de importação e exportação?', 'Sim! Oferecemos assessoria completa em comércio exterior, incluindo regimes especiais, classificação fiscal, e planejamento de operações internacionais.'],
            ['Quais regimes especiais vocês trabalham?', 'Trabalhamos com Drawback, RECOF, Entreposto Aduaneiro, entre outros regimes que podem reduzir significativamente os custos das suas operações internacionais.'],
            ['Vocês atendem empresas que estão começando no comércio exterior?', 'Sim! Auxiliamos desde a habilitação no RADAR até a estruturação completa das operações, independentemente do porte da empresa.'],
            ['Como posso contratar os serviços de Comex?', 'Entre em contato pelo WhatsApp ou formulário. Nossa equipe de comércio exterior irá avaliar suas necessidades e propor a melhor estratégia.'],
        ],
    ];

    $faqItems = $perguntas[$solucao['slug']] ?? $perguntas['empresas'];
@endphp

<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-14 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Dúvidas</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Perguntas <span class="text-marca">frequentes</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal max-w-lg mx-auto">
                Tire suas dúvidas sobre {{ strtolower($solucao['titulo']) }} e como podemos ajudar o seu negócio.
            </p>
        </div>

        {{-- Accordion --}}
        <div class="flex flex-col gap-4" id="faq-solucoes-container">
            @foreach ($faqItems as $index => $item)
                <div class="faq-solucoes-item bg-white rounded-2xl border border-neutral-100 overflow-hidden transition-all duration-300 hover:border-marca/20 animar-entrada atraso-{{ $index + 1 }}">
                    <button class="faq-solucoes-btn w-full px-6 md:px-8 py-5 flex items-center justify-between gap-4 text-left cursor-pointer group">
                        <span class="text-base md:text-lg font-black text-neutral-900 group-hover:text-marca transition-colors">
                            {{ $item[0] }}
                        </span>
                        <span class="faq-solucoes-icone w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0 transition-all duration-300">
                            <i class="fa-solid fa-plus text-sm transition-transform duration-300"></i>
                        </span>
                    </button>
                    <div class="faq-solucoes-conteudo" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease;">
                        <div class="px-6 md:px-8 pb-6">
                            <p class="text-neutral-500 text-sm md:text-base font-normal leading-relaxed">
                                {{ $item[1] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var container = document.getElementById('faq-solucoes-container');
        if (!container) return;

        container.querySelectorAll('.faq-solucoes-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var item = btn.closest('.faq-solucoes-item');
                var conteudo = item.querySelector('.faq-solucoes-conteudo');
                var icone = item.querySelector('.faq-solucoes-icone i');
                var aberto = conteudo.style.maxHeight && conteudo.style.maxHeight !== '0px';

                // Fecha todos
                container.querySelectorAll('.faq-solucoes-item').forEach(function (outro) {
                    var outroConteudo = outro.querySelector('.faq-solucoes-conteudo');
                    var outroIcone = outro.querySelector('.faq-solucoes-icone i');
                    outroConteudo.style.maxHeight = '0px';
                    outroIcone.style.transform = 'rotate(0deg)';
                    outro.classList.remove('border-marca/20');
                    outro.querySelector('.faq-solucoes-icone').classList.remove('bg-marca', 'text-white');
                    outro.querySelector('.faq-solucoes-icone').classList.add('bg-marca/10', 'text-marca');
                });

                // Toggle atual
                if (!aberto) {
                    conteudo.style.maxHeight = conteudo.scrollHeight + 'px';
                    icone.style.transform = 'rotate(45deg)';
                    item.classList.add('border-marca/20');
                    item.querySelector('.faq-solucoes-icone').classList.remove('bg-marca/10', 'text-marca');
                    item.querySelector('.faq-solucoes-icone').classList.add('bg-marca', 'text-white');
                }
            });
        });
    });
</script>
