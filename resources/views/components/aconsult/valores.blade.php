{{-- Seção Valores - Página A Consult - Design dark com glassmorphism --}}
<section class="py-20 md:py-28 bg-neutral-950 relative overflow-hidden">
    {{-- Decoração de fundo --}}
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.08), transparent 70%);"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(155, 21, 58, 0.06), transparent 70%);"></div>
    <div class="absolute top-1/2 left-0 w-72 h-72 rounded-full blur-3xl -translate-x-1/2" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.05), transparent 70%);"></div>

    {{-- Linhas decorativas --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/30 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-16 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">O que nos guia</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mt-3 mb-4">
                Nossos <span class="text-marca">valores</span>
            </h2>
            <p class="text-white/40 text-base font-normal max-w-lg mx-auto">
                Os princípios que orientam todas as nossas decisões e ações.
            </p>
        </div>

        {{-- Grid de valores - Cards glassmorphism com número decorativo --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

            {{-- Empatia --}}
            <div class="animar-entrada atraso-1">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    {{-- Glow no hover --}}
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    {{-- Borda gradiente no hover --}}
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    {{-- Número decorativo --}}
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">01</span>
                    {{-- Conteúdo --}}
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-heart text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Empatia</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Respeitamos e valorizamos cada pessoa envolvida na nossa jornada: clientes, parceiros, colaboradores e fornecedores.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Excelência --}}
            <div class="animar-entrada atraso-2">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">02</span>
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-gem text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Excelência</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Fazemos sempre o nosso melhor, buscando eficiência e qualidade em cada entrega.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Proatividade --}}
            <div class="animar-entrada atraso-3">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">03</span>
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-rocket text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Proatividade</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Não esperamos problemas, antecipamos soluções.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Responsabilidade --}}
            <div class="animar-entrada atraso-4">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">04</span>
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-shield-halved text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Responsabilidade</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Compromisso é compromisso. Fazemos o que prometemos, sem exceções.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Inovação --}}
            <div class="animar-entrada atraso-5">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">05</span>
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-lightbulb text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Inovação</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Evoluímos constantemente para oferecer serviços contábeis mais estratégicos e inteligentes.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Prosperidade --}}
            <div class="animar-entrada atraso-6">
                <div class="valor-card group relative rounded-2xl p-8 h-full overflow-hidden transition-all duration-500 hover:-translate-y-2 cursor-default"
                     style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(12px);">
                    <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="box-shadow: inset 0 1px 0 0 rgba(226,24,80,0.3), 0 0 40px -10px rgba(226,24,80,0.15);"></div>
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-marca to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>
                    <span class="absolute -top-2 -right-1 text-[100px] font-black leading-none select-none transition-all duration-500 group-hover:scale-110" style="color: rgba(226,24,80,0.05);">06</span>
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 transition-all duration-500 group-hover:scale-110" style="background-color: rgba(226,24,80,0.12);">
                            <i class="fa-solid fa-chart-line text-xl text-marca"></i>
                        </div>
                        <h3 class="text-xl font-black text-white group-hover:text-marca transition-colors duration-300 mb-3">Prosperidade</h3>
                        <p class="text-white/40 text-sm font-normal leading-relaxed group-hover:text-white/60 transition-colors duration-300">
                            Crescemos juntos, impulsionando negócios e pessoas para o sucesso.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
