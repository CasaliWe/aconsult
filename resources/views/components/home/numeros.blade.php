{{-- Seção Números - Contadores animados com banners ciclando --}}
<section class="relative h-[500px] md:h-[550px] overflow-hidden" id="secao-numeros">

    {{-- Imagens de fundo que ciclam a cada 1 segundo --}}
    <div class="absolute inset-0">
        <div class="numero-bg absolute inset-0 opacity-100 transition-opacity duration-700" data-bg="0">
            <img src="{{ asset('arquivos/imagens-empresa/toda-equipe-reduzida.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="numero-bg absolute inset-0 opacity-0 transition-opacity duration-700" data-bg="1">
            <img src="{{ asset('arquivos/imagens-empresa/toda-equipe-reduzida-2.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="numero-bg absolute inset-0 opacity-0 transition-opacity duration-700" data-bg="2">
            <img src="{{ asset('arquivos/imagens-empresa/time-reduzido-chefia-em-pe.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="numero-bg absolute inset-0 opacity-0 transition-opacity duration-700" data-bg="3">
            <img src="{{ asset('arquivos/imagens-empresa/time-pequeno-feliz-trabalhando.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="numero-bg absolute inset-0 opacity-0 transition-opacity duration-700" data-bg="4">
            <img src="{{ asset('arquivos/imagens-empresa/chefia-reduzido.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>
    </div>

    {{-- Overlay escuro --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/70 to-black/80 z-10"></div>

    {{-- Conteúdo --}}
    <div class="relative z-20 flex flex-col items-center justify-center h-full max-w-7xl mx-auto px-6">
        {{-- Título --}}
        <div class="text-center mb-14 animar-entrada">
            <span class="text-marca text-xs font-bold uppercase tracking-widest">Em números</span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mt-2">
                Nossos <span class="text-marca">números</span>
            </h2>
        </div>

        {{-- Grid de números --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12 w-full max-w-4xl">
            <div class="text-center animar-entrada atraso-1">
                <div class="flex items-baseline justify-center gap-1 mb-2">
                    <span class="text-marca text-lg font-bold">+</span>
                    <span class="text-5xl md:text-6xl font-black text-white contador" data-alvo="7">0</span>
                </div>
                <div class="w-10 h-0.5 bg-marca/50 mx-auto mb-3 rounded-full"></div>
                <span class="text-white/60 text-sm font-normal">Anos de história</span>
            </div>

            <div class="text-center animar-entrada atraso-2">
                <div class="flex items-baseline justify-center gap-1 mb-2">
                    <span class="text-marca text-lg font-bold">+</span>
                    <span class="text-5xl md:text-6xl font-black text-white contador" data-alvo="30">0</span>
                </div>
                <div class="w-10 h-0.5 bg-marca/50 mx-auto mb-3 rounded-full"></div>
                <span class="text-white/60 text-sm font-normal">Colaboradores</span>
            </div>

            <div class="text-center animar-entrada atraso-3">
                <div class="flex items-baseline justify-center gap-1 mb-2">
                    <span class="text-marca text-lg font-bold">+</span>
                    <span class="text-5xl md:text-6xl font-black text-white contador" data-alvo="350">0</span>
                </div>
                <div class="w-10 h-0.5 bg-marca/50 mx-auto mb-3 rounded-full"></div>
                <span class="text-white/60 text-sm font-normal">Clientes ativos</span>
            </div>

            <div class="text-center animar-entrada atraso-4">
                <div class="flex items-baseline justify-center gap-1 mb-2">
                    <span class="text-marca text-lg font-bold">+</span>
                    <span class="text-5xl md:text-6xl font-black text-white contador" data-alvo="10">0</span>
                </div>
                <div class="w-10 h-0.5 bg-marca/50 mx-auto mb-3 rounded-full"></div>
                <span class="text-white/60 text-sm font-normal">Estados atendidos</span>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        /* ─── Contadores animados ─── */
        const contadores = document.querySelectorAll('.contador');
        let contadoresIniciados = false;

        const observadorNumeros = new IntersectionObserver((entradas) => {
            entradas.forEach(entrada => {
                if (entrada.isIntersecting && !contadoresIniciados) {
                    contadoresIniciados = true;
                    contadores.forEach(contador => {
                        const alvo = parseInt(contador.dataset.alvo);
                        const duracao = 2000;
                        const incremento = alvo / (duracao / 16);
                        let atual = 0;

                        function atualizar() {
                            atual += incremento;
                            if (atual >= alvo) {
                                contador.textContent = alvo;
                                return;
                            }
                            contador.textContent = Math.floor(atual);
                            requestAnimationFrame(atualizar);
                        }

                        atualizar();
                    });
                    observadorNumeros.unobserve(entrada.target);
                }
            });
        }, { threshold: 0.3 });

        const secaoNumeros = document.getElementById('secao-numeros');
        if (secaoNumeros) {
            observadorNumeros.observe(secaoNumeros);
        }

        /* ─── Banners ciclando a cada 1 segundo ─── */
        const bgs = document.querySelectorAll('.numero-bg');
        let bgAtual = 0;
        const totalBgs = bgs.length;

        setInterval(() => {
            bgs.forEach((bg, i) => {
                bg.classList.toggle('opacity-100', i === (bgAtual + 1) % totalBgs);
                bg.classList.toggle('opacity-0', i !== (bgAtual + 1) % totalBgs);
            });
            bgAtual = (bgAtual + 1) % totalBgs;
        }, 1000);
    });
</script>