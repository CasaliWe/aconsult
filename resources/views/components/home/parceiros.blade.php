@props(['logos'])

@php
    $logosList = $logos instanceof \Illuminate\Support\Collection ? $logos : collect();
@endphp

@if($logosList->isNotEmpty())
{{-- Seção Parceiros - Logos passando automaticamente --}}
<section class="py-16 bg-neutral-50 overflow-hidden relative">
    {{-- Faixa decorativa superior --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 md:px-10 mb-10 animar-entrada">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="text-center md:text-left">
                <span class="text-marca text-sm font-bold uppercase tracking-widest">Parceiros</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black text-neutral-900 mt-1">
                    Quem <span class="text-marca">confia</span> na Aconsult
                </h2>
            </div>
            <p class="text-neutral-500 text-base font-normal max-w-md text-center md:text-right">
                Empresas que escolheram a Aconsult para impulsionar seus negócios.
            </p>
        </div>
    </div>

    {{-- Carrossel infinito de logos --}}
    <div class="relative max-w-7xl mx-auto px-6 md:px-10">
        {{-- Gradientes laterais para fade --}}
        <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-neutral-50 to-transparent z-10"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-neutral-50 to-transparent z-10"></div>

        <div class="flex animate-rolar-logos-mobile md:animate-rolar-logos hover:[animation-play-state:paused]" id="carrossel-logos">
            @for ($i = 0; $i < 2; $i++)
                <div class="flex items-center gap-16 shrink-0 px-8">
                    @foreach($logosList as $logo)
                        @php
                            $logoUrl = !empty($logo->link) ? $logo->link : null;
                        @endphp
                        @if($logoUrl)
                        <a href="{{ $logoUrl }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-36 h-20 bg-white rounded-xl shadow-sm border border-neutral-100 p-4 hover:shadow-md hover:border-marca/20 transition-all duration-300 group shrink-0">
                            <img src="{{ asset($logo->imagem) }}"
                                 alt="{{ $logo->nome }}"
                                 class="max-h-10 max-w-full object-contain opacity-40 group-hover:opacity-80 transition-opacity duration-300 grayscale group-hover:grayscale-0">
                        </a>
                        @else
                        <div class="flex items-center justify-center w-36 h-20 bg-white rounded-xl shadow-sm border border-neutral-100 p-4 hover:shadow-md hover:border-marca/20 transition-all duration-300 group shrink-0">
                            <img src="{{ asset($logo->imagem) }}"
                                 alt="{{ $logo->nome }}"
                                 class="max-h-10 max-w-full object-contain opacity-40 group-hover:opacity-80 transition-opacity duration-300 grayscale group-hover:grayscale-0">
                        </div>
                        @endif
                    @endforeach
                </div>
            @endfor
        </div>
    </div>

    {{-- Faixa decorativa inferior --}}
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/20 to-transparent"></div>
</section>
@endif