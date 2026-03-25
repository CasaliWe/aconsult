@extends('layouts.app')

@section('titulo', ($noticia->titulo ?? 'Notícia') . ' | Aconsult Contabilidade')
@section('descricao', $noticia->mini_descricao ?? 'Conteúdo da Aconsult Contabilidade.')

@section('conteudo')
    @php
        $categoriaCor = [
            'Tributário' => '#e21850',
            'Fiscal' => '#9b153a',
            'Compliance' => '#171717',
            'E-commerce' => '#e21850',
            'Comércio Exterior' => '#171717',
        ];
    @endphp

    {{-- Banner --}}
    <x-news.banner
        :subtitulo="$noticia->categoria"
        :titulo="$noticia->titulo"
        :descricao="$noticia->mini_descricao"
        tituloBreadcrumb="Notícia"
    />

    {{-- Conteúdo do artigo --}}
    <section class="py-16 md:py-24 bg-white relative overflow-hidden">
        {{-- Decoração --}}
        <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

                {{-- Artigo principal --}}
                <article class="lg:col-span-8">
                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-4 mb-8 pb-8 border-b border-neutral-100 animar-entrada">
                        <span class="text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-full"
                              style="background-color: {{ $categoriaCor[$noticia->categoria] ?? '#e21850' }};">
                            {{ $noticia->categoria }}
                        </span>
                        <span class="flex items-center gap-1.5 text-sm text-neutral-400 font-normal">
                            <i class="fa-regular fa-calendar" style="color: #e21850;"></i>
                            {{ optional($noticia->data_publicacao)->format('d/m/Y') }}
                        </span>
                        <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                        <span class="text-sm text-neutral-400 font-normal">{{ $noticia->tempo_leitura }} min de leitura</span>
                        <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
                        <span class="text-sm text-neutral-400 font-normal">Por Equipe Aconsult</span>
                    </div>

                    {{-- Imagem destaque --}}
                    <div class="rounded-2xl overflow-hidden mb-10 animar-entrada atraso-1">
                        <img src="{{ asset($noticia->thumb) }}"
                             alt="{{ $noticia->titulo }}"
                             class="w-full h-64 md:h-96 object-cover">
                    </div>

                    {{-- Corpo do artigo (editor rico) --}}
                    <div class="conteudo-artigo animar-entrada atraso-2">
                        {!! $noticia->conteudo !!}
                    </div>

                    {{-- Compartilhar --}}
                    <div class="mt-12 pt-8 border-t border-neutral-100 animar-entrada">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <span class="text-sm font-bold text-neutral-900 uppercase tracking-wider">Compartilhar</span>
                            <div class="flex items-center gap-3">
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#1877F2'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no Facebook">
                                    <i class="fa-brands fa-facebook-f text-sm"></i>
                                </a>
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#0A66C2'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no LinkedIn">
                                    <i class="fa-brands fa-linkedin-in text-sm"></i>
                                </a>
                                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-500 hover:text-white transition-all duration-300"
                                   onmouseenter="this.style.backgroundColor='#25D366'" onmouseleave="this.style.backgroundColor=''"
                                   aria-label="Compartilhar no WhatsApp">
                                    <i class="fa-brands fa-whatsapp text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4">
                    <div class="lg:sticky lg:top-28">
                        {{-- Sobre a Aconsult --}}
                        <div class="bg-neutral-50 rounded-2xl p-6 mb-8 animar-entrada">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ asset('arquivos/identidade-visual/logo-x-black.png') }}"
                                     alt="Aconsult"
                                     class="w-10 h-10 object-contain">
                                <div>
                                    <span class="text-sm font-black text-neutral-900">Aconsult</span>
                                    <p class="text-xs text-neutral-400 font-normal">Contabilidade Inteligente</p>
                                </div>
                            </div>
                            <p class="text-sm text-neutral-500 font-normal leading-relaxed mb-4">
                                Especialistas em contabilidade, tributação e gestão empresarial desde 2018. Soluções inteligentes para o seu negócio.
                            </p>
                            <a href="{{ route('contato') }}"
                               class="inline-flex items-center gap-2 text-white px-5 py-2.5 rounded-full font-bold text-sm transition-all duration-300 hover:-translate-y-0.5 w-full justify-center"
                               style="background-color: #e21850;"
                               onmouseenter="this.style.backgroundColor='#9b153a'"
                               onmouseleave="this.style.backgroundColor='#e21850'">
                                Fale com um especialista
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>

                        {{-- Outras notícias --}}
                        <div class="animar-entrada atraso-2">
                            <h3 class="text-lg font-black text-neutral-900 mb-6">Outras notícias</h3>

                            <div class="flex flex-col gap-6">
                                @foreach($outrasNoticias as $outra)
                                    <a href="{{ route('news.mostrar', ['id' => $outra->id]) }}" class="group flex gap-4">
                                        <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0">
                                            <img src="{{ asset($outra->thumb) }}"
                                                 alt="{{ $outra->titulo }}"
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <span class="text-xs text-neutral-400 font-normal">{{ optional($outra->data_publicacao)->format('d M Y') }}</span>
                                            <h4 class="text-sm font-black text-neutral-900 group-hover:text-marca transition-colors duration-300 leading-snug mt-1 line-clamp-2">
                                                {{ $outra->titulo }}
                                            </h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{ route('news') }}"
                               class="inline-flex items-center gap-2 mt-6 text-sm font-bold transition-all duration-300 group"
                               style="color: #e21850;">
                                Ver todas as news
                                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- CTA WhatsApp --}}
    <x-home.cta-whatsapp />
@endsection
