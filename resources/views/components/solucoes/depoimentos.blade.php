{{-- Seção Depoimentos - Página Soluções --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden" id="secao-depoimentos-solucoes">
    {{-- Decoração --}}
    <div class="absolute top-10 left-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>
    <div class="absolute bottom-10 right-0 w-72 h-72 bg-marca-escura/3 rounded-full blur-3xl translate-x-1/2"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-14 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Depoimentos</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                O que nossos <span class="text-marca">clientes</span> dizem
            </h2>
        </div>

        {{-- Slider de depoimentos --}}
        <div class="relative animar-entrada atraso-1">
            <div class="overflow-hidden rounded-3xl">
                <div class="flex transition-transform duration-700 ease-out" id="depoimentos-solucoes-track">

                    {{-- Depoimento 1 --}}
                    <div class="w-full shrink-0 px-2">
                        <div class="bg-white rounded-3xl border border-neutral-100 p-8 md:p-10 text-center">
                            <div class="w-16 h-16 rounded-full bg-marca/10 flex items-center justify-center mx-auto mb-5">
                                <i class="fa-solid fa-quote-left text-2xl text-marca"></i>
                            </div>
                            <p class="text-neutral-600 text-base md:text-lg font-normal leading-relaxed mb-6 max-w-2xl mx-auto">
                                "A Aconsult transformou a gestão contábil da nossa empresa. O atendimento é excepcional e o suporte via aplicativo facilita muito o nosso dia a dia."
                            </p>
                            <div>
                                <span class="text-neutral-900 font-black text-sm">Carlos M.</span>
                                <span class="text-neutral-400 text-sm font-normal block">Empresário</span>
                            </div>
                            <div class="flex items-center justify-center gap-1 mt-3">
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Depoimento 2 --}}
                    <div class="w-full shrink-0 px-2">
                        <div class="bg-white rounded-3xl border border-neutral-100 p-8 md:p-10 text-center">
                            <div class="w-16 h-16 rounded-full bg-marca/10 flex items-center justify-center mx-auto mb-5">
                                <i class="fa-solid fa-quote-left text-2xl text-marca"></i>
                            </div>
                            <p class="text-neutral-600 text-base md:text-lg font-normal leading-relaxed mb-6 max-w-2xl mx-auto">
                                "Profissionais extremamente qualificados. Desde que migramos para a Aconsult, conseguimos reduzir custos tributários e focar no crescimento do negócio."
                            </p>
                            <div>
                                <span class="text-neutral-900 font-black text-sm">Fernanda L.</span>
                                <span class="text-neutral-400 text-sm font-normal block">Diretora Comercial</span>
                            </div>
                            <div class="flex items-center justify-center gap-1 mt-3">
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Depoimento 3 --}}
                    <div class="w-full shrink-0 px-2">
                        <div class="bg-white rounded-3xl border border-neutral-100 p-8 md:p-10 text-center">
                            <div class="w-16 h-16 rounded-full bg-marca/10 flex items-center justify-center mx-auto mb-5">
                                <i class="fa-solid fa-quote-left text-2xl text-marca"></i>
                            </div>
                            <p class="text-neutral-600 text-base md:text-lg font-normal leading-relaxed mb-6 max-w-2xl mx-auto">
                                "O suporte da equipe é incrível. Sempre disponíveis para tirar dúvidas e nos orientar nas melhores práticas contábeis e fiscais."
                            </p>
                            <div>
                                <span class="text-neutral-900 font-black text-sm">Rafael S.</span>
                                <span class="text-neutral-400 text-sm font-normal block">Empreendedor Digital</span>
                            </div>
                            <div class="flex items-center justify-center gap-1 mt-3">
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                                <i class="fa-solid fa-star text-amber-400 text-sm"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Controles --}}
            <div class="flex items-center justify-center gap-4 mt-8">
                <button id="depoimentos-solucoes-prev" class="w-11 h-11 rounded-full bg-white border border-neutral-200 flex items-center justify-center hover:border-marca hover:text-marca transition-all duration-300 cursor-pointer" aria-label="Anterior">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>
                <div class="flex items-center gap-2" id="depoimentos-solucoes-dots">
                    <button class="w-2.5 h-2.5 rounded-full bg-marca cursor-pointer transition-all duration-300" data-index="0" aria-label="Depoimento 1"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-neutral-300 cursor-pointer transition-all duration-300" data-index="1" aria-label="Depoimento 2"></button>
                    <button class="w-2.5 h-2.5 rounded-full bg-neutral-300 cursor-pointer transition-all duration-300" data-index="2" aria-label="Depoimento 3"></button>
                </div>
                <button id="depoimentos-solucoes-next" class="w-11 h-11 rounded-full bg-white border border-neutral-200 flex items-center justify-center hover:border-marca hover:text-marca transition-all duration-300 cursor-pointer" aria-label="Próximo">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var track = document.getElementById('depoimentos-solucoes-track');
        var prev = document.getElementById('depoimentos-solucoes-prev');
        var next = document.getElementById('depoimentos-solucoes-next');
        var dotsContainer = document.getElementById('depoimentos-solucoes-dots');
        if (!track || !prev || !next || !dotsContainer) return;

        var dots = dotsContainer.querySelectorAll('button');
        var total = dots.length;
        var atual = 0;
        var autoplay;

        function irPara(i) {
            atual = ((i % total) + total) % total;
            track.style.transform = 'translateX(-' + (atual * 100) + '%)';
            dots.forEach(function (d, idx) {
                d.classList.toggle('bg-marca', idx === atual);
                d.classList.toggle('bg-neutral-300', idx !== atual);
            });
        }

        function iniciarAutoplay() {
            autoplay = setInterval(function () { irPara(atual + 1); }, 6000);
        }

        function resetAutoplay() {
            clearInterval(autoplay);
            iniciarAutoplay();
        }

        prev.addEventListener('click', function () { irPara(atual - 1); resetAutoplay(); });
        next.addEventListener('click', function () { irPara(atual + 1); resetAutoplay(); });
        dots.forEach(function (d) {
            d.addEventListener('click', function () { irPara(parseInt(d.dataset.index)); resetAutoplay(); });
        });

        iniciarAutoplay();
    });
</script>
