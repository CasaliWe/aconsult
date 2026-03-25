@props(['noticias' => collect()])

@php
    $noticiasList = $noticias instanceof \Illuminate\Support\Collection ? $noticias : collect($noticias);

    $categoriasCor = [
        'Tributário' => 'background-color: #e21850;',
        'Fiscal' => 'background-color: #9b153a;',
        'Compliance' => 'background-color: #171717;',
        'E-commerce' => 'background-color: #e21850;',
        'Comércio Exterior' => 'background-color: #171717;',
    ];
@endphp

{{-- Preview Blog - 3 notícias recentes --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="flex flex-col md:flex-row items-start md:items-end justify-between gap-4 mb-14 animar-entrada">
            <div>
                <span class="text-marca text-sm font-bold uppercase tracking-widest">News</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3">
                    Universo <span class="text-marca">Aconsult</span>
                </h2>
                <p class="text-neutral-500 text-base font-normal mt-3 max-w-lg">
                    Descubra informações essenciais sobre contabilidade, gestão e negócios.
                </p>
            </div>
            <a href="{{ route('news') }}"
               class="inline-flex items-center gap-2 hover:text-white px-6 py-3 rounded-full text-base font-bold transition-all duration-300 shrink-0 group"
               style="background-color: rgba(226, 24, 80, 0.1); color: #e21850;"
               onmouseenter="this.style.backgroundColor='#e21850'; this.style.color='white'"
               onmouseleave="this.style.backgroundColor='rgba(226, 24, 80, 0.1)'; this.style.color='#e21850'">
                Ver todas as news
                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        {{-- Grid de cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($noticiasList as $noticia)
                <article class="group animar-entrada atraso-{{ $loop->iteration <= 3 ? $loop->iteration : 3 }}">
                    <a href="{{ route('news.mostrar', ['id' => $noticia->id]) }}" class="block">
                        <div class="relative overflow-hidden rounded-2xl mb-5">
                            <img src="{{ asset($noticia->thumb) }}"
                                 alt="{{ $noticia->titulo }}"
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                                      style="{{ $categoriasCor[$noticia->categoria] ?? 'background-color: #e21850;' }}">
                                    {{ $noticia->categoria }}
                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 text-sm text-neutral-400 font-normal">
                            <span class="flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar text-marca"></i>
                                {{ optional($noticia->data_publicacao)->format('d M Y') }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                            <span>{{ $noticia->tempo_leitura }} min de leitura</span>
                        </div>
                        <h3 class="text-xl font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 mb-2 leading-snug">
                            {{ $noticia->titulo }}
                        </h3>
                        <p class="text-neutral-500 text-base font-normal leading-relaxed line-clamp-2 mb-4">
                            {{ $noticia->mini_descricao }}
                        </p>
                        <span class="inline-flex items-center gap-2 text-marca text-sm font-bold group-hover:gap-3 transition-all duration-300">
                            Ler notícia
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </span>
                    </a>
                </article>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center">
                    <p class="text-neutral-500 text-base">Nenhuma notícia publicada no momento.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
