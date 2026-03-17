{{-- Seção Missão - Página A Consult --}}
<section class="relative py-28 md:py-36 overflow-hidden">
    {{-- Background parallax --}}
    <div class="absolute inset-0 bg-parallax"
         style="background-image: url('{{ asset('arquivos/imagens-empresa/aconsult-5.jpg') }}');"></div>

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-br from-neutral-950/90 via-neutral-900/85 to-neutral-950/90"></div>

    {{-- Decoração --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.1), transparent 70%);"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-10">
        <div class="text-center animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Nossa missão</span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mt-4 mb-6">
                Impulsionar <span class="text-marca">negócios</span><br>
                por todo o Brasil
            </h2>

            <div class="w-16 h-1 bg-marca mx-auto mb-10 rounded-full"></div>

            {{-- Pilares da missão --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="animar-entrada atraso-1">
                    <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                        <i class="fa-solid fa-handshake-angle text-2xl text-marca"></i>
                    </div>
                    <h3 class="text-xl font-black text-white mb-2">Confiança</h3>
                    <p class="text-white/50 text-base font-normal leading-relaxed max-w-[65%] mx-auto">
                        Construímos relações sólidas e transparentes com cada cliente.
                    </p>
                </div>
                <div class="animar-entrada atraso-2">
                    <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                        <i class="fa-solid fa-face-smile text-2xl text-marca"></i>
                    </div>
                    <h3 class="text-xl font-black text-white mb-2">Satisfação</h3>
                    <p class="text-white/50 text-base font-normal leading-relaxed max-w-[65%] mx-auto">
                        Primamos por resultados que superam expectativas.
                    </p>
                </div>
                <div class="animar-entrada atraso-3">
                    <div class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                        <i class="fa-solid fa-bolt text-2xl text-marca"></i>
                    </div>
                    <h3 class="text-xl font-black text-white mb-2">Eficiência</h3>
                    <p class="text-white/50 text-base font-normal leading-relaxed max-w-[65%] mx-auto">
                        Entregas ágeis com máxima qualidade e precisão.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
