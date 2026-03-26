{{-- Seção Diferenciais - Página A Consult - Slider infinito --}}
@php
    $listaDiferenciais = $cards ?? collect();
    $primeiraLinha = $listaDiferenciais->values()->filter(fn($item, $index) => $index % 2 === 0)->values();
    $segundaLinha = $listaDiferenciais->values()->filter(fn($item, $index) => $index % 2 !== 0)->values();

    if ($segundaLinha->isEmpty()) {
        $segundaLinha = $primeiraLinha;
    }
@endphp

@if ($listaDiferenciais->count())
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-marca-escura/3 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-full blur-3xl" style="width: 600px; height: 600px; background: radial-gradient(circle, rgba(226, 24, 80, 0.03), transparent 70%);"></div>

    <div class="relative z-10">
        <div class="text-center mb-14 max-w-7xl mx-auto px-6 md:px-10 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Por que nos escolher</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Nossos <span class="text-marca">diferenciais</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal max-w-lg mx-auto">
                Combinamos experiencia, tecnologia e atendimento humanizado para entregar resultados que fazem a diferenca.
            </p>
        </div>

        <div class="relative mb-6 animar-entrada atraso-1">
            <div class="absolute left-0 top-0 bottom-0 w-16 md:w-32 bg-linear-to-r from-neutral-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 md:w-32 bg-linear-to-l from-neutral-50 to-transparent z-10 pointer-events-none"></div>

            <div class="flex" id="diferenciais-linha-1" style="animation: rolar-diferenciais var(--duracao-slider) linear infinite;">
                @for ($rep = 0; $rep < 2; $rep++)
                    <div class="flex gap-6 shrink-0 px-3">
                        @foreach ($primeiraLinha as $card)
                            <div class="group shrink-0" style="width: 320px;">
                                <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                                    <div class="absolute inset-0 bg-linear-to-br from-marca/3 via-transparent to-marca-escura/2 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="absolute top-0 left-0 right-0 h-0.75 bg-linear-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                            <i class="{{ $card->icone_classe }} text-2xl" style="color: #e21850;"></i>
                                        </div>
                                        <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">{{ $card->titulo }}</h3>
                                        <p class="text-sm text-neutral-500 font-normal leading-relaxed">{{ $card->texto }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>

        <div class="relative animar-entrada atraso-2">
            <div class="absolute left-0 top-0 bottom-0 w-16 md:w-32 bg-linear-to-r from-neutral-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 md:w-32 bg-linear-to-l from-neutral-50 to-transparent z-10 pointer-events-none"></div>

            <div class="flex" id="diferenciais-linha-2" style="animation: rolar-diferenciais-reverso var(--duracao-slider) linear infinite;">
                @for ($rep = 0; $rep < 2; $rep++)
                    <div class="flex gap-6 shrink-0 px-3">
                        @foreach ($segundaLinha as $card)
                            <div class="group shrink-0" style="width: 320px;">
                                <div class="relative bg-white rounded-2xl p-7 border border-neutral-100 h-full transition-all duration-500 hover:shadow-2xl hover:shadow-marca/8 hover:-translate-y-2 hover:border-marca/20 overflow-hidden cursor-default">
                                    <div class="absolute inset-0 bg-linear-to-br from-marca/3 via-transparent to-marca-escura/2 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    <div class="absolute top-0 left-0 right-0 h-0.75 bg-linear-to-r from-marca to-marca-escura scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left rounded-t-2xl"></div>
                                    <div class="relative z-10">
                                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3" style="background-color: rgba(226,24,80,0.08);">
                                            <i class="{{ $card->icone_classe }} text-2xl" style="color: #e21850;"></i>
                                        </div>
                                        <h3 class="text-lg font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2">{{ $card->titulo }}</h3>
                                        <p class="text-sm text-neutral-500 font-normal leading-relaxed">{{ $card->texto }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --duracao-slider: 10s;
    }
    @media (min-width: 768px) {
        :root {
            --duracao-slider: 35s;
        }
    }

    @keyframes rolar-diferenciais {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    @keyframes rolar-diferenciais-reverso {
        from { transform: translateX(-50%); }
        to { transform: translateX(0); }
    }

    #diferenciais-linha-1:hover,
    #diferenciais-linha-2:hover {
        animation-play-state: paused;
    }
</style>
@endif
