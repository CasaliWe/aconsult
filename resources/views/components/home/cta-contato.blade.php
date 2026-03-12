{{-- CTA com Banner Parallax --}}
<section class="relative py-32 md:py-40 overflow-hidden">
    {{-- Background parallax --}}
    <div class="absolute inset-0 bg-parallax"
         style="background-image: url('{{ asset('arquivos/imagens-empresa/imagem-da-dona-1.jpg') }}');"></div>

    {{-- Overlay gradiente com cor da marca --}}
    <div class="absolute inset-0 bg-gradient-to-r from-marca-escura/90 via-marca/85 to-marca-escura/90"></div>

    {{-- Padrão decorativo --}}
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>

    {{-- Conteúdo --}}
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <div class="animar-entrada">
            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm rounded-full px-5 py-2 mb-8">
                <i class="fa-solid fa-comments text-white text-sm"></i>
                <span class="text-white/90 text-xs font-bold uppercase tracking-wider">Fale com a gente</span>
            </div>

            <h2 class="text-3xl md:text-4xl lg:text-5xl 2xl:text-6xl font-black text-white leading-tight mb-6">
                Qual é o seu<br>
                <span class="text-white/90">desafio contábil?</span>
            </h2>

            <p class="text-lg text-white/70 font-normal max-w-2xl mx-auto mb-10 leading-relaxed">
                Escreva para nós e criaremos uma proposta personalizada para o seu negócio. Nossa equipe está pronta para impulsionar sua empresa.
            </p>

            <a href="{{ route('contato') }}"
               class="inline-flex items-center gap-3 bg-white text-marca hover:text-marca-escura px-10 py-4 rounded-full font-bold text-base transition-all duration-300 hover:shadow-2xl hover:shadow-black/20 hover:-translate-y-1 group">
                Entrar em contato
                <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>