{{-- Seção Diferenciais - Página A Consult - Slider infinito --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-marca-escura/3 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.03), transparent 70%);"></div>

    <div class="relative z-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-14 max-w-7xl mx-auto px-6 md:px-10 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Por que nos escolher</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Nossos <span class="text-marca">diferenciais</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal max-w-lg mx-auto">
                Combinamos experiência, tecnologia e atendimento humanizado para entregar resultados que fazem a diferença.
            </p>
        </div>

        {{-- Slider de diferenciais - Linha 1 (esquerda para direita) --}}
        <div class="relative mb-6 animar-entrada atraso-1">
            {{-- Gradientes laterais para fade --}}
            <div class="absolute left-0 top-0 bottom-0 w-16 md:w-32 bg-gradient-to-r from-neutral-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 md:w-32 bg-gradient-to-l from-neutral-50 to-transparent z-10 pointer-events-none"></div>

            <div class="flex" id="diferenciais-linha-1" style="animation: rolar-diferenciais var(--duracao-slider) linear infinite;">
                @for ($i = 0; $i < 2; $i++)
                <div class="flex gap-6 shrink-0 px-3">

                    {{-- Card 1 - Aplicativo exclusivo --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-mobile-screen-button text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Aplicativo Exclusivo</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Gerencie documentos, acompanhe processos e tenha tudo na palma da mão com nosso app próprio.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 2 - Equipe especializada --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-user-tie text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Equipe Especializada</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Profissionais com formação sólida e experiência em contabilidade, tributação e comércio exterior.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 3 - Suporte humanizado --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-heart-pulse text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Suporte Humanizado</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Atendimento consultivo e próximo, com pessoas reais que entendem a realidade do seu negócio.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 4 - Experiência comprovada --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-award text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Experiência Comprovada</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Anos de atuação no mercado com resultados reais e cases de sucesso em diversos segmentos.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 5 - Ampla carteira de clientes --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-face-smile-beam text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Ampla Carteira de Clientes Satisfeitos</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Centenas de empresas confiam na Aconsult para cuidar da sua contabilidade e gestão tributária.</p>
                            </div>
                        </div>
                    </div>

                </div>
                @endfor
            </div>
        </div>

        {{-- Slider de diferenciais - Linha 2 (direita para esquerda) --}}
        <div class="relative animar-entrada atraso-2">
            {{-- Gradientes laterais para fade --}}
            <div class="absolute left-0 top-0 bottom-0 w-16 md:w-32 bg-gradient-to-r from-neutral-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 md:w-32 bg-gradient-to-l from-neutral-50 to-transparent z-10 pointer-events-none"></div>

            <div class="flex" id="diferenciais-linha-2" style="animation: rolar-diferenciais-reverso var(--duracao-slider) linear infinite;">
                @for ($i = 0; $i < 2; $i++)
                <div class="flex gap-6 shrink-0 px-3">

                    {{-- Card 6 - Diversidade de atendimento --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-layer-group text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Diversidade de Atendimento</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Soluções para empresas, e-commerce e comércio exterior — tudo em um só escritório.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 7 - Equipe qualificada e comprometida --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-users-gear text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Equipe Qualificada e Comprometida</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Time multidisciplinar que atua como parceiro estratégico para otimizar suas rotinas contábeis.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 8 - Conformidade legal garantida --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-shield-halved text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Conformidade Legal Garantida</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Segurança total nas obrigações fiscais e tributárias, mantendo sua empresa sempre em dia.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Card 9 - Atendimento a nível Brasil --}}
                    <div class="group w-[320px] md:w-[370px] shrink-0">
                        <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                            <div class="absolute inset-0 bg-gradient-to-br from-marca/[0.03] via-transparent to-marca-escura/[0.02] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                            <div class="relative z-10">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                    <i class="fa-solid fa-globe-americas text-2xl" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">Atendimento a Nível Brasil</h3>
                                <p class="text-sm text-neutral-500 font-normal leading-relaxed">Presente em mais de 10 estados, com suporte remoto completo sem perder a proximidade.</p>
                            </div>
                        </div>
                    </div>

                </div>
                @endfor
            </div>
        </div>
    </div>
</section>

<style>
    /* Velocidade do slider: mais rápido no mobile */
    :root {
        --duracao-slider: 10s;
    }
    @media (min-width: 768px) {
        :root {
            --duracao-slider: 35s;
        }
    }

    /* Slider infinito - Linha 1: esquerda para direita */
    @keyframes rolar-diferenciais {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    /* Slider infinito - Linha 2: direita para esquerda */
    @keyframes rolar-diferenciais-reverso {
        from { transform: translateX(-50%); }
        to { transform: translateX(0); }
    }

    /* Pausa ao hover nos cards */
    #diferenciais-linha-1:hover,
    #diferenciais-linha-2:hover {
        animation-play-state: paused;
    }

    /* Cursor de drag */
    .diferenciais-dragging {
        cursor: grabbing !important;
        user-select: none;
    }
    .diferenciais-dragging * {
        pointer-events: none !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        ['diferenciais-linha-1', 'diferenciais-linha-2'].forEach(function (id) {
            var el = document.getElementById(id);
            if (!el) return;

            var isDragging = false;
            var startX = 0;
            var currentTranslate = 0;
            var animState = '';

            function getTranslateX(element) {
                var style = window.getComputedStyle(element);
                var matrix = new DOMMatrix(style.transform);
                return matrix.m41;
            }

            function onStart(e) {
                isDragging = true;
                startX = (e.touches ? e.touches[0].clientX : e.clientX);
                currentTranslate = getTranslateX(el);
                animState = el.style.animation;
                el.style.animation = 'none';
                el.style.transform = 'translateX(' + currentTranslate + 'px)';
                el.classList.add('diferenciais-dragging');
            }

            function onMove(e) {
                if (!isDragging) return;
                var x = (e.touches ? e.touches[0].clientX : e.clientX);
                var diff = x - startX;
                var totalWidth = el.scrollWidth / 2;
                var newPos = currentTranslate + diff;

                // Loop infinito: se passar do limite, volta
                if (newPos > 0) newPos -= totalWidth;
                if (newPos < -totalWidth) newPos += totalWidth;

                el.style.transform = 'translateX(' + newPos + 'px)';
            }

            function onEnd() {
                if (!isDragging) return;
                isDragging = false;
                el.classList.remove('diferenciais-dragging');
                // Retoma a animação a partir da posição atual
                var pos = getTranslateX(el);
                var totalWidth = el.scrollWidth / 2;
                var progress = Math.abs(pos) / totalWidth;

                // Calcula duração restante proporcional
                var rootStyle = getComputedStyle(document.documentElement);
                var duracaoStr = rootStyle.getPropertyValue('--duracao-slider').trim();
                var duracao = parseFloat(duracaoStr) || 35;
                var isReverso = id === 'diferenciais-linha-2';

                if (isReverso) {
                    // Reverso vai de -50% para 0
                    var remainDuration = progress * duracao;
                    el.style.transform = '';
                    el.style.animation = animState;
                } else {
                    el.style.transform = '';
                    el.style.animation = animState;
                }
            }

            // Touch events
            el.addEventListener('touchstart', onStart, { passive: true });
            el.addEventListener('touchmove', onMove, { passive: true });
            el.addEventListener('touchend', onEnd);
            el.addEventListener('touchcancel', onEnd);

            // Mouse events (para desktop também)
            el.addEventListener('mousedown', onStart);
            window.addEventListener('mousemove', onMove);
            window.addEventListener('mouseup', onEnd);
        });
    });
</script>
