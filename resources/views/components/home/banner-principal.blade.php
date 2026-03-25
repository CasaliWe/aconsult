@props(['banners'])

@php
    $bannersList = $banners instanceof \Illuminate\Support\Collection ? $banners : collect();
@endphp

@if($bannersList->isNotEmpty())
{{-- Banner Principal - Slider Full Screen --}}
<section id="banner-principal" class="relative w-full h-[100dvh] lg:h-[100vh] 2xl:h-[70vh] min-h-[500px] overflow-hidden">

    {{-- Container de Slides --}}
    <div class="relative w-full h-full" id="slides-container">

        @foreach($bannersList as $banner)
        @php
            $index = $loop->index;
            $isFirst = $loop->first;

            $tituloPrimeiro = null;
            $palavrasDigitacaoPrimeiro = [];
            if ($isFirst) {
                $tituloOriginal = (string) ($banner->titulo ?? '');

                // Formato recomendado no admin:
                // Ex: Contabilidade e<br>[[digitacao:inteligencia tributaria|assessoria contabil]]<br><span class="text-white/85">para o seu negocio</span>
                if (preg_match('/\[\[digitacao:(.*?)\]\]/i', $tituloOriginal, $matchDigitacao)) {
                    $palavrasDigitacaoPrimeiro = collect(explode('|', $matchDigitacao[1]))
                        ->map(fn ($item) => trim($item))
                        ->filter()
                        ->values()
                        ->all();

                    $tituloPrimeiro = preg_replace(
                        '/\[\[digitacao:(.*?)\]\]/i',
                        '<span id="texto-digitacao" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span>',
                        $tituloOriginal,
                        1
                    );
                } else {
                    // Compatibilidade: se houver span text-marca no titulo, usa o texto desse span como palavra inicial.
                    if (preg_match('/<span[^>]*class="[^"]*text-marca[^"]*"[^>]*>(.*?)<\/span>/i', $tituloOriginal, $matchSpan)) {
                        $palavra = trim(strip_tags($matchSpan[1] ?? ''));
                        if ($palavra !== '') {
                            $palavrasDigitacaoPrimeiro = [$palavra];
                        }

                        $tituloPrimeiro = preg_replace(
                            '/<span[^>]*class="[^"]*text-marca[^"]*"[^>]*>.*?<\/span>/i',
                            '<span id="texto-digitacao" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span>',
                            $tituloOriginal,
                            1
                        );
                    }
                }

                if (empty($palavrasDigitacaoPrimeiro)) {
                    $palavrasDigitacaoPrimeiro = ['inteligencia tributaria', 'assessoria contabil', 'gestao estrategica'];
                }

                if (empty($tituloPrimeiro)) {
                    $tituloPrimeiro = 'Contabilidade e<br><span id="texto-digitacao" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span><br><span class="text-white/85">para o seu negocio</span>';
                }
            }

            // Resolve link do botão primário
            $linkPrimario = '#';
            if ($banner->botao_primario_link === 'whatsapp') {
                $whatsNum = $config->whatsapp_numero ?? '554721250281';
                $whatsMsg = urlencode($config->whatsapp_mensagem ?? 'Olá!');
                $linkPrimario = "https://wa.me/{$whatsNum}?text={$whatsMsg}";
            } elseif ($banner->botao_primario_link === 'contato') {
                $linkPrimario = route('contato');
            } elseif (!empty($banner->botao_primario_link)) {
                $linkPrimario = url($banner->botao_primario_link);
            }

            // Resolve link do botão secundário
            $linkSecundario = '#';
            if (!empty($banner->botao_secundario_link)) {
                if ($banner->botao_secundario_link === 'whatsapp') {
                    $whatsNum = $config->whatsapp_numero ?? '554721250281';
                    $whatsMsg = urlencode($config->whatsapp_mensagem ?? 'Olá!');
                    $linkSecundario = "https://wa.me/{$whatsNum}?text={$whatsMsg}";
                } elseif ($banner->botao_secundario_link === 'contato') {
                    $linkSecundario = route('contato');
                } else {
                    $linkSecundario = url($banner->botao_secundario_link);
                }
            }

            $isExternal = str_starts_with($linkPrimario, 'https://wa.me');
        @endphp
           <div class="slide-banner absolute inset-0 {{ $isFirst ? 'opacity-100 z-10 ativo' : 'opacity-0 z-0' }} transition-opacity duration-1000"
               data-slide="{{ $index }}"
               @if($isFirst)
               data-palavras-digitacao='@json($palavrasDigitacaoPrimeiro)'
               @endif>
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset($banner->imagem) }}"
                     alt="{{ strip_tags($banner->super_titulo) }}"
                     class="w-full h-full object-cover {{ !$isFirst ? 'slide-bg-zoom' : '' }}">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent md:hidden"></div>
            <div class="relative z-10 flex items-center h-full w-full">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-10">
                    <div class="max-w-2xl">
                        <div class="elemento-slide flex items-center gap-3 mb-4 md:mb-5" style="--atraso: 0.1s">
                            <span class="w-8 h-[2px] bg-marca rounded-full"></span>
                            <span class="text-marca text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold">{{ $banner->super_titulo }}</span>
                        </div>

                        @if($isFirst)
                        <h1 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            {!! $tituloPrimeiro !!}
                        </h1>
                        @else
                        <h2 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            {!! $banner->titulo !!}
                        </h2>
                        @endif

                        <div class="elemento-slide flex gap-4 mb-6 md:mb-8" style="--atraso: 0.4s">
                            <span class="hidden sm:block w-[2px] bg-marca/40 rounded-full shrink-0"></span>
                            <p class="text-sm sm:text-base lg:text-lg text-white/60 font-normal max-w-md leading-relaxed">
                                {{ $banner->descricao }}
                            </p>
                        </div>
                        <div class="elemento-slide flex flex-wrap gap-3" style="--atraso: 0.55s">
                            @if(!empty($banner->botao_primario_texto))
                            <a href="{{ $linkPrimario }}"
                               @if($isExternal) target="_blank" rel="noopener noreferrer" @endif
                               class="inline-flex items-center gap-2 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                {{ $banner->botao_primario_texto }}
                                <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                            </a>
                            @endif
                            @if(!empty($banner->botao_secundario_texto))
                            <a href="{{ $linkSecundario }}"
                               class="inline-flex items-center gap-2 border border-white/25 hover:border-white/50 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:-translate-y-0.5 backdrop-blur-sm"
                               style="background-color: rgba(255,255,255,0.1);">
                                {{ $banner->botao_secundario_texto }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Barra de navegação inferior --}}
    <div class="absolute bottom-0 left-0 right-0 z-30 pb-5 sm:pb-7">
        <div class="max-w-7xl mx-auto px-6 md:px-10 flex items-center gap-5">
            {{-- Dots com progresso --}}
            <div class="flex items-center gap-2">
                @foreach($bannersList as $banner)
                <button class="dot-banner {{ $loop->first ? 'ativo w-10' : 'w-3' }} relative overflow-hidden h-1 rounded-full bg-white/15 cursor-pointer transition-[width] duration-500" data-dot="{{ $loop->index }}" aria-label="Ir para slide {{ $loop->iteration }}">
                    <span class="progresso-dot absolute inset-0 rounded-full bg-marca"></span>
                </button>
                @endforeach
            </div>

            {{-- Setas (ao lado dos dots) --}}
            <div class="hidden md:flex items-center gap-2">
                <button id="banner-prev"
                        class="group w-9 h-9 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/70 hover:bg-marca hover:border-marca hover:text-white transition-all duration-300 cursor-pointer"
                        aria-label="Slide anterior">
                    <i class="fa-solid fa-arrow-left text-[11px] group-hover:scale-110 transition-transform"></i>
                </button>
                <button id="banner-next"
                        class="group w-9 h-9 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/70 hover:bg-marca hover:border-marca hover:text-white transition-all duration-300 cursor-pointer"
                        aria-label="Próximo slide">
                    <i class="fa-solid fa-arrow-right text-[11px] group-hover:scale-110 transition-transform"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-20 right-6 md:right-10 z-30 hidden lg:flex flex-col items-center gap-2 text-white/25">
        <span class="text-[10px] uppercase tracking-[0.25em] [writing-mode:vertical-lr]">Scroll</span>
        <div class="w-px h-8 bg-gradient-to-b from-white/25 to-transparent"></div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('.slide-banner');
        const dots = document.querySelectorAll('.dot-banner');
        const btnPrev = document.getElementById('banner-prev');
        const btnNext = document.getElementById('banner-next');
        const textoDigitacao = document.getElementById('texto-digitacao');
        const slidesContainer = document.getElementById('slides-container');

        let slideAtual = 0;
        let intervalo = null;
        const totalSlides = slides.length;

        /* ─── Efeito de digitação (apenas se o elemento existir no primeiro slide) ─── */
        if (textoDigitacao) {
            const primeiroSlide = slides[0];
            let palavrasDigitacao = ['inteligencia tributaria', 'assessoria contabil', 'gestao estrategica'];

            if (primeiroSlide && primeiroSlide.dataset.palavrasDigitacao) {
                try {
                    const palavrasBanco = JSON.parse(primeiroSlide.dataset.palavrasDigitacao);
                    if (Array.isArray(palavrasBanco) && palavrasBanco.length > 0) {
                        palavrasDigitacao = palavrasBanco;
                    }
                } catch (e) {
                    // Mantem fallback padrao em caso de JSON invalido.
                }
            }

            let indicePalavra = 0;
            let indiceLetra = 0;
            let apagando = false;
            let pausaDigitacao = false;

            function digitarTexto() {
                const palavraAtual = palavrasDigitacao[indicePalavra];

                if (!apagando) {
                    textoDigitacao.textContent = palavraAtual.substring(0, indiceLetra + 1);
                    indiceLetra++;

                    if (indiceLetra === palavraAtual.length) {
                        pausaDigitacao = true;
                        setTimeout(() => {
                            apagando = true;
                            pausaDigitacao = false;
                            digitarTexto();
                        }, 2000);
                        return;
                    }
                } else {
                    textoDigitacao.textContent = palavraAtual.substring(0, indiceLetra - 1);
                    indiceLetra--;

                    if (indiceLetra === 0) {
                        apagando = false;
                        indicePalavra = (indicePalavra + 1) % palavrasDigitacao.length;
                    }
                }

                if (!pausaDigitacao) {
                    setTimeout(digitarTexto, apagando ? 40 : 80);
                }
            }

            setTimeout(digitarTexto, 800);
        }

        /* ─── Slider ─── */
        function irParaSlide(indice) {
            slides.forEach((slide, i) => {
                const elementos = slide.querySelectorAll('.elemento-slide');

                if (i === indice) {
                    slide.classList.add('opacity-100', 'z-10', 'ativo');
                    slide.classList.remove('opacity-0', 'z-0');

                    elementos.forEach(el => {
                        el.style.animation = 'none';
                        el.offsetHeight;
                        el.style.animation = '';
                    });
                } else {
                    slide.classList.remove('opacity-100', 'z-10', 'ativo');
                    slide.classList.add('opacity-0', 'z-0');

                    const imgZoom = slide.querySelector('.slide-bg-zoom');
                    if (imgZoom) {
                        imgZoom.style.animation = 'none';
                        imgZoom.offsetHeight;
                        imgZoom.style.animation = '';
                    }
                }
            });

            dots.forEach((dot, i) => {
                const progresso = dot.querySelector('.progresso-dot');

                if (i === indice) {
                    dot.classList.add('ativo', 'w-10');
                    dot.classList.remove('w-3');
                    if (progresso) {
                        progresso.style.animation = 'none';
                        progresso.offsetHeight;
                        progresso.style.animation = '';
                    }
                } else {
                    dot.classList.remove('ativo', 'w-10');
                    dot.classList.add('w-3');
                    if (progresso) {
                        progresso.style.animation = 'none';
                    }
                }
            });

            slideAtual = indice;
        }

        function proximoSlide() {
            irParaSlide((slideAtual + 1) % totalSlides);
        }

        function slideAnterior() {
            irParaSlide((slideAtual - 1 + totalSlides) % totalSlides);
        }

        function iniciarAutoplay() {
            pararAutoplay();
            intervalo = setInterval(proximoSlide, 5000);
        }

        function pararAutoplay() {
            if (intervalo) clearInterval(intervalo);
        }

        if (btnNext) {
            btnNext.addEventListener('click', () => {
                proximoSlide();
                iniciarAutoplay();
            });
        }

        if (btnPrev) {
            btnPrev.addEventListener('click', () => {
                slideAnterior();
                iniciarAutoplay();
            });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                irParaSlide(parseInt(dot.dataset.dot));
                iniciarAutoplay();
            });
        });

        /* ─── Swipe mobile ─── */
        let touchStartX = 0;
        let touchEndX = 0;
        const swipeThreshold = 50;

        slidesContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slidesContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    proximoSlide();
                } else {
                    slideAnterior();
                }
                iniciarAutoplay();
            }
        }, { passive: true });

        iniciarAutoplay();

        const primeiroDot = dots[0]?.querySelector('.progresso-dot');
        if (primeiroDot) {
            primeiroDot.style.animation = 'none';
            primeiroDot.offsetHeight;
            primeiroDot.style.animation = '';
        }

        const bannerSection = document.getElementById('banner-principal');
        bannerSection.addEventListener('mouseenter', pararAutoplay);
        bannerSection.addEventListener('mouseleave', iniciarAutoplay);
    });
</script>
@endif