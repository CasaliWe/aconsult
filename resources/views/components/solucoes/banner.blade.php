{{-- Banner - Página Soluções (dinâmico por tipo) --}}
@props(['solucao'])

@php
    $slugsPagina = [
        'empresas' => 'solucoes-empresas',
        'ecommerce' => 'solucoes-ecommerce',
        'comex' => 'solucoes-comex',
    ];
    $bp = $bannersPaginas[$slugsPagina[$solucao['slug']] ?? ''] ?? null;

    $imagensFallback = [
        'empresas' => 'arquivos/imagens-empresa/aconsult-4.jpg',
        'ecommerce' => 'arquivos/imagens-empresa/aconsult-3.jpg',
        'comex' => 'arquivos/imagens-empresa/aconsult-5.jpg',
    ];
    $imagemBanner = $bp->imagem ?? ($imagensFallback[$solucao['slug']] ?? 'arquivos/imagens-empresa/toda-equipe.jpg');

    $descricoesFallback = [
        'empresas' => 'Tributação fiscal, contabilidade inteligente e gestão estratégica para o seu negócio crescer com segurança.',
        'ecommerce' => 'Contabilidade especializada para lojas virtuais, marketplaces e negócios digitais.',
        'comex' => 'Assessoria estratégica em RADAR, regimes especiais e operações internacionais.',
    ];
    $descricao = $bp->descricao ?? ($descricoesFallback[$solucao['slug']] ?? '');
@endphp

<section class="relative w-full pt-32 pb-20 md:pt-36 md:pb-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset($imagemBanner) }}"
             alt="{{ $solucao['titulo'] }} - Aconsult Contabilidade"
             class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/92 via-black/75 to-black/50"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

    {{-- Decoração --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.08), transparent 70%);"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/20 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <nav class="flex items-center gap-2 text-sm text-white/40 font-normal mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white/70 transition-colors">Início</a>
            <i class="fa-solid fa-chevron-right text-[8px]"></i>
            <span class="text-white/50">Soluções</span>
            <i class="fa-solid fa-chevron-right text-[8px]"></i>
            <span class="text-white/70">{{ $solucao['breadcrumb'] }}</span>
        </nav>

        <div class="max-w-2xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-8 h-[2px] rounded-full" style="background-color: #e21850;"></span>
                <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">{{ $bp->super_titulo ?? $solucao['subtitulo'] }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-[1.08] mb-4">
                {!! $bp->titulo ?? e($solucao['titulo']) !!}
            </h1>
            <p class="text-base md:text-lg text-white/50 font-normal max-w-lg leading-relaxed">
                {{ $descricao }}
            </p>
        </div>
    </div>
</section>
