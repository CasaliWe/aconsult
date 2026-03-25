@extends('layouts.app')

@section('titulo', 'News | Aconsult Contabilidade')
@section('descricao', 'Acompanhe as últimas notícias sobre contabilidade, tributação, e-commerce e comércio exterior. Conteúdo exclusivo da Aconsult Contabilidade.')

@section('conteudo')
    @php
        $noticiasList = $noticias ?? collect();

        $categoriasCor = [
            'Tributário' => '#e21850',
            'Fiscal' => '#9b153a',
            'Compliance' => '#171717',
            'E-commerce' => '#e21850',
            'Comércio Exterior' => '#171717',
        ];
    @endphp

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

                    @foreach($noticiasList->pluck('categoria')->unique()->values() as $categoria)
                        @php
                            $slugCategoria = \Illuminate\Support\Str::slug($categoria);
                        @endphp
                        <button class="filtro-news px-5 py-2 rounded-full text-sm font-bold transition-all duration-300 cursor-pointer border border-neutral-200 text-neutral-500 hover:border-neutral-400 whitespace-nowrap shrink-0"
                                data-filtro="{{ $slugCategoria }}">
                            {{ $categoria }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Grid de cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="grid-news">
                @forelse($noticiasList as $noticia)
                    @php
                        $slugCategoria = \Illuminate\Support\Str::slug($noticia->categoria);
                    @endphp
                    <article class="group animar-entrada atraso-{{ $loop->iteration <= 3 ? $loop->iteration : (($loop->iteration % 3) + 1) }} card-news" data-categoria="{{ $slugCategoria }}">
                        <a href="{{ route('news.mostrar', ['id' => $noticia->id]) }}" class="block">
                            <div class="relative overflow-hidden rounded-2xl mb-5">
                                <img src="{{ asset($noticia->thumb) }}"
                                     alt="{{ $noticia->titulo }}"
                                     class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute top-4 left-4">
                                    <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                          style="background-color: {{ $categoriasCor[$noticia->categoria] ?? '#e21850' }};">
                                        {{ $noticia->categoria }}
                                    </span>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                                    {{ optional($noticia->data_publicacao)->format('d M Y') }}
                                </span>
                                <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                                <span>{{ $noticia->tempo_leitura }} min de leitura</span>
                            </div>
                            <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                                {{ $noticia->titulo }}
                            </h3>
                            <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                                {{ $noticia->mini_descricao }}
                            </p>
                            <span class="inline-flex items-center gap-2 text-sm font-bold group-hover:gap-3 transition-all duration-300" style="color: #e21850;">
                                Ler notícia
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                        </a>
                    </article>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-8">
                        <p class="text-neutral-500 text-base">Nenhuma notícia publicada no momento.</p>
                    </div>
                @endforelse
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

        function centralizarNoSlider(elemento) {
            if (!slider || !elemento) return;
            const sliderRect = slider.getBoundingClientRect();
            const elemRect = elemento.getBoundingClientRect();
            const destino = slider.scrollLeft + (elemRect.left - sliderRect.left) - (sliderRect.width / 2) + (elemRect.width / 2);
            slider.scrollTo({ left: destino, behavior: 'smooth' });
        }

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

                centralizarNoSlider(filtro);
            });
        });

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
