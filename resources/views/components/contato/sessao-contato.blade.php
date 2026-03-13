{{-- ═══════════════════════════════════════════════════════════════════ --}}
{{-- Página de Contato - Sessão completa                              --}}
{{-- ═══════════════════════════════════════════════════════════════════ --}}

{{-- Banner --}}
<section class="relative w-full pt-32 pb-20 md:pt-36 md:pb-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('arquivos/imagens-empresa/toda-equipe.jpg') }}"
             alt="Equipe Aconsult Contabilidade"
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
            <span class="text-white/70">Contato</span>
        </nav>

        <div class="max-w-2xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-8 h-[2px] rounded-full" style="background-color: #e21850;"></span>
                <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Fale conosco</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-[1.08] mb-4">
                Vamos conversar sobre o <span style="color: #e21850;">seu negócio</span>
            </h1>
            <p class="text-base md:text-lg text-white/50 font-normal max-w-lg leading-relaxed">
                Estamos prontos para atender você. Entre em contato e descubra como podemos transformar a gestão da sua empresa.
            </p>
        </div>
    </div>
</section>

{{-- Formulário + Informações de contato --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            {{-- Formulário --}}
            <div class="lg:col-span-7 animar-entrada">
                <div class="mb-10">
                    <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Formulário de contato</span>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-black text-neutral-900 mt-3">
                        Envie sua <span style="color: #e21850;">mensagem</span>
                    </h2>
                    <p class="text-neutral-500 text-base font-normal mt-3 max-w-lg">
                        Preencha o formulário abaixo e nossa equipe retornará o mais breve possível.
                    </p>
                </div>

                <form id="formulario-contato" class="space-y-6" novalidate>
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nome --}}
                        <div>
                            <label for="nome" class="block text-sm font-bold text-neutral-900 mb-2">Nome completo <span style="color: #e21850;">*</span></label>
                            <input type="text" id="nome" name="nome" required
                                   placeholder="Seu nome completo"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   style="--tw-ring-color: #e21850;"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-bold text-neutral-900 mb-2">E-mail <span style="color: #e21850;">*</span></label>
                            <input type="email" id="email" name="email" required
                                   placeholder="seu@email.com"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- WhatsApp --}}
                        <div>
                            <label for="whatsapp" class="block text-sm font-bold text-neutral-900 mb-2">WhatsApp <span style="color: #e21850;">*</span></label>
                            <input type="tel" id="whatsapp" name="whatsapp" required
                                   placeholder="(00) 00000-0000"
                                   maxlength="15"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>

                        {{-- Empresa --}}
                        <div>
                            <label for="empresa" class="block text-sm font-bold text-neutral-900 mb-2">Nome da empresa</label>
                            <input type="text" id="empresa" name="empresa"
                                   placeholder="Sua empresa (opcional)"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>
                    </div>

                    {{-- Assunto --}}
                    <div>
                        <label for="assunto" class="block text-sm font-bold text-neutral-900 mb-2">Assunto <span style="color: #e21850;">*</span></label>
                        <select id="assunto" name="assunto" required
                                class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300 cursor-pointer appearance-none"
                                style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 20 20%22 fill=%22%23999%22><path fill-rule=%22evenodd%22 d=%22M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z%22 clip-rule=%22evenodd%22/></svg>'); background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.25rem; padding-right: 3rem;"
                                onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                onblur="this.style.borderColor=''; this.style.boxShadow=''">
                            <option value="" disabled selected>Selecione o assunto</option>
                            <option value="contabilidade">Contabilidade Empresarial</option>
                            <option value="tributario">Planejamento Tributário</option>
                            <option value="fiscal">BPO Fiscal</option>
                            <option value="pessoal">Departamento Pessoal</option>
                            <option value="ecommerce">Contabilidade para E-commerce</option>
                            <option value="comex">Comércio Exterior / RADAR</option>
                            <option value="abertura">Abertura de Empresa</option>
                            <option value="outro">Outro assunto</option>
                        </select>
                    </div>

                    {{-- Mensagem --}}
                    <div>
                        <label for="mensagem" class="block text-sm font-bold text-neutral-900 mb-2">Mensagem <span style="color: #e21850;">*</span></label>
                        <textarea id="mensagem" name="mensagem" rows="5" required
                                  placeholder="Como podemos ajudar sua empresa?"
                                  class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300 resize-none"
                                  onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                  onblur="this.style.borderColor=''; this.style.boxShadow=''"></textarea>
                    </div>

                    {{-- Botão enviar --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <button type="submit" id="btn-enviar"
                                class="inline-flex items-center justify-center gap-2 text-white px-8 py-4 rounded-full font-bold text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg cursor-pointer min-w-[200px]"
                                style="background-color: #e21850; --hover-bg: #9b153a;"
                                onmouseenter="if(!this.disabled) this.style.backgroundColor='#9b153a'"
                                onmouseleave="if(!this.disabled) this.style.backgroundColor='#e21850'">
                            <span id="btn-enviar-texto">Enviar mensagem</span>
                            <i class="fa-solid fa-paper-plane text-sm" id="btn-enviar-icone"></i>
                        </button>
                        <p class="text-xs text-neutral-400 font-normal">
                            <i class="fa-solid fa-lock text-[10px] mr-1"></i>
                            Seus dados estão protegidos e não serão compartilhados.
                        </p>
                    </div>

                    {{-- Feedback --}}
                    <div id="feedback-contato" class="hidden mt-4 p-4 rounded-xl text-sm font-bold"></div>
                </form>
            </div>

            {{-- Sidebar - Informações de contato --}}
            <aside class="lg:col-span-5">
                <div class="lg:sticky lg:top-28 space-y-6">

                    {{-- Card contato direto --}}
                    <div class="bg-neutral-950 rounded-2xl p-8 text-white animar-entrada atraso-1">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-8 h-[2px] rounded-full" style="background-color: #e21850;"></span>
                            <span class="text-[11px] uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Contato direto</span>
                        </div>
                        <h3 class="text-xl font-black mb-6">Prefere falar diretamente?</h3>

                        <div class="space-y-5">
                            {{-- Telefone --}}
                            <a href="tel:+554721250281" class="flex items-center gap-4 group">
                                <span class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                    <i class="fa-solid fa-phone text-lg" style="color: #e21850;"></i>
                                </span>
                                <div>
                                    <span class="text-xs text-white/40 font-normal block">Telefone</span>
                                    <span class="text-base font-bold text-white/90 group-hover:text-white transition-colors">(47) 2125-0281</span>
                                </div>
                            </a>

                            {{-- WhatsApp --}}
                            <a href="https://wa.me/554721250281" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 group">
                                <span class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                    <i class="fa-brands fa-whatsapp text-lg" style="color: #25D366;"></i>
                                </span>
                                <div>
                                    <span class="text-xs text-white/40 font-normal block">WhatsApp</span>
                                    <span class="text-base font-bold text-white/90 group-hover:text-white transition-colors">(47) 2125-0281</span>
                                </div>
                            </a>

                            {{-- Email --}}
                            <a href="mailto:contato@aconsultcontabilidade.com.br" class="flex items-center gap-4 group">
                                <span class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/10 group-hover:bg-white/20 transition-all duration-300">
                                    <i class="fa-solid fa-envelope text-lg" style="color: #e21850;"></i>
                                </span>
                                <div>
                                    <span class="text-xs text-white/40 font-normal block">E-mail</span>
                                    <span class="text-base font-bold text-white/90 group-hover:text-white transition-colors break-all">contato@aconsultcontabilidade.com.br</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- Card horário --}}
                    <div class="bg-neutral-50 rounded-2xl p-8 animar-entrada atraso-2">
                        <div class="flex items-center gap-4 mb-5">
                            <span class="w-12 h-12 flex items-center justify-center rounded-xl" style="background-color: rgba(226,24,80,0.1);">
                                <i class="fa-regular fa-clock text-lg" style="color: #e21850;"></i>
                            </span>
                            <div>
                                <h4 class="text-base font-black text-neutral-900">Horário de atendimento</h4>
                                <p class="text-sm text-neutral-400 font-normal">Segunda a Sexta</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between bg-white rounded-xl px-5 py-3.5 border border-neutral-100">
                            <span class="text-sm font-normal text-neutral-500">Seg — Sex</span>
                            <span class="text-sm font-black text-neutral-900">08:00 — 18:00</span>
                        </div>
                    </div>

                    {{-- Redes sociais --}}
                    <div class="bg-neutral-50 rounded-2xl p-8 animar-entrada atraso-3">
                        <h4 class="text-base font-black text-neutral-900 mb-5">Acompanhe nas redes</h4>
                        <div class="flex items-center gap-3">
                            <a href="https://www.instagram.com/aconsultcontabilidade/"
                               target="_blank" rel="noopener noreferrer"
                               class="w-12 h-12 flex items-center justify-center rounded-xl bg-white border border-neutral-100 text-neutral-500 hover:text-white transition-all duration-300 hover:-translate-y-0.5"
                               onmouseenter="this.style.backgroundColor='#E4405F'; this.style.borderColor='#E4405F'"
                               onmouseleave="this.style.backgroundColor=''; this.style.borderColor=''"
                               aria-label="Instagram">
                                <i class="fa-brands fa-instagram text-lg"></i>
                            </a>
                            <a href="https://www.facebook.com/aconsultcontabilidade"
                               target="_blank" rel="noopener noreferrer"
                               class="w-12 h-12 flex items-center justify-center rounded-xl bg-white border border-neutral-100 text-neutral-500 hover:text-white transition-all duration-300 hover:-translate-y-0.5"
                               onmouseenter="this.style.backgroundColor='#1877F2'; this.style.borderColor='#1877F2'"
                               onmouseleave="this.style.backgroundColor=''; this.style.borderColor=''"
                               aria-label="Facebook">
                                <i class="fa-brands fa-facebook-f text-lg"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/aconsult-contabilidade/"
                               target="_blank" rel="noopener noreferrer"
                               class="w-12 h-12 flex items-center justify-center rounded-xl bg-white border border-neutral-100 text-neutral-500 hover:text-white transition-all duration-300 hover:-translate-y-0.5"
                               onmouseenter="this.style.backgroundColor='#0A66C2'; this.style.borderColor='#0A66C2'"
                               onmouseleave="this.style.backgroundColor=''; this.style.borderColor=''"
                               aria-label="LinkedIn">
                                <i class="fa-brands fa-linkedin-in text-lg"></i>
                            </a>
                            <a href="#"
                               target="_blank" rel="noopener noreferrer"
                               class="w-12 h-12 flex items-center justify-center rounded-xl bg-white border border-neutral-100 text-neutral-500 hover:text-white transition-all duration-300 hover:-translate-y-0.5"
                               onmouseenter="this.style.backgroundColor='#FF0000'; this.style.borderColor='#FF0000'"
                               onmouseleave="this.style.backgroundColor=''; this.style.borderColor=''"
                               aria-label="YouTube">
                                <i class="fa-brands fa-youtube text-lg"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</section>

