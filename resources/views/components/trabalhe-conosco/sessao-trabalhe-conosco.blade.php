{{-- ═══════════════════════════════════════════════════════════════════ --}}
{{-- Página Trabalhe Conosco - Sessão completa                         --}}
{{-- ═══════════════════════════════════════════════════════════════════ --}}

@php
    $bp = $bannersPaginas['trabalhe-conosco'] ?? null;
@endphp

{{-- Banner --}}
<section class="relative w-full pt-32 pb-20 md:pt-36 md:pb-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset($bp->imagem ?? 'arquivos/imagens-empresa/toda-equipe.jpg') }}"
             alt="Equipe Aconsult Contabilidade"
             class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-linear-to-r from-black/92 via-black/75 to-black/50"></div>
    <div class="absolute inset-0 bg-linear-to-t from-black/40 via-transparent to-transparent"></div>

    {{-- Decoração --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.08), transparent 70%);"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-linear-to-r from-transparent via-marca/20 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <nav class="flex items-center gap-2 text-sm text-white/40 font-normal mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white/70 transition-colors">Início</a>
            <i class="fa-solid fa-chevron-right text-[8px]"></i>
            <span class="text-white/70">Trabalhe Conosco</span>
        </nav>

        <div class="max-w-2xl">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-8 h-0.5 rounded-full" style="background-color: #e21850;"></span>
                <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">{{ $bp->super_titulo ?? 'Carreiras' }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-[1.08] mb-4">
                {!! $bp->titulo ?? 'Faça parte do time da <span style="color: #e21850;">Aconsult</span>' !!}
            </h1>
            <p class="text-base md:text-lg text-white/50 font-normal max-w-lg leading-relaxed">
                {{ $bp->descricao ?? 'Envie seu currículo e candidate-se para futuras oportunidades em uma equipe focada em excelência contábil e atendimento próximo.' }}
            </p>
        </div>
    </div>
</section>

