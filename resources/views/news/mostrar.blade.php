@extends('layouts.app')

@section('titulo', 'O erro silencioso de 2026 que coloca sua empresa em risco | Aconsult Contabilidade')
@section('descricao', 'Descubra quais mudanças fiscais de 2026 podem impactar diretamente o seu negócio e como se preparar adequadamente.')

@section('conteudo')
    {{-- Banner --}}
    <x-news.banner
        subtitulo="Tributário"
        titulo="O erro silencioso de 2026 que coloca sua <span style='color: #e21850;'>empresa em risco</span>"
        descricao="Descubra quais mudanças fiscais de 2026 podem impactar diretamente o seu negócio."
        tituloBreadcrumb="Notícia"
    />

    {{-- Conteúdo do artigo --}}
    <section class="py-16 md:py-24 bg-white relative overflow-hidden">
        {{-- Decoração --}}
        <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

                {{-- Artigo principal --}}
                <article class="lg:col-span-8">
                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-4 mb-8 pb-8 border-b border-neutral-100 animar-entrada">
                        <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                              style="background-color: #e21850;">
                            Tributário
                        </span>
                        <span class="flex items-center gap-1.5 text-sm text-neutral-400 font-normal">
                            <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                            18 de Fevereiro de 2026
                        </span>
                        <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                        <span class="text-sm text-neutral-400 font-normal">5 min de leitura</span>
                        <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                        <span class="text-sm text-neutral-400 font-normal">Por Equipe Aconsult</span>
                    </div>

                    {{-- Imagem destaque --}}
                    <div class="rounded-2xl overflow-hidden mb-10 animar-entrada atraso-1">
                        <img src="{{ asset('arquivos/imagens-empresa/3-funcionarias-conversando.jpg') }}"
                             alt="O erro silencioso de 2026"
                             class="w-full h-64 md:h-96 object-cover">
                    </div>

                    {{-- Corpo do artigo (simulando conteúdo Summernote) --}}
                    <div class="conteudo-artigo animar-entrada atraso-2">
                        <p>
                            Muitas empresas brasileiras estão cometendo um <strong>erro silencioso</strong> que pode resultar em multas pesadas e problemas com o fisco em 2026. As mudanças trazidas pela Reforma Tributária já começaram a impactar diretamente a rotina fiscal de milhares de negócios, mas poucos estão preparados.
                        </p>

                        <h2>O que está mudando em 2026?</h2>

                        <p>
                            Com a implementação gradual do IBS (Imposto sobre Bens e Serviços) e da CBS (Contribuição sobre Bens e Serviços), 2026 marca o início de um período de transição crucial. As empresas precisam adaptar seus sistemas, processos e estratégias tributárias para evitar inconsistências.
                        </p>

                        <blockquote>
                            "A empresa que não se preparar agora para as mudanças tributárias de 2026 estará literalmente pagando mais caro por sua inércia." — Especialista em tributação da Aconsult
                        </blockquote>

                        <h2>Os 3 erros mais comuns</h2>

                        <p>
                            Nossa equipe identificou os principais erros que temos visto entre empresas que nos procuram:
                        </p>

                        <ol>
                            <li><strong>Não atualizar o sistema fiscal:</strong> Sistemas desatualizados podem gerar cálculos incorretos de impostos, resultando em pagamento a maior ou a menor.</li>
                            <li><strong>Ignorar as novas obrigações acessórias:</strong> Novas declarações e prazos estão sendo implementados que precisam de atenção.</li>
                            <li><strong>Falta de planejamento tributário:</strong> Sem uma revisão completa da carga tributária, empresas perdem oportunidades de economia legal.</li>
                        </ol>

                        <img src="{{ asset('arquivos/imagens-empresa/1-funcionario-concentrado-computador.jpg') }}" alt="Planejamento tributário">

                        <h2>Como se preparar?</h2>

                        <p>
                            A preparação começa com um <strong>diagnóstico tributário completo</strong>. Na Aconsult, realizamos uma análise detalhada da situação fiscal de cada cliente, identificando:
                        </p>

                        <ul>
                            <li>Oportunidades de economia tributária</li>
                            <li>Riscos fiscais que precisam ser corrigidos</li>
                            <li>Adequações necessárias para as novas regras</li>
                            <li>Estratégias de otimização para o período de transição</li>
                        </ul>

                        <h2>O papel da contabilidade inteligente</h2>

                        <p>
                            Ter um escritório de contabilidade que vai além do operacional é fundamental neste momento. A Aconsult trabalha com <strong>inteligência tributária</strong>, utilizando tecnologia e expertise para garantir que cada real pago em impostos esteja correto e otimizado.
                        </p>

                        <p>
                            Não espere até que a fiscalização bata à porta. Entre em contato com nossos especialistas e faça uma revisão completa da sua situação fiscal antes que seja tarde.
                        </p>
                    </div>

                    {{-- Compartilhar --}}
                    <div class="mt-12 pt-8 border-t border-neutral-100 animar-entrada">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <span class="text-sm font-bold text-neutral-900 uppercase tracking-wider">Compartilhar</span>
                            <div class="flex items-center gap-3">
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#1877F2'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no Facebook">
                                    <i class="fa-brands fa-facebook-f text-sm"></i>
                                </a>
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#0A66C2'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no LinkedIn">
                                    <i class="fa-brands fa-linkedin-in text-sm"></i>
                                </a>
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#25D366'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no WhatsApp">
                                    <i class="fa-brands fa-whatsapp text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4">
                    <div class="lg:sticky lg:top-28">
                        {{-- Sobre a Aconsult --}}
                        <div class="bg-neutral-50 rounded-2xl p-6 mb-8 animar-entrada">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ asset('arquivos/identidade-visual/logo-x-black.png') }}"
                                     alt="Aconsult"
                                     class="w-10 h-10 object-contain">
                                <div>
                                    <span class="text-sm font-black text-neutral-900">Aconsult</span>
                                    <p class="text-xs text-neutral-400 font-normal">Contabilidade Inteligente</p>
                                </div>
                            </div>
                            <p class="text-sm text-neutral-500 font-normal leading-relaxed mb-4">
                                Especialistas em contabilidade, tributação e gestão empresarial desde 2018. Soluções inteligentes para o seu negócio.
                            </p>
                            <a href="{{ route('contato') }}"
                               class="inline-flex items-center gap-2 text-white px-5 py-2.5 rounded-full font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 w-full justify-center"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Fale com um especialista
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>

                        {{-- Outras notícias --}}
                        <div class="animar-entrada atraso-2">
                            <h3 class="text-lg font-black text-neutral-900 mb-6">Outras notícias</h3>

                            <div class="flex flex-col gap-6">
                                {{-- Mini card 1 --}}
                                <a href="{{ route('news.mostrar', ['id' => 2]) }}" class="group flex gap-4">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                                        <img src="{{ asset('arquivos/imagens-empresa/1-funcionario-concentrado-computador.jpg') }}"
                                             alt="IBS e CBS"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs text-neutral-400 font-normal">12 Fev 2026</span>
                                        <h4 class="text-sm font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 leading-snug mt-1 line-clamp-2">
                                            IBS e CBS em 2026: por que o ano de teste já exige postura definitiva
                                        </h4>
                                    </div>
                                </a>

                                {{-- Mini card 2 --}}
                                <a href="{{ route('news.mostrar', ['id' => 3]) }}" class="group flex gap-4">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                                        <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-em-pe.jpg') }}"
                                             alt="Compliance tributário"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs text-neutral-400 font-normal">21 Jan 2026</span>
                                        <h4 class="text-sm font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 leading-snug mt-1 line-clamp-2">
                                            Compliance tributário e a Reforma Tributária: papel mais estratégico
                                        </h4>
                                    </div>
                                </a>

                                {{-- Mini card 3 --}}
                                <a href="{{ route('news.mostrar', ['id' => 4]) }}" class="group flex gap-4">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                                        <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-trabalhando-alegre.jpg') }}"
                                             alt="E-commerce tributação"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs text-neutral-400 font-normal">05 Jan 2026</span>
                                        <h4 class="text-sm font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 leading-snug mt-1 line-clamp-2">
                                            Tributação para e-commerce em 2026: o que muda para lojistas virtuais
                                        </h4>
                                    </div>
                                </a>
                            </div>

                            <a href="{{ route('news') }}"
                               class="inline-flex items-center gap-2 mt-6 text-sm font-bold transition-all duration-300 group"
                               style="color: #e21850;">
                                Ver todas as news
                                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- CTA WhatsApp --}}
    <x-home.cta-whatsapp />
@endsection
