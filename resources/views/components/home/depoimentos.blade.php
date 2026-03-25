@props([
    'avaliacoes' => collect(),
])

@php
    $avaliacoesExibicao = $avaliacoes;

    if ($avaliacoesExibicao->isEmpty()) {
        $avaliacoesExibicao = collect([
            (object) [
                'nome' => 'Maria Silva',
                'cargo_empresa' => 'Diretora - Empresa XYZ Importacoes',
                'texto' => 'A Aconsult transformou completamente a gestao tributaria da nossa empresa. Profissionais competentes, atenciosos e sempre disponiveis.',
                'nota' => 5,
            ],
            (object) [
                'nome' => 'Roberto Oliveira',
                'cargo_empresa' => 'CEO - Tech Solutions Ltda',
                'texto' => 'Desde que comecamos a trabalhar com a Aconsult, conseguimos reduzir significativamente nossos custos tributarios. Uma equipe que realmente entende do negocio.',
                'nota' => 5,
            ],
            (object) [
                'nome' => 'Ana Costa',
                'cargo_empresa' => 'Socia - Global Trade SC',
                'texto' => 'O suporte para habilitacao RADAR foi impecavel. A Aconsult nos orientou em cada etapa e conseguimos a aprovacao rapidamente.',
                'nota' => 5,
            ],
        ]);
    }
@endphp

{{-- Seção Depoimentos - Slider automático --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden" id="secao-depoimentos">
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
        <div class="relative animar-entrada atraso-2">
            {{-- Cards container --}}
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-700 ease-in-out" id="depoimentos-track">
                    @foreach ($avaliacoesExibicao as $avaliacao)
                        <div class="w-full shrink-0 px-4">
                            <div class="bg-neutral-50 rounded-3xl p-8 md:p-12 relative">
                                <div class="absolute top-6 right-8 text-marca/10 text-[80px] font-black leading-none select-none">"</div>
                                <div class="relative z-10">
                                    <div class="flex items-center gap-1 mb-6 text-yellow-400">
                                        @php $nota = max(1, min(5, (int) ($avaliacao->nota ?? 5))); @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa-solid fa-star text-base {{ $i <= $nota ? '' : 'opacity-30' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="text-neutral-700 text-lg md:text-xl font-normal leading-relaxed mb-8 italic">
                                        "{{ $avaliacao->texto }}"
                                    </p>
                                    <div>
                                        <span class="text-base font-black text-neutral-900 block">{{ $avaliacao->nome }}</span>
                                        <span class="text-sm text-neutral-400 font-normal">{{ $avaliacao->cargo_empresa ?: 'Cliente Aconsult' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Controles --}}
            <div class="flex items-center justify-center gap-4 mt-10">
                <button id="depoimento-prev"
                        class="w-11 h-11 flex items-center justify-center rounded-full border border-neutral-200 text-neutral-500 hover:bg-marca hover:text-white hover:border-marca transition-all duration-300 cursor-pointer"
                        aria-label="Depoimento anterior">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>

                {{-- Indicadores --}}
                <div class="flex items-center gap-2" id="depoimentos-dots"></div>

                <button id="depoimento-next"
                        class="w-11 h-11 flex items-center justify-center rounded-full border border-neutral-200 text-neutral-500 hover:bg-marca hover:text-white hover:border-marca transition-all duration-300 cursor-pointer"
                        aria-label="Próximo depoimento">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('depoimentos-track');
        const btnPrev = document.getElementById('depoimento-prev');
        const btnNext = document.getElementById('depoimento-next');
        const dotsContainer = document.getElementById('depoimentos-dots');
        if (!track || !btnPrev || !btnNext || !dotsContainer) {
            return;
        }

        const slides = track.children;
        const total = slides.length;
        if (total === 0) {
            return;
        }
        let atual = 0;
        let intervalo = null;

        /* Cria dots */
        for (let i = 0; i < total; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 cursor-pointer ' + (i === 0 ? 'bg-marca w-6' : 'bg-neutral-300');
            dot.dataset.indice = i;
            dot.setAttribute('aria-label', `Depoimento ${i + 1}`);
            dot.addEventListener('click', () => { irPara(i); iniciarAuto(); });
            dotsContainer.appendChild(dot);
        }

        function irPara(indice) {
            atual = indice;
            track.style.transform = `translateX(-${atual * 100}%)`;

            /* Atualiza dots */
            dotsContainer.querySelectorAll('button').forEach((dot, i) => {
                if (i === atual) {
                    dot.classList.add('bg-marca', 'w-6');
                    dot.classList.remove('bg-neutral-300', 'w-2');
                } else {
                    dot.classList.remove('bg-marca', 'w-6');
                    dot.classList.add('bg-neutral-300', 'w-2');
                }
            });
        }

        function proximo() { irPara((atual + 1) % total); }
        function anterior() { irPara((atual - 1 + total) % total); }

        function iniciarAuto() {
            if (intervalo) clearInterval(intervalo);
            intervalo = setInterval(proximo, 5000);
        }

        btnNext.addEventListener('click', () => { proximo(); iniciarAuto(); });
        btnPrev.addEventListener('click', () => { anterior(); iniciarAuto(); });

        iniciarAuto();

        /* Pausa ao hover */
        const secao = document.getElementById('secao-depoimentos');
        secao.addEventListener('mouseenter', () => { if (intervalo) clearInterval(intervalo); });
        secao.addEventListener('mouseleave', iniciarAuto);
    });
</script>