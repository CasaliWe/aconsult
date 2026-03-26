{{-- Conteúdo principal - Página Soluções (dinâmico por tipo) --}}
@props(['solucao', 'conteudoPrincipal' => ''])

@php
    $titulos = [
        'empresas' => 'Soluções para Empresas',
        'ecommerce' => 'Soluções para E-commerce',
        'comex' => 'Soluções para Comex',
    ];

    $icones = [
        'empresas' => 'fa-solid fa-building',
        'ecommerce' => 'fa-solid fa-cart-shopping',
        'comex' => 'fa-solid fa-ship',
    ];
@endphp

<section class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-marca-escura/3 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-10">
        {{-- Badge --}}
        <div class="flex items-center gap-3 mb-8 animar-entrada">
            <span class="w-14 h-14 flex items-center justify-center rounded-2xl bg-marca/10">
                <i class="{{ $solucao['icone'] }} text-2xl text-marca"></i>
            </span>
            <div>
                <span class="text-marca text-xs font-bold uppercase tracking-widest">{{ $solucao['subtitulo'] }}</span>
                <h2 class="text-2xl md:text-3xl font-black text-neutral-900">{{ $solucao['titulo'] }}</h2>
            </div>
        </div>

        @php
            $conteudoPrincipalLimpo = trim(strip_tags((string) $conteudoPrincipal));
        @endphp

        <div class="animar-entrada atraso-1">
            <div class="bg-neutral-50 rounded-3xl border border-neutral-100 p-10 md:p-16 text-center">
                @if ($conteudoPrincipalLimpo !== '')
                    <div class="text-left text-neutral-700" style="line-height: 1.7;">
                        {!! $conteudoPrincipal !!}
                    </div>
                @else
                    <div class="w-20 h-20 mx-auto flex items-center justify-center rounded-full bg-marca/10 mb-6">
                        <i class="fa-solid fa-code text-3xl text-marca"></i>
                    </div>
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold uppercase tracking-wider mb-5">
                        <i class="fa-solid fa-hammer text-[10px]"></i>
                        Em desenvolvimento
                    </span>
                    <h3 class="text-2xl md:text-3xl font-black text-neutral-900 mb-4">
                        {{ $titulos[$solucao['slug']] }}
                    </h3>
                    <p class="text-neutral-500 text-base font-normal max-w-lg mx-auto leading-relaxed mb-6">
                        Esta seção está sendo construída com todo cuidado para apresentar os detalhes completos das nossas soluções. Em breve, você encontrará aqui todas as informações sobre <strong class="text-neutral-700">{{ strtolower($titulos[$solucao['slug']]) }}</strong>.
                    </p>
                    <div class="flex items-center justify-center gap-2 text-marca text-sm font-bold">
                        <span class="w-2 h-2 rounded-full bg-marca animate-pulse"></span>
                        Conteúdo em breve
                    </div>
                @endif
            </div>
        </div>

        {{-- Navegação entre soluções --}}
        <div class="mt-14 bg-neutral-100 rounded-3xl p-8 md:p-10 animar-entrada atraso-2">
            <p class="text-center text-neutral-400 text-sm font-bold uppercase tracking-widest mb-6">Conheça também</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach (['empresas' => ['Soluções para Empresas', 'fa-solid fa-building', 'Tributação e contabilidade'], 'ecommerce' => ['Soluções para E-commerce', 'fa-solid fa-cart-shopping', 'Lojas virtuais e marketplaces'], 'comex' => ['Soluções para Comex', 'fa-solid fa-ship', 'Comércio exterior e RADAR']] as $slug => $info)
                    @if ($slug !== $solucao['slug'])
                        <a href="{{ route('solucoes', $slug) }}"
                           class="group flex items-center gap-4 bg-white rounded-2xl border border-neutral-200 p-5 transition-all duration-300 hover:border-marca/20 hover:shadow-lg hover:shadow-marca/5 hover:-translate-y-1">
                            <span class="w-11 h-11 flex items-center justify-center rounded-xl bg-marca/10 text-marca group-hover:bg-marca group-hover:text-white transition-all duration-300 shrink-0">
                                <i class="{{ $info[1] }} text-sm"></i>
                            </span>
                            <div>
                                <span class="text-sm font-bold text-neutral-900 group-hover:text-marca transition-colors">{{ $info[0] }}</span>
                                <span class="block text-xs text-neutral-400">{{ $info[2] }}</span>
                            </div>
                            <i class="fa-solid fa-arrow-right text-[10px] text-neutral-300 group-hover:text-marca ml-auto transition-all duration-300 group-hover:translate-x-1"></i>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
