{{-- Banner Principal - Slider Full Screen --}}
<section id="banner-principal" class="relative w-full h-[100dvh] lg:h-[100vh] 2xl:h-[70vh] min-h-[500px] overflow-hidden">

    {{-- Container de Slides --}}
    <div class="relative w-full h-full" id="slides-container">

        {{-- Slide 1 - Destaque com efeito de digitação --}}
        <div class="slide-banner absolute inset-0 opacity-100 z-10 transition-opacity duration-1000 ativo" data-slide="0">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/toda-equipe.jpg') }}"
                     alt="Equipe Aconsult Contabilidade"
                     class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent md:hidden"></div>
            <div class="relative z-10 flex items-center h-full w-full">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-10">
                    <div class="max-w-2xl">
                        <div class="elemento-slide flex items-center gap-3 mb-4 md:mb-5" style="--atraso: 0.1s">
                            <span class="w-8 h-[2px] bg-marca rounded-full"></span>
                            <span class="text-marca text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold">Aconsult Contabilidade</span>
                        </div>
                        <h1 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            Contabilidade e
                            <br>
                            <span id="texto-digitacao" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span>
                            <br>
                            <span class="text-white/85">para o seu negócio</span>
                        </h1>
                        <div class="elemento-slide flex gap-4 mb-6 md:mb-8" style="--atraso: 0.4s">
                            <span class="hidden sm:block w-[2px] bg-marca/40 rounded-full shrink-0"></span>
                            <p class="text-sm sm:text-base lg:text-lg text-white/60 font-normal max-w-md leading-relaxed">
                                Otimizamos suas operações tributárias e potencializamos o crescimento da sua empresa.
                            </p>
                        </div>
                        <div class="elemento-slide flex flex-wrap gap-3" style="--atraso: 0.55s">
                            <a href="https://wa.me/554721250281?text=Ol%C3%A1%21+Bem-vindo+%C3%A0+Aconsult%21+%F0%9F%91%8B+Como+podemos+ajudar%3F"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Conhecer soluções
                                <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                            </a>
                            <a href="{{ route('contato') }}"
                               class="inline-flex items-center gap-2 border border-white/25 hover:border-white/50 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:-translate-y-0.5 backdrop-blur-sm"
                               style="background-color: rgba(255,255,255,0.1);">
                                Fale conosco
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 2 - Soluções para Empresas --}}
        <div class="slide-banner absolute inset-0 opacity-0 z-0 transition-opacity duration-1000" data-slide="1">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-trabalhando-alegre.jpg') }}"
                     alt="Soluções para empresas Aconsult"
                     class="w-full h-full object-cover slide-bg-zoom">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent md:hidden"></div>
            <div class="relative z-10 flex items-center h-full w-full">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-10">
                    <div class="max-w-2xl">
                        <div class="elemento-slide flex items-center gap-3 mb-4 md:mb-5" style="--atraso: 0.1s">
                            <span class="w-8 h-[2px] bg-marca rounded-full"></span>
                            <span class="text-marca text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold">Soluções Empresariais</span>
                        </div>
                        <h2 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            Soluções para<br>
                            <span class="text-marca">sua empresa</span>
                        </h2>
                        <div class="elemento-slide flex gap-4 mb-6 md:mb-8" style="--atraso: 0.4s">
                            <span class="hidden sm:block w-[2px] bg-marca/40 rounded-full shrink-0"></span>
                            <p class="text-sm sm:text-base lg:text-lg text-white/60 font-normal max-w-md leading-relaxed">
                                Tributação fiscal, contabilidade inteligente e gestão estratégica para o seu negócio crescer com segurança.
                            </p>
                        </div>
                        <div class="elemento-slide flex flex-wrap gap-3" style="--atraso: 0.55s">
                            <a href="{{ route('solucoes', 'empresas') }}"
                               class="inline-flex items-center gap-2 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Saiba mais
                                <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 3 - Soluções para E-commerce --}}
        <div class="slide-banner absolute inset-0 opacity-0 z-0 transition-opacity duration-1000" data-slide="2">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/3-funcionarias-conversando.jpg') }}"
                     alt="Soluções para e-commerce Aconsult"
                     class="w-full h-full object-cover slide-bg-zoom">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent md:hidden"></div>
            <div class="relative z-10 flex items-center h-full w-full">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-10">
                    <div class="max-w-2xl">
                        <div class="elemento-slide flex items-center gap-3 mb-4 md:mb-5" style="--atraso: 0.1s">
                            <span class="w-8 h-[2px] bg-marca rounded-full"></span>
                            <span class="text-marca text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold">E-commerce</span>
                        </div>
                        <h2 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            Soluções para<br>
                            <span class="text-marca">e-commerce</span>
                        </h2>
                        <div class="elemento-slide flex gap-4 mb-6 md:mb-8" style="--atraso: 0.4s">
                            <span class="hidden sm:block w-[2px] bg-marca/40 rounded-full shrink-0"></span>
                            <p class="text-sm sm:text-base lg:text-lg text-white/60 font-normal max-w-md leading-relaxed">
                                Contabilidade especializada para lojas virtuais, marketplaces e negócios digitais.
                            </p>
                        </div>
                        <div class="elemento-slide flex flex-wrap gap-3" style="--atraso: 0.55s">
                            <a href="{{ route('solucoes', 'ecommerce') }}"
                               class="inline-flex items-center gap-2 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Saiba mais
                                <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 4 - Soluções para Comex --}}
        <div class="slide-banner absolute inset-0 opacity-0 z-0 transition-opacity duration-1000" data-slide="3">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/2-funcionario-descontraidos-sorrindo-1.jpg') }}"
                     alt="Comércio Exterior Aconsult"
                     class="w-full h-full object-cover slide-bg-zoom">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent md:hidden"></div>
            <div class="relative z-10 flex items-center h-full w-full">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-10">
                    <div class="max-w-2xl">
                        <div class="elemento-slide flex items-center gap-3 mb-4 md:mb-5" style="--atraso: 0.1s">
                            <span class="w-8 h-[2px] bg-marca rounded-full"></span>
                            <span class="text-marca text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold">Comércio Exterior</span>
                        </div>
                        <h2 class="elemento-slide titulo-banner font-black text-white leading-[1.08] mb-4 md:mb-5" style="--atraso: 0.25s">
                            Especialistas em<br>
                            <span class="text-marca">comércio exterior</span>
                        </h2>
                        <div class="elemento-slide flex gap-4 mb-6 md:mb-8" style="--atraso: 0.4s">
                            <span class="hidden sm:block w-[2px] bg-marca/40 rounded-full shrink-0"></span>
                            <p class="text-sm sm:text-base lg:text-lg text-white/60 font-normal max-w-md leading-relaxed">
                                Assessoria estratégica em RADAR, regimes especiais e operações internacionais.
                            </p>
                        </div>
                        <div class="elemento-slide flex flex-wrap gap-3" style="--atraso: 0.55s">
                            <a href="{{ route('solucoes', 'comex') }}"
                               class="inline-flex items-center gap-2 text-white px-6 sm:px-8 py-2.5 sm:py-3.5 rounded-full font-bold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Saiba mais
                                <i class="fa-solid fa-arrow-right text-[10px] sm:text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Barra de navegação inferior --}}
    <div class="absolute bottom-0 left-0 right-0 z-30 pb-5 sm:pb-7">
        <div class="max-w-7xl mx-auto px-6 md:px-10 flex items-center gap-5">
            {{-- Dots com progresso --}}
            <div class="flex items-center gap-2">
                <button class="dot-banner ativo relative overflow-hidden w-10 h-1 rounded-full bg-white/15 cursor-pointer transition-[width] duration-500" data-dot="0" aria-label="Ir para slide 1">
                    <span class="progresso-dot absolute inset-0 rounded-full bg-marca"></span>
                </button>
                <button class="dot-banner relative overflow-hidden w-3 h-1 rounded-full bg-white/15 cursor-pointer transition-[width] duration-500" data-dot="1" aria-label="Ir para slide 2">
                    <span class="progresso-dot absolute inset-0 rounded-full bg-marca"></span>
                </button>
                <button class="dot-banner relative overflow-hidden w-3 h-1 rounded-full bg-white/15 cursor-pointer transition-[width] duration-500" data-dot="2" aria-label="Ir para slide 3">
                    <span class="progresso-dot absolute inset-0 rounded-full bg-marca"></span>
                </button>
                <button class="dot-banner relative overflow-hidden w-3 h-1 rounded-full bg-white/15 cursor-pointer transition-[width] duration-500" data-dot="3" aria-label="Ir para slide 4">
                    <span class="progresso-dot absolute inset-0 rounded-full bg-marca"></span>
                </button>
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

        /* ─── Efeito de digitação ─── */
        const palavrasDigitacao = ['inteligência tributária', 'assessoria contábil', 'gestão estratégica'];
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

        /* Inicia digitação */
        setTimeout(digitarTexto, 800);

        /* ─── Slider ─── */
        function irParaSlide(indice) {
            slides.forEach((slide, i) => {
                const elementos = slide.querySelectorAll('.elemento-slide');

                if (i === indice) {
                    slide.classList.add('opacity-100', 'z-10', 'ativo');
                    slide.classList.remove('opacity-0', 'z-0');

                    /* Re-dispara animações de entrada do conteúdo */
                    elementos.forEach(el => {
                        el.style.animation = 'none';
                        el.offsetHeight; /* Force reflow */
                        el.style.animation = '';
                    });
                } else {
                    slide.classList.remove('opacity-100', 'z-10', 'ativo');
                    slide.classList.add('opacity-0', 'z-0');

                    /* Reset zoom para quando voltar */
                    const imgZoom = slide.querySelector('.slide-bg-zoom');
                    if (imgZoom) {
                        imgZoom.style.animation = 'none';
                        imgZoom.offsetHeight; /* Force reflow */
                        imgZoom.style.animation = '';
                    }
                }
            });

            /* Atualiza dots com progresso */
            dots.forEach((dot, i) => {
                const progresso = dot.querySelector('.progresso-dot');

                if (i === indice) {
                    dot.classList.add('ativo', 'w-10');
                    dot.classList.remove('w-3');
                    /* Re-dispara animação de progresso */
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

        /* Event listeners - Setas */
        btnNext.addEventListener('click', () => {
            proximoSlide();
            iniciarAutoplay();
        });

        btnPrev.addEventListener('click', () => {
            slideAnterior();
            iniciarAutoplay();
        });

        /* Event listeners - Dots */
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

        /* Inicia autoplay */
        iniciarAutoplay();

        /* Dispara animação inicial do primeiro dot */
        const primeiroDot = dots[0]?.querySelector('.progresso-dot');
        if (primeiroDot) {
            primeiroDot.style.animation = 'none';
            primeiroDot.offsetHeight;
            primeiroDot.style.animation = '';
        }

        /* Pausa ao hover */
        const bannerSection = document.getElementById('banner-principal');
        bannerSection.addEventListener('mouseenter', pararAutoplay);
        bannerSection.addEventListener('mouseleave', iniciarAutoplay);
    });
</script>