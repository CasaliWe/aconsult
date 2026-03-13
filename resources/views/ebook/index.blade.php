@extends('layouts.app')

@section('titulo', 'Ebooks Gratuitos | Aconsult Contabilidade')
@section('descricao', 'Baixe gratuitamente nossos ebooks exclusivos sobre contabilidade, tributação e gestão empresarial. Conteúdo preparado pelos especialistas da Aconsult.')

@section('conteudo')
    {{-- Banner --}}
    <section class="relative w-full pt-32 pb-20 md:pt-36 md:pb-24 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('arquivos/imagens-empresa/time-pequeno-feliz-trabalhando.jpg') }}"
                 alt="Ebooks Aconsult Contabilidade"
                 class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/92 via-black/75 to-black/50"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

        <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.08), transparent 70%);"></div>
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/20 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
            <nav class="flex items-center gap-2 text-sm text-white/40 font-normal mb-8" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-white/70 transition-colors">Início</a>
                <i class="fa-solid fa-chevron-right text-[8px]"></i>
                <span class="text-white/70">Ebooks</span>
            </nav>

            <div class="max-w-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-8 h-[2px] rounded-full" style="background-color: #e21850;"></span>
                    <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Material gratuito</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-[1.08] mb-4">
                    Conhecimento que <span style="color: #e21850;">transforma</span> negócios
                </h1>
                <p class="text-base md:text-lg text-white/50 font-normal max-w-lg leading-relaxed">
                    Ebooks gratuitos preparados por especialistas para impulsionar sua empresa.
                </p>
            </div>
        </div>
    </section>

    {{-- Grid de ebooks --}}
    <section class="py-20 md:py-28 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl -translate-x-1/2"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Ebook 1 --}}
                <div class="group animar-entrada atraso-1">
                    <div class="bg-neutral-50 rounded-2xl overflow-hidden border border-neutral-100 hover:shadow-xl hover:shadow-neutral-900/5 hover:-translate-y-1 transition-all duration-500 h-full flex flex-col">
                        {{-- Capa --}}
                        <div class="relative aspect-[4/3] bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 flex items-center justify-center p-8 overflow-hidden">
                            <div class="absolute top-0 left-0 right-0 h-1.5" style="background-color: #e21850;"></div>
                            <div class="absolute top-6 right-6 w-16 h-16 rounded-full blur-2xl" style="background-color: rgba(226,24,80,0.2);"></div>
                            <div class="relative z-10 text-center">
                                <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                                    <i class="fa-solid fa-scale-balanced text-lg" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-white leading-tight">
                                    Reforma Tributária 2026
                                </h3>
                                <p class="text-xs text-white/40 font-normal mt-2">Guia completo</p>
                            </div>
                            <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] font-black text-white" style="background-color: #e21850;">GRÁTIS</div>
                        </div>

                        {{-- Info --}}
                        <div class="p-6 flex flex-col flex-1">
                            <span class="text-[10px] uppercase tracking-[0.2em] font-bold mb-2" style="color: #e21850;">Tributário</span>
                            <h4 class="text-lg font-black text-neutral-900 mb-2 leading-snug">Reforma Tributária 2026: Guia Completo</h4>
                            <p class="text-sm text-neutral-500 font-normal leading-relaxed mb-6 flex-1">
                                Tudo sobre IBS, CBS e como preparar sua empresa para as mudanças fiscais de 2026.
                            </p>
                            <button onclick="abrirModalEbook(this)"
                                    data-titulo="Reforma Tributária 2026: Guia Completo"
                                    class="w-full inline-flex items-center justify-center gap-2 text-white px-5 py-3 rounded-xl font-bold text-sm transition-all duration-300 cursor-pointer"
                                    style="background-color: #e21850;"
                                    onmouseenter="this.style.backgroundColor='#9b153a'"
                                    onmouseleave="this.style.backgroundColor='#e21850'">
                                <i class="fa-solid fa-download text-xs"></i>
                                Baixar ebook
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Ebook 2 --}}
                <div class="group animar-entrada atraso-2">
                    <div class="bg-neutral-50 rounded-2xl overflow-hidden border border-neutral-100 hover:shadow-xl hover:shadow-neutral-900/5 hover:-translate-y-1 transition-all duration-500 h-full flex flex-col">
                        <div class="relative aspect-[4/3] bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 flex items-center justify-center p-8 overflow-hidden">
                            <div class="absolute top-0 left-0 right-0 h-1.5" style="background-color: #e21850;"></div>
                            <div class="absolute bottom-6 left-6 w-16 h-16 rounded-full blur-2xl" style="background-color: rgba(226,24,80,0.2);"></div>
                            <div class="relative z-10 text-center">
                                <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                                    <i class="fa-solid fa-cart-shopping text-lg" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-white leading-tight">
                                    Contabilidade para E-commerce
                                </h3>
                                <p class="text-xs text-white/40 font-normal mt-2">Do zero ao lucro</p>
                            </div>
                            <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] font-black text-white" style="background-color: #e21850;">GRÁTIS</div>
                        </div>

                        <div class="p-6 flex flex-col flex-1">
                            <span class="text-[10px] uppercase tracking-[0.2em] font-bold mb-2" style="color: #e21850;">E-commerce</span>
                            <h4 class="text-lg font-black text-neutral-900 mb-2 leading-snug">Contabilidade para E-commerce: Do Zero ao Lucro</h4>
                            <p class="text-sm text-neutral-500 font-normal leading-relaxed mb-6 flex-1">
                                Tributação, regimes fiscais e estratégias para lojistas virtuais e marketplaces.
                            </p>
                            <button onclick="abrirModalEbook(this)"
                                    data-titulo="Contabilidade para E-commerce: Do Zero ao Lucro"
                                    class="w-full inline-flex items-center justify-center gap-2 text-white px-5 py-3 rounded-xl font-bold text-sm transition-all duration-300 cursor-pointer"
                                    style="background-color: #e21850;"
                                    onmouseenter="this.style.backgroundColor='#9b153a'"
                                    onmouseleave="this.style.backgroundColor='#e21850'">
                                <i class="fa-solid fa-download text-xs"></i>
                                Baixar ebook
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Ebook 3 --}}
                <div class="group animar-entrada atraso-3">
                    <div class="bg-neutral-50 rounded-2xl overflow-hidden border border-neutral-100 hover:shadow-xl hover:shadow-neutral-900/5 hover:-translate-y-1 transition-all duration-500 h-full flex flex-col">
                        <div class="relative aspect-[4/3] bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 flex items-center justify-center p-8 overflow-hidden">
                            <div class="absolute top-0 left-0 right-0 h-1.5" style="background-color: #e21850;"></div>
                            <div class="absolute top-8 left-8 w-16 h-16 rounded-full blur-2xl" style="background-color: rgba(226,24,80,0.2);"></div>
                            <div class="relative z-10 text-center">
                                <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center" style="background-color: rgba(226,24,80,0.15);">
                                    <i class="fa-solid fa-ship text-lg" style="color: #e21850;"></i>
                                </div>
                                <h3 class="text-lg font-black text-white leading-tight">
                                    RADAR Siscomex
                                </h3>
                                <p class="text-xs text-white/40 font-normal mt-2">Passo a passo</p>
                            </div>
                            <div class="absolute top-3 right-3 px-3 py-1 rounded-full text-[10px] font-black text-white" style="background-color: #e21850;">GRÁTIS</div>
                        </div>

                        <div class="p-6 flex flex-col flex-1">
                            <span class="text-[10px] uppercase tracking-[0.2em] font-bold mb-2" style="color: #e21850;">Comércio Exterior</span>
                            <h4 class="text-lg font-black text-neutral-900 mb-2 leading-snug">RADAR Siscomex: Passo a Passo para Habilitar</h4>
                            <p class="text-sm text-neutral-500 font-normal leading-relaxed mb-6 flex-1">
                                Como habilitar sua empresa para importar e exportar com segurança e agilidade.
                            </p>
                            <button onclick="abrirModalEbook(this)"
                                    data-titulo="RADAR Siscomex: Passo a Passo para Habilitar"
                                    class="w-full inline-flex items-center justify-center gap-2 text-white px-5 py-3 rounded-xl font-bold text-sm transition-all duration-300 cursor-pointer"
                                    style="background-color: #e21850;"
                                    onmouseenter="this.style.backgroundColor='#9b153a'"
                                    onmouseleave="this.style.backgroundColor='#e21850'">
                                <i class="fa-solid fa-download text-xs"></i>
                                Baixar ebook
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Modal de captura --}}
    <div id="modal-ebook" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="fecharModalEbook()"></div>

        {{-- Card --}}
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 transform scale-95 opacity-0 transition-all duration-300" id="modal-ebook-card">
            {{-- Fechar --}}
            <button onclick="fecharModalEbook()" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-neutral-100 text-neutral-400 hover:bg-neutral-200 hover:text-neutral-600 transition-all cursor-pointer">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <div class="text-center mb-6">
                <div class="w-14 h-14 mx-auto mb-4 rounded-2xl flex items-center justify-center" style="background-color: rgba(226,24,80,0.1);">
                    <i class="fa-solid fa-book-open text-xl" style="color: #e21850;"></i>
                </div>
                <h3 class="text-xl font-black text-neutral-900" id="modal-ebook-titulo">Baixar ebook</h3>
                <p class="text-sm text-neutral-400 font-normal mt-1">Preencha seus dados para receber no e-mail.</p>
            </div>

            <form id="formulario-ebook" novalidate>
                @csrf
                <input type="hidden" id="ebook-titulo-hidden" name="ebook_titulo" value="">

                <div style="margin-bottom: 12px;">
                    <input type="text" id="ebook-nome" name="nome" required
                           placeholder="Seu nome"
                           class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none transition-all duration-300"
                           onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                           onblur="this.style.borderColor=''; this.style.boxShadow=''">
                </div>

                <div style="margin-bottom: 12px;">
                    <input type="email" id="ebook-email" name="email" required
                           placeholder="Seu melhor e-mail"
                           class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none transition-all duration-300"
                           onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                           onblur="this.style.borderColor=''; this.style.boxShadow=''">
                </div>

                <div style="margin-bottom: 16px;">
                    <input type="tel" id="ebook-whatsapp" name="whatsapp"
                           placeholder="WhatsApp (opcional)"
                           maxlength="15"
                           class="w-full px-4 py-3.5 rounded-xl border border-neutral-200 bg-neutral-50 text-base font-normal text-neutral-900 placeholder:text-neutral-400 focus:outline-none transition-all duration-300"
                           onfocus="this.style.borderColor='#e21850'; this.style.boxShadow='0 0 0 2px rgba(226,24,80,0.15)'"
                           onblur="this.style.borderColor=''; this.style.boxShadow=''">
                </div>

                <div style="margin-bottom: 12px;">
                    <button type="submit" id="btn-ebook"
                            class="w-full inline-flex items-center justify-center gap-2 text-white px-6 py-4 rounded-xl font-bold text-base transition-all duration-300 cursor-pointer"
                            style="background-color: #e21850;"
                            onmouseenter="if(!this.disabled) this.style.backgroundColor='#9b153a'"
                            onmouseleave="if(!this.disabled) this.style.backgroundColor='#e21850'">
                        <i class="fa-solid fa-download text-sm" id="btn-ebook-icone"></i>
                        <span id="btn-ebook-texto">Quero baixar grátis</span>
                    </button>
                </div>

                <div id="feedback-ebook" class="hidden rounded-xl text-sm font-bold" style="padding: 1rem; margin-bottom: 12px;"></div>

                <p class="text-xs text-neutral-400 font-normal text-center">
                    <i class="fa-solid fa-lock text-[10px] mr-1"></i>
                    Não enviamos spam. Seus dados estão seguros.
                </p>
            </form>
        </div>
    </div>

    {{-- CTA WhatsApp --}}
    <x-home.cta-whatsapp />
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const formulario = document.getElementById('formulario-ebook');
        const btnEbook = document.getElementById('btn-ebook');
        const btnTexto = document.getElementById('btn-ebook-texto');
        const btnIcone = document.getElementById('btn-ebook-icone');
        const feedback = document.getElementById('feedback-ebook');
        const inputWhatsapp = document.getElementById('ebook-whatsapp');

        /* ─── Máscara WhatsApp ─── */
        if (inputWhatsapp) {
            inputWhatsapp.addEventListener('input', (e) => {
                let valor = e.target.value.replace(/\D/g, '');
                if (valor.length > 11) valor = valor.substring(0, 11);

                if (valor.length > 6) {
                    valor = `(${valor.substring(0,2)}) ${valor.substring(2,7)}-${valor.substring(7)}`;
                } else if (valor.length > 2) {
                    valor = `(${valor.substring(0,2)}) ${valor.substring(2)}`;
                } else if (valor.length > 0) {
                    valor = `(${valor}`;
                }
                e.target.value = valor;
            });
        }

        /* ─── Submit com feedback ─── */
        if (formulario) {
            formulario.addEventListener('submit', (e) => {
                e.preventDefault();

                btnEbook.disabled = true;
                btnEbook.style.opacity = '0.7';
                btnEbook.style.cursor = 'not-allowed';
                btnTexto.textContent = 'Preparando...';
                btnIcone.className = 'fa-solid fa-spinner fa-spin text-sm';
                feedback.classList.add('hidden');

                /* Simula envio (substituir por fetch real futuramente) */
                setTimeout(() => {
                    btnTexto.textContent = 'Ebook enviado!';
                    btnIcone.className = 'fa-solid fa-check text-sm';
                    btnEbook.style.backgroundColor = '#16a34a';
                    btnEbook.style.opacity = '1';

                    feedback.classList.remove('hidden');
                    feedback.style.backgroundColor = 'rgba(22, 163, 74, 0.1)';
                    feedback.style.color = '#16a34a';
                    feedback.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> Pronto! Verifique seu e-mail para baixar o ebook.';

                    formulario.reset();

                    setTimeout(() => {
                        fecharModalEbook();
                        resetarBtnEbook();
                    }, 3000);
                }, 2000);
            });
        }

        function resetarBtnEbook() {
            btnEbook.disabled = false;
            btnEbook.style.opacity = '1';
            btnEbook.style.cursor = 'pointer';
            btnEbook.style.backgroundColor = '#e21850';
            btnTexto.textContent = 'Quero baixar grátis';
            btnIcone.className = 'fa-solid fa-download text-sm';
            feedback.classList.add('hidden');
        }
    });

    /* ─── Modal ─── */
    function abrirModalEbook(btn) {
        const modal = document.getElementById('modal-ebook');
        const card = document.getElementById('modal-ebook-card');
        const titulo = btn.dataset.titulo || 'Baixar ebook';

        document.getElementById('modal-ebook-titulo').textContent = titulo;
        document.getElementById('ebook-titulo-hidden').value = titulo;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        requestAnimationFrame(() => {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
        });
    }

    function fecharModalEbook() {
        const modal = document.getElementById('modal-ebook');
        const card = document.getElementById('modal-ebook-card');

        card.style.opacity = '0';
        card.style.transform = 'scale(0.95)';

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }, 300);
    }

    /* Fechar com ESC */
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') fecharModalEbook();
    });
</script>
@endpush
