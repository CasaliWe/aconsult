@extends('layouts.app')

@section('titulo', 'News | Aconsult Contabilidade')
@section('descricao', 'Acompanhe as últimas notícias sobre contabilidade, tributação, e-commerce e comércio exterior. Conteúdo exclusivo da Aconsult Contabilidade.')

@section('conteudo')
    {{-- Banner --}}
    <x-news.banner
        subtitulo="Universo Aconsult"
        titulo="Fique por dentro das <span style='color: #e21850;'>novidades</span>"
        descricao="Informações essenciais sobre contabilidade, gestão e negócios para o seu crescimento."
        tituloBreadcrumb="News"
    />

    {{-- Listagem de notícias --}}
    <section class="py-20 md:py-28 bg-white relative overflow-hidden">
        {{-- Decoração --}}
        <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">

            {{-- Filtros por categoria (slider) --}}
            <div class="relative mb-14 animar-entrada">
                {{-- Gradiente nas bordas para indicar scroll --}}
                <div class="absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none opacity-0 transition-opacity duration-300" id="gradiente-esquerda"></div>
                <div class="absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none opacity-0 transition-opacity duration-300" id="gradiente-direita"></div>

                {{-- Container do slider --}}
                <div class="flex items-center gap-3 overflow-x-auto scrollbar-oculto" id="slider-filtros">
                    <button class="filtro-news ativo px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer whitespace-nowrap shrink-0"
                            style="background-color: #e21850; color: white;"
                            data-filtro="todos">
                        Todas
                    </button>
                    <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                            data-filtro="tributario">
                        Tributário
                    </button>
                    <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                            data-filtro="fiscal">
                        Fiscal
                    </button>
                    <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                            data-filtro="compliance">
                        Compliance
                    </button>
                    <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                            data-filtro="ecommerce">
                        E-commerce
                    </button>
                    <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                            data-filtro="comex">
                        Comércio Exterior
                    </button>
                </div>
            </div>

            {{-- Grid de cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="grid-news">

                {{-- Card 1 --}}
                <article class="group animar-entrada atraso-1 card-news" data-categoria="tributario">
                    <a href="{{ route('news.mostrar', ['id' => 1]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/3-funcionarias-conversando.jpg') }}"
                                 alt="Notícia sobre tributação"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                      style="background-color: #e21850;">
                                    Tributário
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                18 Fev 2026
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>5 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            O erro silencioso de 2026 que coloca sua empresa em risco
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Descubra quais mudanças fiscais de 2026 podem impactar diretamente o seu negócio e como se preparar.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

                {{-- Card 2 --}}
                <article class="group animar-entrada atraso-2 card-news" data-categoria="fiscal">
                    <a href="{{ route('news.mostrar', ['id' => 2]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/1-funcionario-concentrado-computador.jpg') }}"
                                 alt="Notícia sobre fiscal"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                      style="background-color: #9b153a;">
                                    Fiscal
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                12 Fev 2026
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>7 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            IBS e CBS em 2026: por que o ano de teste já exige postura definitiva
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Entenda por que as empresas precisam se posicionar agora diante das mudanças do IBS e CBS.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

                {{-- Card 3 --}}
                <article class="group animar-entrada atraso-3 card-news" data-categoria="compliance">
                    <a href="{{ route('news.mostrar', ['id' => 3]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-em-pe.jpg') }}"
                                 alt="Notícia sobre compliance"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-neutral-900 text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full">
                                    Compliance
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                21 Jan 2026
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>6 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            Compliance tributário e a Reforma Tributária: papel mais estratégico
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Saiba por que o compliance tributário ganha importância com a Reforma Tributária no Brasil.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

                {{-- Card 4 --}}
                <article class="group animar-entrada atraso-1 card-news" data-categoria="ecommerce">
                    <a href="{{ route('news.mostrar', ['id' => 4]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-trabalhando-alegre.jpg') }}"
                                 alt="Notícia sobre e-commerce"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                      style="background-color: #e21850;">
                                    E-commerce
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                05 Jan 2026
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>4 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            Tributação para e-commerce em 2026: o que muda para lojistas virtuais
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Conheça as novas regras de tributação que afetam vendas online e marketplaces no Brasil.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

                {{-- Card 5 --}}
                <article class="group animar-entrada atraso-2 card-news" data-categoria="comex">
                    <a href="{{ route('news.mostrar', ['id' => 5]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/2-funcionario-descontraidos-sorrindo-1.jpg') }}"
                                 alt="Notícia sobre comércio exterior"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-neutral-900 text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full">
                                    Comércio Exterior
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                28 Dez 2025
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>8 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            RADAR Siscomex: como habilitar sua empresa para importar e exportar
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Guia completo sobre o processo de habilitação no RADAR e os requisitos para operar no comércio exterior.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

                {{-- Card 6 --}}
                <article class="group animar-entrada atraso-3 card-news" data-categoria="tributario">
                    <a href="{{ route('news.mostrar', ['id' => 6]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset('arquivos/imagens-empresa/toda-equipe.jpg') }}"
                                 alt="Notícia sobre planejamento tributário"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                      style="background-color: #e21850;">
                                    Tributário
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                15 Dez 2025
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>5 min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            Planejamento tributário 2026: estratégias para reduzir a carga fiscal
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            Entenda como um planejamento tributário bem feito pode gerar economia significativa para sua empresa.
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>

            </div>
        </div>
    </section>

    {{-- CTA WhatsApp --}}
    <x-home.cta-whatsapp />
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filtros = document.querySelectorAll('.filtro-news');
        const cards = document.querySelectorAll('.card-news');
        const slider = document.getElementById('slider-filtros');
        const gradEsquerda = document.getElementById('gradiente-esquerda');
        const gradDireita = document.getElementById('gradiente-direita');

        /* ─── Centralizar filtro no slider (sem mexer no scroll da página) ─── */
        function centralizarNoSlider(elemento) {
            if (!slider || !elemento) return;
            const sliderRect = slider.getBoundingClientRect();
            const elemRect = elemento.getBoundingClientRect();
            const destino = slider.scrollLeft + (elemRect.left - sliderRect.left) - (sliderRect.width / 2) + (elemRect.width / 2);
            slider.scrollTo({ left: destino, behavior: 'smooth' });
        }

        /* ─── Filtros ─── */
        filtros.forEach(filtro => {
            filtro.addEventListener('click', () => {
                const categoria = filtro.dataset.filtro;

                filtros.forEach(f => {
                    f.style.backgroundColor = '';
                    f.style.color = '';
                    f.classList.add('border', 'border-neutral-200', 'text-neutral-500');
                    f.classList.remove('ativo');
                });
                filtro.style.backgroundColor = '#e21850';
                filtro.style.color = 'white';
                filtro.classList.remove('border', 'border-neutral-200', 'text-neutral-500');
                filtro.classList.add('ativo');

                cards.forEach(card => {
                    if (categoria === 'todos' || card.dataset.categoria === categoria) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });

                /* Centraliza o botão clicado no slider */
                centralizarNoSlider(filtro);
            });
        });

        /* ─── Gradientes de indicação de scroll ─── */
        function atualizarGradientes() {
            if (!slider) return;
            const temScrollEsquerda = slider.scrollLeft > 5;
            const temScrollDireita = slider.scrollLeft < (slider.scrollWidth - slider.clientWidth - 5);

            gradEsquerda.style.opacity = temScrollEsquerda ? '1' : '0';
            gradDireita.style.opacity = temScrollDireita ? '1' : '0';
        }

        if (slider) {
            slider.addEventListener('scroll', atualizarGradientes);
            window.addEventListener('resize', atualizarGradientes);
            atualizarGradientes();
        }

        /* ─── Auto-scroll suave do slider (só quando há overflow) ─── */
        let pausado = false;
        let indiceAutoScroll = 0;
        let intervaloAutoScroll;

        function temOverflow() {
            return slider && slider.scrollWidth > slider.clientWidth + 5;
        }

        function iniciarAutoScroll() {
            if (!temOverflow()) return;

            intervaloAutoScroll = setInterval(() => {
                if (pausado || !slider || !temOverflow()) return;

                const filtroBtns = slider.querySelectorAll('.filtro-news');
                if (filtroBtns.length === 0) return;

                indiceAutoScroll = (indiceAutoScroll + 1) % filtroBtns.length;
                centralizarNoSlider(filtroBtns[indiceAutoScroll]);
            }, 3000);
        }

        if (slider) {
            slider.addEventListener('mouseenter', () => { pausado = true; });
            slider.addEventListener('mouseleave', () => { pausado = false; });
            slider.addEventListener('touchstart', () => { pausado = true; }, { passive: true });
            slider.addEventListener('touchend', () => {
                setTimeout(() => { pausado = false; }, 3000);
            });

            /* Drag scroll no desktop */
            let arrastando = false;
            let inicioX = 0;
            let scrollInicio = 0;

            slider.addEventListener('mousedown', (e) => {
                arrastando = true;
                inicioX = e.pageX - slider.offsetLeft;
                scrollInicio = slider.scrollLeft;
                slider.style.cursor = 'grabbing';
            });
            slider.addEventListener('mouseleave', () => { arrastando = false; slider.style.cursor = ''; });
            slider.addEventListener('mouseup', () => { arrastando = false; slider.style.cursor = ''; });
            slider.addEventListener('mousemove', (e) => {
                if (!arrastando) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                slider.scrollLeft = scrollInicio - (x - inicioX);
            });

            iniciarAutoScroll();
        }
    });
</script>
@endpush
