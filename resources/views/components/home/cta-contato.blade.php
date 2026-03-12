{{-- CTA Contato - Design moderno e elegante --}}
<section class="relative py-28 md:py-36 overflow-hidden">
    {{-- Background parallax --}}
    <div class="absolute inset-0 bg-parallax"
         style="background-image: url('{{ asset('arquivos/imagens-empresa/imagem-da-dona-1.jpg') }}');"></div>

    {{-- Overlay escuro sofisticado --}}
    <div class="absolute inset-0 bg-gradient-to-br from-neutral-950/90 via-neutral-900/85 to-neutral-950/90"></div>

    {{-- Elemento decorativo --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>

    {{-- Conteúdo --}}
    <div class="relative z-10 max-w-4xl mx-auto px-6 md:px-10 text-center">
        <div class="animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Fale com a gente</span>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mt-4 mb-6">
                Qual é o seu<br>
                <span class="text-marca">desafio contábil?</span>
            </h2>

            <div class="w-16 h-1 bg-marca mx-auto mb-8 rounded-full"></div>

            <p class="text-lg md:text-xl text-white/60 font-normal max-w-2xl mx-auto mb-10 leading-relaxed">
                Escreva para nós e criaremos uma proposta personalizada para o seu negócio. Nossa equipe está pronta para impulsionar sua empresa.
            </p>

            <a href="{{ route('contato') }}"
               class="inline-flex items-center gap-3 text-white px-10 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:shadow-marca/30 hover:-translate-y-1 group"
               style="background-color: #e21850;"
               onmouseenter="this.style.backgroundColor='#9b153a'"
               onmouseleave="this.style.backgroundColor='#e21850'">
                Entrar em contato
                <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>