{{-- Localização + Mapa --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-14 animar-entrada">
            <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Onde estamos</span>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-black text-neutral-900 mt-3">
                Venha nos <span style="color: #e21850;">visitar</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal mt-3 max-w-lg mx-auto">
                Estamos localizados em Itajaí, Santa Catarina. Atendemos empresas de todo o Brasil.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            {{-- Mapa --}}
            <div class="lg:col-span-8 animar-entrada atraso-1">
                <div class="rounded-2xl overflow-hidden shadow-lg shadow-neutral-900/5 h-[400px] md:h-[480px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.788!2d-48.6686!3d-26.9089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d8cb2a5f8e7e3d%3A0x1!2sRua%20S%C3%A3o%20Crist%C3%B3v%C3%A3o%2C%20879%20-%20Cordeiros%2C%20Itaja%C3%AD%20-%20SC%2C%2088310-161!5e0!3m2!1spt-BR!2sbr!4v1"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Localização Aconsult Contabilidade">
                    </iframe>
                </div>
            </div>

            {{-- Informações de endereço --}}
            <div class="lg:col-span-4 animar-entrada atraso-2">
                <div class="bg-white rounded-2xl p-8 h-full flex flex-col justify-center shadow-lg shadow-neutral-900/5">
                    {{-- Endereço --}}
                    <div class="flex items-start gap-4 mb-8">
                        <span class="w-12 h-12 flex items-center justify-center rounded-xl shrink-0" style="background-color: rgba(226,24,80,0.1);">
                            <i class="fa-solid fa-location-dot text-lg" style="color: #e21850;"></i>
                        </span>
                        <div>
                            <h4 class="text-sm font-black text-neutral-900 uppercase tracking-wider mb-2">Endereço</h4>
                            <p class="text-base text-neutral-500 font-normal leading-relaxed">
                                Rua São Cristovão, 879<br>
                                Bairro Cordeiros<br>
                                Itajaí — SC<br>
                                CEP 88310-161
                            </p>
                        </div>
                    </div>

                    {{-- Cidade --}}
                    <div class="flex items-start gap-4 mb-8">
                        <span class="w-12 h-12 flex items-center justify-center rounded-xl shrink-0" style="background-color: rgba(226,24,80,0.1);">
                            <i class="fa-solid fa-city text-lg" style="color: #e21850;"></i>
                        </span>
                        <div>
                            <h4 class="text-sm font-black text-neutral-900 uppercase tracking-wider mb-2">Cidade</h4>
                            <p class="text-base text-neutral-500 font-normal leading-relaxed">
                                Itajaí, Santa Catarina<br>
                                Região do Vale do Itajaí
                            </p>
                        </div>
                    </div>

                    {{-- Atendimento --}}
                    <div class="flex items-start gap-4 mb-8">
                        <span class="w-12 h-12 flex items-center justify-center rounded-xl shrink-0" style="background-color: rgba(226,24,80,0.1);">
                            <i class="fa-solid fa-globe text-lg" style="color: #e21850;"></i>
                        </span>
                        <div>
                            <h4 class="text-sm font-black text-neutral-900 uppercase tracking-wider mb-2">Área de atendimento</h4>
                            <p class="text-base text-neutral-500 font-normal leading-relaxed">
                                Todo o Brasil
                            </p>
                        </div>
                    </div>

                    {{-- Botão como chegar --}}
                    <a href="https://www.google.com/maps/search/Rua+S%C3%A3o+Cristov%C3%A3o+879+Cordeiros+Itaja%C3%AD+SC"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 text-white px-6 py-3.5 rounded-full font-bold text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg w-full"
                       style="background-color: #e21850;"
                       onmouseenter="this.style.backgroundColor='#9b153a'"
                       onmouseleave="this.style.backgroundColor='#e21850'">
                        <i class="fa-solid fa-diamond-turn-right text-sm"></i>
                        Como chegar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA WhatsApp --}}
<x-home.cta-whatsapp />