{{-- Formulário + Informações --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            {{-- Formulário --}}
            <div class="lg:col-span-7 animar-entrada">
                <div class="mb-10">
                    <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Formulário de candidatura</span>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-black text-neutral-900 mt-3">
                        Envie seu <span style="color: #e21850;">currículo</span>
                    </h2>
                    <p class="text-neutral-500 text-base font-normal mt-3 max-w-lg">
                        Preencha as informações abaixo para participar do nosso banco de talentos.
                    </p>
                </div>

                @if (session('sucesso_trabalhe'))
                    <div style="margin-bottom: 16px; padding: 12px 14px; border-radius: 10px; background: rgba(22, 163, 74, 0.12); color: #166534; font-size: 13px; font-weight: 700;">
                        <i class="fa-solid fa-circle-check mr-2"></i>{{ session('sucesso_trabalhe') }}
                    </div>
                @endif
                @if (session('erro_trabalhe') || $errors->any())
                    <div style="margin-bottom: 16px; padding: 12px 14px; border-radius: 10px; background: rgba(220, 38, 38, 0.12); color: #dc2626; font-size: 13px; font-weight: 700;">
                        <i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('erro_trabalhe') ?? $errors->first() }}
                    </div>
                @endif

                <form id="formulario-trabalhe-conosco" class="space-y-6" method="POST" action="{{ route('trabalhe-conosco.enviar') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nome" class="block text-sm font-bold text-neutral-900 mb-2">Nome completo <span style="color: #e21850;">*</span></label>
                            <input type="text" id="nome" name="nome" required value="{{ old('nome') }}"
                                   placeholder="Seu nome completo"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-neutral-900 mb-2">E-mail <span style="color: #e21850;">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                   placeholder="seu@email.com"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="whatsapp" class="block text-sm font-bold text-neutral-900 mb-2">WhatsApp <span style="color: #e21850;">*</span></label>
                            <input type="tel" id="whatsapp" name="whatsapp" required value="{{ old('whatsapp') }}"
                                   placeholder="(00) 00000-0000"
                                   maxlength="15"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>

                        <div>
                            <label for="vaga" class="block text-sm font-bold text-neutral-900 mb-2">Área de interesse <span style="color: #e21850;">*</span></label>
                            <select id="vaga" name="vaga" required
                                    class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300 cursor-pointer appearance-none"
                                    style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 20 20%22 fill=%22%23999%22><path fill-rule=%22evenodd%22 d=%22M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z%22 clip-rule=%22evenodd%22/></svg>'); background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.25rem; padding-right: 3rem;"
                                    onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                    onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                <option value="" disabled selected>Selecione uma área</option>
                                <option value="contabil" {{ old('vaga') === 'contabil' ? 'selected' : '' }}>Contábil</option>
                                <option value="fiscal" {{ old('vaga') === 'fiscal' ? 'selected' : '' }}>Fiscal</option>
                                <option value="dp" {{ old('vaga') === 'dp' ? 'selected' : '' }}>Departamento Pessoal</option>
                                <option value="comercial" {{ old('vaga') === 'comercial' ? 'selected' : '' }}>Comercial</option>
                                <option value="administrativo" {{ old('vaga') === 'administrativo' ? 'selected' : '' }}>Administrativo</option>
                                <option value="ti" {{ old('vaga') === 'ti' ? 'selected' : '' }}>Tecnologia</option>
                                <option value="estagio" {{ old('vaga') === 'estagio' ? 'selected' : '' }}>Estágio</option>
                                <option value="banco-talentos" {{ old('vaga') === 'banco-talentos' ? 'selected' : '' }}>Banco de Talentos</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="linkedin" class="block text-sm font-bold text-neutral-900 mb-2">LinkedIn</label>
                            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}"
                                   placeholder="https://linkedin.com/in/seu-perfil"
                                   class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow=''">
                        </div>

                        <div>
                            <label for="curriculo" class="block text-sm font-bold text-neutral-900 mb-2">Currículo (PDF até 5MB) <span style="color: #e21850;">*</span></label>
                            <input type="file" id="curriculo" name="curriculo" required accept="application/pdf,.pdf"
                                   class="w-full px-4 py-3 rounded-xl border border-neutral-200 bg-neutral-50 text-sm font-normal text-neutral-700 file:mr-4 file:rounded-lg file:border-0 file:bg-marca file:px-4 file:py-2 file:text-sm file:font-bold file:text-white"
                                   onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                   onblur="this.style.borderColor=''; this.style.boxShadow='';"
                                   onmouseenter="this.style.borderColor='#9b153a'"
                                   onmouseleave="this.style.borderColor='';">
                        </div>
                    </div>

                    <div>
                        <label for="apresentacao" class="block text-sm font-bold text-neutral-900 mb-2">Apresentação profissional <span style="color: #e21850;">*</span></label>
                        <textarea id="apresentacao" name="apresentacao" rows="5" required
                                  placeholder="Conte brevemente sobre sua experiência, principais habilidades e objetivos profissionais."
                                  class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all duration-300 resize-none"
                                  onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                                  onblur="this.style.borderColor=''; this.style.boxShadow=''">{{ old('apresentacao') }}</textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <button type="submit" id="btn-enviar-trabalhe"
                                class="inline-flex items-center justify-center gap-2 text-white px-8 py-4 rounded-full font-bold text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg cursor-pointer min-w-55"
                                style="background-color: #e21850;"
                                onmouseenter="if(!this.disabled) this.style.backgroundColor='#9b153a'"
                                onmouseleave="if(!this.disabled) this.style.backgroundColor='#e21850'">
                            <span id="btn-enviar-trabalhe-texto">Enviar candidatura</span>
                            <i class="fa-solid fa-paper-plane text-sm" id="btn-enviar-trabalhe-icone"></i>
                        </button>
                        <p class="text-xs text-neutral-400 font-normal">
                            <i class="fa-solid fa-lock text-[10px] mr-1"></i>
                            Seus dados serão usados apenas para fins de recrutamento.
                        </p>
                    </div>

                    <div id="feedback-trabalhe-conosco" class="hidden mt-4 p-4 rounded-xl text-sm font-bold"></div>
                </form>
            </div>

            {{-- Sidebar --}}
            <aside class="lg:col-span-5">
                <div class="lg:sticky lg:top-28 space-y-6">
                    <div class="bg-neutral-950 rounded-2xl p-8 text-white animar-entrada atraso-1">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-8 h-0.5 rounded-full" style="background-color: #e21850;"></span>
                            <span class="text-[11px] uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Nosso processo</span>
                        </div>
                        <h3 class="text-xl font-black mb-6">Como funciona a candidatura</h3>

                        <div class="space-y-5">
                            <div class="flex items-start gap-4">
                                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10">
                                    <i class="fa-solid fa-file-arrow-up text-base" style="color: #e21850;"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold text-white/90 block">1. Envio do currículo</span>
                                    <span class="text-sm text-white/50 font-normal">Preencha o formulário e anexe seu PDF.</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10">
                                    <i class="fa-solid fa-magnifying-glass text-base" style="color: #e21850;"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold text-white/90 block">2. Análise do perfil</span>
                                    <span class="text-sm text-white/50 font-normal">Nosso time avalia aderência às vagas e cultura.</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <span class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10">
                                    <i class="fa-solid fa-comments text-base" style="color: #e21850;"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold text-white/90 block">3. Contato da equipe</span>
                                    <span class="text-sm text-white/50 font-normal">Se houver oportunidade, entraremos em contato.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-neutral-50 rounded-2xl p-8 animar-entrada atraso-2">
                        <div class="flex items-center gap-4 mb-5">
                            <span class="w-12 h-12 flex items-center justify-center rounded-xl" style="background-color: rgba(226,24,80,0.1);">
                                <i class="fa-regular fa-clock text-lg" style="color: #e21850;"></i>
                            </span>
                            <div>
                                <h4 class="text-base font-black text-neutral-900">Prazo de retorno</h4>
                                <p class="text-sm text-neutral-400 font-normal">Conforme abertura de vagas</p>
                            </div>
                        </div>
                        <p class="text-sm font-normal text-neutral-500 leading-relaxed">
                            Mantemos seu currículo em nosso banco de talentos para oportunidades futuras.
                        </p>
                    </div>

                    <div class="bg-neutral-50 rounded-2xl p-8 animar-entrada atraso-3">
                        <h4 class="text-base font-black text-neutral-900 mb-5">Dúvidas sobre vagas?</h4>
                        <a href="{{ route('contato') }}"
                           class="inline-flex items-center justify-center gap-2 text-white px-6 py-3.5 rounded-full font-bold text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg w-full"
                           style="background-color: #e21850;"
                           onmouseenter="this.style.backgroundColor='#9b153a'"
                           onmouseleave="this.style.backgroundColor='#e21850'">
                            <i class="fa-solid fa-envelope text-sm"></i>
                            Falar com a equipe
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- CTA WhatsApp --}}
<x-home.cta-whatsapp />
