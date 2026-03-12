{{-- Seção Reels - Slider de vídeos no formato vertical --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden" id="secao-reels">
    {{-- Decoração --}}
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center max-w-2xl mx-auto mb-14 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest flex items-center justify-center gap-2">
                <i class="fa-solid fa-play text-[8px]"></i>
                Conteúdo em vídeo
            </span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Nossos <span class="text-marca">Reels</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal">
                Acompanhe nossos conteúdos e fique por dentro do mundo contábil.
            </p>
        </div>

        {{-- Slider de reels --}}
        <div class="relative">
            {{-- Container do slider --}}
            <div class="overflow-hidden" id="reels-container">
                <div class="flex gap-6 transition-transform duration-500" id="reels-track">
                    @php
                        $reelsImagens = [
                            'imagem-da-dona-2.jpg',
                            '2-funcionario-descontraidos-sorrindo-2.jpg',
                            'imagem-da-dona-3.jpg',
                            'imagem-da-dona-4.jpg',
                            '2-funcionario-descontraidos-sorrindo-1.jpg',
                            'imagem-da-dona-1.jpg',
                        ];
                    @endphp

                    @foreach ($reelsImagens as $indice => $imagem)
                        <div class="reel-card shrink-0 w-[260px] md:w-[280px] cursor-pointer group animar-entrada atraso-{{ ($indice % 3) + 1 }}"
                             data-reel="{{ $indice }}">
                            <div class="relative rounded-2xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all duration-500" style="aspect-ratio: 9/16">
                                <img src="{{ asset('arquivos/imagens-empresa/' . $imagem) }}"
                                     alt="Reel {{ $indice + 1 }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                                {{-- Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                                {{-- Play button central --}}
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white opacity-0 group-hover:opacity-100 group-hover:scale-100 scale-75 transition-all duration-500">
                                        <i class="fa-solid fa-play text-lg ml-1"></i>
                                    </div>
                                </div>

                                {{-- Info inferior --}}
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <img src="{{ asset('arquivos/identidade-visual/logo-icone-png-colorido.png') }}"
                                             alt="Aconsult"
                                             class="w-6 h-6 rounded-full">
                                        <span class="text-white text-sm font-bold">aconsultcontabilidade</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-white/60 text-xs">
                                        <span class="flex items-center gap-1">
                                            <i class="fa-solid fa-eye text-white/80"></i>
                                            {{ number_format(rand(1200, 9800)) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Setas de navegação --}}
            <button id="reels-prev"
                    class="absolute -left-3 md:-left-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-white shadow-lg text-neutral-700 hover:bg-marca hover:text-white transition-all duration-300 border border-neutral-100 cursor-pointer"
                    aria-label="Reels anteriores">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button id="reels-next"
                    class="absolute -right-3 md:-right-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-white shadow-lg text-neutral-700 hover:bg-marca hover:text-white transition-all duration-300 border border-neutral-100 cursor-pointer"
                    aria-label="Próximos reels">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>
    </div>

    {{-- Modal tela cheia --}}
    <div id="reels-modal" class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-md hidden items-center justify-center p-4">
        <button id="fechar-modal-reel"
                class="absolute top-6 right-6 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all z-50 cursor-pointer"
                aria-label="Fechar">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <div class="max-h-[90vh] rounded-2xl overflow-hidden shadow-2xl" style="aspect-ratio: 9/16; max-width: 400px; width: 100%;">
            <img id="reel-modal-img" src="" alt="Reel em tela cheia" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('reels-track');
        const btnPrev = document.getElementById('reels-prev');
        const btnNext = document.getElementById('reels-next');
        const modal = document.getElementById('reels-modal');
        const modalImg = document.getElementById('reel-modal-img');
        const fecharModal = document.getElementById('fechar-modal-reel');
        const cards = document.querySelectorAll('.reel-card');

        let posicao = 0;
        const larguraCard = 296; /* 280px + 16px gap */
        const maxPosicao = Math.max(0, (cards.length * larguraCard) - track.parentElement.offsetWidth);

        btnNext.addEventListener('click', () => {
            posicao = Math.min(posicao + larguraCard * 3, maxPosicao);
            track.style.transform = `translateX(-${posicao}px)`;
        });

        btnPrev.addEventListener('click', () => {
            posicao = Math.max(posicao - larguraCard * 3, 0);
            track.style.transform = `translateX(-${posicao}px)`;
        });

        /* Abrir modal ao clicar no reel */
        cards.forEach(card => {
            card.addEventListener('click', () => {
                const img = card.querySelector('img');
                modalImg.src = img.src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        });

        /* Fechar modal */
        function fecharModalReel() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        fecharModal.addEventListener('click', fecharModalReel);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) fecharModalReel();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') fecharModalReel();
        });
    });
</script>