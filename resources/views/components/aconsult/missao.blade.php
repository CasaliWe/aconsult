{{-- Seção Missão - Página A Consult --}}
@php
    $listaMissao = $cards ?? collect();
@endphp

@if ($listaMissao->count())
<section class="relative py-28 md:py-36 overflow-hidden">
    <div class="absolute inset-0 bg-parallax"
         style="background-image: url('{{ asset('arquivos/imagens-empresa/aconsult-5.jpg') }}');"></div>

    <div class="absolute inset-0 bg-linear-to-br from-neutral-950/90 via-neutral-900/85 to-neutral-950/90"></div>

    <div class="absolute top-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.1), transparent 70%);"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-10">
        <div class="text-center animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Nossa missão</span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mt-4 mb-6">
                Impulsionar <span class="text-marca">negócios</span><br>
                por todo o Brasil
            </h2>

            <div class="w-16 h-1 bg-marca mx-auto mb-10 rounded-full"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                @foreach ($listaMissao as $indice => $item)
                    <div class="animar-entrada atraso-{{ ($indice % 3) + 1 }}">
                        <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                            <i class="{{ $item->icone_classe }} text-2xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white mb-2">{{ $item->titulo }}</h3>
                        <p class="text-white/50 text-base font-normal leading-relaxed max-w-[70%] mx-auto">
                            {{ $item->texto }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
