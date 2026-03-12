{{-- Banner Principal - Slider Full Screen --}}
<section id="banner-principal" class="relative w-full h-screen overflow-hidden">

    {{-- Container de Slides --}}
    <div class="relative w-full h-full">

        {{-- Slide 1 - Destaque com efeito de digitação --}}
        <div class="slide-banner absolute inset-0 opacity-100 z-10 transition-opacity duration-1000 ativo" data-slide="0">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/toda-equipe.jpg') }}"
                     alt="Equipe Aconsult Contabilidade"
                     class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30"></div>
            <div class="relative z-10 flex items-center h-full max-w-7xl mx-auto px-6 md:px-10">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 bg-marca/20 backdrop-blur-sm border border-marca/30 rounded-full px-4 py-1.5 mb-6 animate-fade-in">
                        <span class="w-2 h-2 rounded-full bg-marca animate-pulse"></span>
                        <span class="text-white/90 text-xs tracking-wider uppercase font-bold">Itajaí - Santa Catarina</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl 2xl:text-7xl font-black text-white leading-[1.1] mb-6">
                        Contabilidade e
                        <br>
                        <span id="texto-digitacao" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span>
                        <br>
                        <span class="text-white/90">para o seu negócio</span>
                    </h1>
                    <p class="text-lg md:text-xl text-white/70 font-normal max-w-xl mb-8 leading-relaxed">
                        Com uma equipe de contadores experientes e comprometidos, otimizamos suas operações tributárias e potencializamos o crescimento do seu negócio.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://wa.me/554721250281?text=Ol%C3%A1%21+Bem-vindo+%C3%A0+Aconsult%21+%F0%9F%91%8B+Como+podemos+ajudar%3F"
                           target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 bg-marca hover:bg-marca-escura text-white px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 hover:shadow-xl hover:shadow-marca/30 hover:-translate-y-0.5">
                            Conhecer soluções
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="{{ route('contato') }}"
                           class="inline-flex items-center gap-2 border-2 border-white/30 hover:border-white/60 text-white px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 backdrop-blur-sm">
                            Fale conosco
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="slide-banner absolute inset-0 opacity-0 z-0 transition-opacity duration-1000" data-slide="1">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/3-mulheres-trabalhando-alegre.jpg') }}"
                     alt="Eficiência contábil Aconsult"
                     class="w-full h-full object-cover slide-bg-zoom">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/55 to-black/25"></div>
            <div class="relative z-10 flex items-center h-full max-w-7xl mx-auto px-6 md:px-10">
                <div class="max-w-3xl">
                    <span class="inline-block bg-marca text-white text-xs font-bold uppercase tracking-wider px-4 py-1.5 rounded-full mb-6">
                        Nosso diferencial
                    </span>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl 2xl:text-6xl font-black text-white leading-[1.1] mb-5">
                        Eficiência contábil que<br>
                        <span class="text-marca">faz a diferença!</span>
                    </h2>
                    <p class="text-lg text-white/70 font-normal max-w-xl mb-8 leading-relaxed">
                        Simplificamos sua jornada empreendedora com nossa expertise contábil, enquanto você se dedica ao seu negócio.
                    </p>
                    <a href="https://wa.me/554721250281?text=Ol%C3%A1%21+Bem-vindo+%C3%A0+Aconsult%21+%F0%9F%91%8B+Como+podemos+ajudar%3F"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-marca hover:bg-marca-escura text-white px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 hover:shadow-xl hover:shadow-marca/30 hover:-translate-y-0.5">
                        Saiba mais
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="slide-banner absolute inset-0 opacity-0 z-0 transition-opacity duration-1000" data-slide="2">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('arquivos/imagens-empresa/2-funcionario-descontraidos-sorrindo-1.jpg') }}"
                     alt="Comércio Exterior Aconsult"
                     class="w-full h-full object-cover slide-bg-zoom">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/55 to-black/25"></div>
            <div class="relative z-10 flex items-center h-full max-w-7xl mx-auto px-6 md:px-10">
                <div class="max-w-3xl">
                    <span class="inline-block bg-marca text-white text-xs font-bold uppercase tracking-wider px-4 py-1.5 rounded-full mb-6">
                        Comércio Exterior
                    </span>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl 2xl:text-6xl font-black text-white leading-[1.1] mb-5">
                        Especialistas em<br>
                        <span class="text-marca">Comércio Exterior</span>
                    </h2>
                    <p class="text-lg text-white/70 font-normal max-w-xl mb-8 leading-relaxed">
                        Nossa equipe está preparada para oferecer suporte personalizado e estratégico para o seu negócio no mercado internacional.
                    </p>
                    <a href="https://wa.me/554721250281?text=Ol%C3%A1%21+Bem-vindo+%C3%A0+Aconsult%21+%F0%9F%91%8B+Como+podemos+ajudar%3F"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-marca hover:bg-marca-escura text-white px-8 py-3.5 rounded-full font-bold text-sm transition-all duration-300 hover:shadow-xl hover:shadow-marca/30 hover:-translate-y-0.5">
                        Quero saber mais
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Setas de navegação --}}
    <button id="banner-prev"
            class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-marca transition-all duration-300 border border-white/20 hover:border-marca cursor-pointer"
            aria-label="Slide anterior">
        <i class="fa-solid fa-chevron-left text-sm"></i>
    </button>
    <button id="banner-next"
            class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 backdrop-blur-md text-white hover:bg-marca transition-all duration-300 border border-white/20 hover:border-marca cursor-pointer"
            aria-label="Próximo slide">
        <i class="fa-solid fa-chevron-right text-sm"></i>
    </button>

    {{-- Indicadores (dots) --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex items-center gap-3">
        <button class="dot-banner w-10 h-1 rounded-full bg-white/80 transition-all duration-500 cursor-pointer" data-dot="0" aria-label="Ir para slide 1"></button>
        <button class="dot-banner w-6 h-1 rounded-full bg-white/30 transition-all duration-500 cursor-pointer" data-dot="1" aria-label="Ir para slide 2"></button>
        <button class="dot-banner w-6 h-1 rounded-full bg-white/30 transition-all duration-500 cursor-pointer" data-dot="2" aria-label="Ir para slide 3"></button>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 right-8 z-30 hidden md:flex flex-col items-center gap-2 text-white/40">
        <span class="text-[10px] uppercase tracking-widest rotate-90 origin-center translate-y-4">Scroll</span>
        <div class="w-px h-10 bg-gradient-to-b from-white/40 to-transparent mt-6"></div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slides = document.querySelectorAll('.slide-banner');
        const dots = document.querySelectorAll('.dot-banner');
        const btnPrev = document.getElementById('banner-prev');
        const btnNext = document.getElementById('banner-next');
        const textoDigitacao = document.getElementById('texto-digitacao');
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
                if (i === indice) {
                    slide.classList.add('opacity-100', 'z-10', 'ativo');
                    slide.classList.remove('opacity-0', 'z-0');
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

            dots.forEach((dot, i) => {
                if (i === indice) {
                    dot.classList.add('bg-white/80', 'w-10');
                    dot.classList.remove('bg-white/30', 'w-6');
                } else {
                    dot.classList.remove('bg-white/80', 'w-10');
                    dot.classList.add('bg-white/30', 'w-6');
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

        /* Event listeners */
        btnNext.addEventListener('click', () => {
            proximoSlide();
            iniciarAutoplay();
        });

        btnPrev.addEventListener('click', () => {
            slideAnterior();
            iniciarAutoplay();
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                irParaSlide(parseInt(dot.dataset.dot));
                iniciarAutoplay();
            });
        });

        /* Inicia autoplay */
        iniciarAutoplay();

        /* Pausa ao hover */
        const bannerSection = document.getElementById('banner-principal');
        bannerSection.addEventListener('mouseenter', pararAutoplay);
        bannerSection.addEventListener('mouseleave', iniciarAutoplay);
    });
</script>