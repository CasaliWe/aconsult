{{-- Seção Valores - Página A Consult - Design dark com glassmorphism --}}
@php
    $listaValores = $cards ?? collect();
@endphp

@if ($listaValores->count())
<section class="py-20 md:py-28 bg-neutral-950 relative overflow-hidden">
    <div class="absolute top-0 left-1/4 rounded-full blur-3xl" style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(226, 24, 80, 0.08), transparent 70%);"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(155, 21, 58, 0.06), transparent 70%);"></div>
    <div class="absolute top-1/2 left-0 w-72 h-72 rounded-full blur-3xl -translate-x-1/2" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.05), transparent 70%);"></div>

    <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-marca/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-marca/30 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <div class="text-center mb-16 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">O que nos guia</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mt-3 mb-4">
                Nossos <span class="text-marca">valores</span>
            </h2>
            <p class="text-white/40 text-base font-normal max-w-lg mx-auto">
                Os principios que orientam todas as nossas decisoes e acoes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach ($listaValores as $indice => $valor)
                <div class="animar-entrada atraso-{{ ($indice % 6) + 1 }}">
                    <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                         style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                        <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                        <div class="absolute top-0 left-0 w-full h-0.5 bg-linear-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                        <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">{{ str_pad((string) ($indice + 1), 2, '0', STR_PAD_LEFT) }}</span>

                        <div class="relative z-10">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                                <i class="{{ $valor->icone_classe }} text-xl text-marca"></i>
                            </div>
                            <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">{{ $valor->titulo }}</h3>
                            <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                                {{ $valor->texto }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
