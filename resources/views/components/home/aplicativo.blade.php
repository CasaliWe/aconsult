{{-- Seção Baixe o Aplicativo --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    {{-- Decoração de fundo --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-marca/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-marca-escura/5 rounded-full blur-3xl translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- Conteúdo texto --}}
            <div class="animar-entrada">
                <span class="text-marca text-sm font-bold uppercase tracking-widest">Aplicativo</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-5 leading-tight">
                    Baixe nosso<br>
                    <span class="text-marca">Aplicativo</span>
                </h2>
                <p class="text-neutral-500 text-base font-normal leading-relaxed mb-4 max-w-lg">
                    Gerenciamento de entregas e comunicação entre os clientes e a Aconsult Contabilidade.
                </p>
                <p class="text-neutral-500 text-base font-normal leading-relaxed mb-8 max-w-lg">
                    Receba e gerencie solicitações do nosso escritório, documentos eletrônicos e visualização de comunicados.
                </p>

                {{-- Features --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0">
                            <i class="fa-solid fa-file-lines text-sm"></i>
                        </div>
                        <span class="text-base font-normal text-neutral-700">Documentos eletrônicos</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0">
                            <i class="fa-solid fa-bell text-sm"></i>
                        </div>
                        <span class="text-base font-normal text-neutral-700">Notificações em tempo real</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0">
                            <i class="fa-solid fa-shield-halved text-sm"></i>
                        </div>
                        <span class="text-base font-normal text-neutral-700">Segurança garantida</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0">
                            <i class="fa-solid fa-comments text-sm"></i>
                        </div>
                        <span class="text-base font-normal text-neutral-700">Comunicação direta</span>
                    </div>
                </div>

                {{-- Botões de download --}}
                <div class="flex flex-wrap gap-4">
                    <a href="https://apps.apple.com/br/app/onvio-documentos/id1005121694"
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-3 text-white rounded-2xl px-6 py-3.5 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg group"
                       style="background-color: #171717;"
                       onmouseenter="this.style.backgroundColor='#262626'"
                       onmouseleave="this.style.backgroundColor='#171717'">
                        <i class="fa-brands fa-apple text-2xl group-hover:scale-110 transition-transform"></i>
                        <div>
                            <span class="text-xs text-white/60 uppercase tracking-wider block leading-none">Disponível na</span>
                            <span class="text-base font-bold">App Store</span>
                        </div>
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.thomsonreuters.cs.onvio.drive"
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-3 text-white rounded-2xl px-6 py-3.5 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg group"
                       style="background-color: #171717;"
                       onmouseenter="this.style.backgroundColor='#262626'"
                       onmouseleave="this.style.backgroundColor='#171717'">
                        <i class="fa-brands fa-google-play text-xl group-hover:scale-110 transition-transform"></i>
                        <div>
                            <span class="text-xs text-white/60 uppercase tracking-wider block leading-none">Disponível na</span>
                            <span class="text-base font-bold">Google Play</span>
                        </div>
                    </a>
                </div>

                {{-- Avaliação --}}
                <div class="flex items-center gap-3 mt-6">
                    <div class="flex items-center gap-0.5 text-yellow-400">
                        <i class="fa-solid fa-star text-base"></i>
                        <i class="fa-solid fa-star text-base"></i>
                        <i class="fa-solid fa-star text-base"></i>
                        <i class="fa-solid fa-star text-base"></i>
                        <i class="fa-solid fa-star text-base"></i>
                    </div>
                    <span class="text-sm text-neutral-400 font-normal">Classificado como 5/5</span>
                </div>
            </div>

            {{-- Imagem do celular --}}
            <div class="relative flex justify-center animar-entrada atraso-3">
                {{-- Círculo decorativo atrás do celular --}}
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 md:w-96 md:h-96 bg-gradient-to-br from-marca/20 to-marca-escura/20 rounded-full blur-2xl"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 md:w-80 md:h-80 border-2 border-dashed border-marca/20 rounded-full animate-[spin_30s_linear_infinite]"></div>

                {{-- Sobreposição: card flutuante --}}
                <div class="absolute -top-4 -right-4 md:top-4 md:right-4 bg-white rounded-2xl shadow-xl p-4 z-20 animate-fade-in-right hidden md:block" style="animation-delay: 0.8s">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-green-100 text-green-600">
                            <i class="fa-solid fa-check text-sm"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-neutral-900 block">Documento recebido</span>
                            <span class="text-[10px] text-neutral-400">Agora mesmo</span>
                        </div>
                    </div>
                </div>

                {{-- Card flutuante inferior --}}
                <div class="absolute -bottom-2 -left-4 md:bottom-8 md:left-0 bg-white rounded-2xl shadow-xl p-4 z-20 animate-fade-in-left hidden md:block" style="animation-delay: 1.2s">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca">
                            <i class="fa-solid fa-mobile-screen text-sm"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-neutral-900 block">Acesso rápido</span>
                            <span class="text-[10px] text-neutral-400">Na palma da mão</span>
                        </div>
                    </div>
                </div>

                {{-- Celular --}}
                <div class="relative z-10">
                    <img src="{{ asset('arquivos/imagens-empresa/app.png') }}"
                         alt="Aplicativo Aconsult"
                         class="h-[450px] md:h-[550px] lg:h-[600px] w-auto object-contain drop-shadow-2xl">
                </div>
            </div>
        </div>
    </div>
</section>