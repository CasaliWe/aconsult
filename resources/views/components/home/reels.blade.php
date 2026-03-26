@php
    $listaReels = $reels ?? collect();
@endphp

@if ($listaReels->count())
    {{-- Seção Reels - Slider de vídeos no formato vertical --}}
    <section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden" id="secao-reels">
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
            <div class="text-center max-w-2xl mx-auto mb-14 animar-entrada">
                <span class="text-marca text-sm font-bold uppercase tracking-widest flex items-center justify-center gap-2">
                    <i class="fa-solid fa-play text-[8px]"></i>
                    Conteudo em video
                </span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                    Nossos <span class="text-marca">Reels</span>
                </h2>
                <p class="text-neutral-500 text-base font-normal">
                    Acompanhe nossos conteudos e fique por dentro do mundo contabil.
                </p>
            </div>

            <div class="relative">
                <div class="overflow-hidden" id="reels-container">
                    <div class="flex gap-6 transition-transform duration-500" id="reels-track">
                        @foreach ($listaReels as $indice => $reel)
                            <button type="button"
                                    class="reel-card shrink-0 cursor-pointer group animar-entrada atraso-{{ ($indice % 3) + 1 }}"
                                    style="width: 280px;"
                                    data-video-url="{{ asset($reel->video) }}"
                                    aria-label="Abrir reel {{ $indice + 1 }}">
                                <div class="relative rounded-2xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all duration-500" style="aspect-ratio: 9 / 16;">
                                    <img src="{{ asset($reel->capa) }}"
                                         alt="Capa do reel {{ $indice + 1 }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                                    <div class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent"></div>

                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-16 h-16 flex items-center justify-center rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-white opacity-0 group-hover:opacity-100 group-hover:scale-100 scale-75 transition-all duration-500">
                                            <i class="fa-solid fa-play text-lg ml-1"></i>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <div class="flex items-center gap-2 mb-2">
                                            <img src="{{ asset('arquivos/identidade-visual/logo-icone-png-colorido.png') }}"
                                                 alt="Aconsult"
                                                 class="w-6 h-6 rounded-full">
                                            <span class="text-white text-sm font-bold">{{ $instagramMarcaId ?? 'aconsultcontabilidade' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                <button id="reels-prev"
                        class="absolute -left-3 md:-left-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-white shadow-lg text-neutral-700 hover:bg-marca hover:text-white transition-all duration-300 border border-neutral-100 cursor-pointer"
                        aria-label="Reels anteriores">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
                <button id="reels-next"
                        class="absolute -right-3 md:-right-5 top-1/2 -translate-y-1/2 z-20 w-11 h-11 flex items-center justify-center rounded-full bg-white shadow-lg text-neutral-700 hover:bg-marca hover:text-white transition-all duration-300 border border-neutral-100 cursor-pointer"
                        aria-label="Proximos reels">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
            </div>
        </div>

        <div id="reels-modal" class="fixed inset-0 z-100 bg-black/95 backdrop-blur-md hidden items-center justify-center p-4">
            <button id="fechar-modal-reel"
                    class="absolute top-6 right-6 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-all z-50 cursor-pointer"
                    aria-label="Fechar">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <div class="rounded-2xl overflow-hidden shadow-2xl" style="aspect-ratio: 9 / 16; width: min(380px, 92vw); max-height: 90vh;">
                <video id="reel-modal-video" class="w-full h-full object-cover" controls playsinline preload="metadata"></video>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('reels-track');
            const container = document.getElementById('reels-container');
            const btnPrev = document.getElementById('reels-prev');
            const btnNext = document.getElementById('reels-next');
            const modal = document.getElementById('reels-modal');
            const modalVideo = document.getElementById('reel-modal-video');
            const fecharModal = document.getElementById('fechar-modal-reel');
            const cards = Array.from(document.querySelectorAll('.reel-card'));

            if (!track || !container || !btnPrev || !btnNext || !modal || !modalVideo || cards.length === 0) {
                return;
            }

            let posicao = 0;

            function larguraPasso() {
                const card = cards[0];
                if (!card) {
                    return 300;
                }

                const estiloTrack = window.getComputedStyle(track);
                const gap = parseInt(estiloTrack.columnGap || estiloTrack.gap || '24', 10) || 24;
                return card.offsetWidth + gap;
            }

            function maxPosicao() {
                return Math.max(0, track.scrollWidth - container.offsetWidth);
            }

            function aplicarPosicao() {
                const max = maxPosicao();
                if (posicao > max) {
                    posicao = max;
                }

                track.style.transform = 'translateX(-' + posicao + 'px)';
            }

            btnNext.addEventListener('click', () => {
                const passo = larguraPasso() * 2;
                posicao = Math.min(posicao + passo, maxPosicao());
                aplicarPosicao();
            });

            btnPrev.addEventListener('click', () => {
                const passo = larguraPasso() * 2;
                posicao = Math.max(posicao - passo, 0);
                aplicarPosicao();
            });

            cards.forEach((card) => {
                card.addEventListener('click', () => {
                    const videoUrl = card.getAttribute('data-video-url') || '';
                    if (!videoUrl) {
                        return;
                    }

                    modalVideo.pause();
                    modalVideo.src = videoUrl;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.style.overflow = 'hidden';

                    const promessaPlay = modalVideo.play();
                    if (promessaPlay && typeof promessaPlay.catch === 'function') {
                        promessaPlay.catch(() => {
                            // Alguns navegadores podem bloquear autoplay sem interação adicional.
                        });
                    }
                });
            });

            function fecharModalReel() {
                modalVideo.pause();
                modalVideo.removeAttribute('src');
                modalVideo.load();
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            fecharModal.addEventListener('click', fecharModalReel);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    fecharModalReel();
                }
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    fecharModalReel();
                }
            });
            window.addEventListener('resize', aplicarPosicao);
        });
    </script>
@endif