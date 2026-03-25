{{-- Footer - componente global --}}
<footer class="bg-neutral-950 text-white relative overflow-hidden">
    {{-- Elemento decorativo de fundo --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-marca/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-marca-escura/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 pt-20 pb-8">
        {{-- Grid principal --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 pb-12 border-b border-white/10">

            {{-- Coluna 1: Logo e descrição --}}
            <div class="lg:col-span-1">
                <img src="{{ asset('arquivos/identidade-visual/logo-x-white.png') }}"
                     alt="Aconsult Contabilidade"
                     class="h-12 mb-6">
                <p class="text-white/60 text-base leading-relaxed mb-6">
                    Contabilidade e inteligência tributária para impulsionar negócios por todo o Brasil.
                </p>
                {{-- Redes sociais --}}
                <div class="flex items-center gap-3">
                    <a href="{{ $config->social_instagram ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 text-white/70 hover:bg-marca hover:text-white transition-all duration-300"
                       aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="{{ $config->social_facebook ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 text-white/70 hover:bg-marca hover:text-white transition-all duration-300"
                       aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="{{ $config->social_linkedin ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 text-white/70 hover:bg-marca hover:text-white transition-all duration-300"
                       aria-label="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="{{ $config->social_youtube ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 text-white/70 hover:bg-marca hover:text-white transition-all duration-300"
                       aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Coluna 2: Links do menu --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-wider text-marca mb-6">Navegação</h4>
                <ul class="flex flex-col gap-3">
                    <li>
                        <a href="{{ route('home') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('aconsult') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            Aconsult
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ebook') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            Ebook
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('trabalhe-conosco') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            Trabalhe Conosco
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contato') }}" class="text-white/60 hover:text-white hover:pl-1 transition-all duration-300 text-base">
                            Contato
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Coluna 3: Contato e localização --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-wider text-marca mb-6">Contato</h4>
                <ul class="flex flex-col gap-4">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-marca mt-1 text-base"></i>
                        <div>
                            <p class="text-white/60 text-base leading-relaxed">
                                {{ $config->endereco_rua ?? 'Rua São Cristovão, 879' }}<br>
                                {{ $config->endereco_bairro ?? 'Cordeiros' }} - {{ $config->endereco_cidade ?? 'Itajaí' }}/{{ $config->endereco_estado ?? 'SC' }}<br>
                                CEP {{ $config->endereco_cep ?? '88310-161' }}
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="{{ $config->mapa_link_url ?? '#' }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-white text-sm font-bold mt-1 rounded-full px-4 py-2 transition-all duration-300"
                           style="background-color: #e21850;"
                           onmouseenter="this.style.backgroundColor='#9b153a'"
                           onmouseleave="this.style.backgroundColor='#e21850'">
                            <i class="fa-solid fa-map text-xs"></i>
                            Ver no mapa
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-marca text-base"></i>
                        <a href="tel:+{{ $config->whatsapp_numero ?? '554721250281' }}" class="text-white/60 hover:text-white transition-colors text-base">
                            {{ $config->telefone ?? '(47) 2125-0281' }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-marca text-base"></i>
                        <a href="mailto:{{ $config->email ?? 'contato@aconsultcontabilidade.com.br' }}" class="text-white/60 hover:text-white transition-colors text-base break-all">
                            {{ $config->email ?? 'contato@aconsultcontabilidade.com.br' }}
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Coluna 4: App e Área do Cliente --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-wider text-marca mb-6">Aplicativo</h4>
                <p class="text-white/60 text-base mb-4 leading-relaxed">Baixe o app e gerencie seus documentos com facilidade.</p>
                <div class="flex flex-col gap-3">
                    <a href="{{ $config->link_app_store ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 group"
                       style="background-color: rgba(255,255,255,0.1);"
                       onmouseenter="this.style.backgroundColor='rgba(255,255,255,0.15)'"
                       onmouseleave="this.style.backgroundColor='rgba(255,255,255,0.1)'">
                        <i class="fa-brands fa-apple text-2xl text-white/80 group-hover:text-white transition-colors"></i>
                        <div>
                            <span class="text-xs text-white/50 uppercase tracking-wider block leading-none">Disponível na</span>
                            <span class="text-base font-bold text-white/90 group-hover:text-white transition-colors">App Store</span>
                        </div>
                    </a>
                    <a href="{{ $config->link_google_play ?? '#' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-300 group"
                       style="background-color: rgba(255,255,255,0.1);"
                       onmouseenter="this.style.backgroundColor='rgba(255,255,255,0.15)'"
                       onmouseleave="this.style.backgroundColor='rgba(255,255,255,0.1)'">
                        <i class="fa-brands fa-google-play text-xl text-white/80 group-hover:text-white transition-colors"></i>
                        <div>
                            <span class="text-xs text-white/50 uppercase tracking-wider block leading-none">Disponível na</span>
                            <span class="text-base font-bold text-white/90 group-hover:text-white transition-colors">Google Play</span>
                        </div>
                    </a>
                </div>

                {{-- Área do cliente --}}
                <a href="{{ $config->link_area_cliente ?? '#' }}"
                   target="_blank" rel="noopener noreferrer"
                   class="mt-5 w-full flex items-center justify-center gap-2 text-white py-3 rounded-xl text-base font-bold transition-all duration-300 hover:shadow-lg hover:shadow-marca/20"
                   style="background-color: #e21850;"
                   onmouseenter="this.style.backgroundColor='#9b153a'"
                   onmouseleave="this.style.backgroundColor='#e21850'">
                    <i class="fa-solid fa-arrow-right-to-bracket text-sm"></i>
                    Área do Cliente
                </a>
            </div>
        </div>

        {{-- Rodapé inferior --}}
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/40 text-sm text-center md:text-left">
                &copy; {{ date('Y') }} Aconsult Contabilidade. Todos os direitos reservados.
            </p>
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-marca animate-pulse"></span>
                <span class="text-white/40 text-sm">Itajaí, Santa Catarina</span>
            </div>
        </div>
    </div>
</footer>