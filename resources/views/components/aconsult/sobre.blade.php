{{-- Seção Sobre - Página A Consult --}}
<section class="py-20 md:py-28 bg-white relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 right-0 w-72 h-72 bg-marca/3 rounded-full blur-3xl translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-marca-escura/3 rounded-full blur-3xl -translate-x-1/2"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- Imagem --}}
            <div class="relative animar-entrada">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-neutral-900/10">
                    <img src="{{ asset('arquivos/imagens-empresa/aconsult.jpg') }}"
                         alt="Equipe Aconsult Contabilidade"
                         class="w-full h-full object-cover aspect-[4/3]">
                    {{-- Borda decorativa --}}
                    <div class="absolute bottom-0 left-0 right-0 h-1.5" style="background-color: #e21850;"></div>
                </div>
                {{-- Badge flutuante --}}
                <div class="absolute -bottom-5 -right-3 md:right-6 bg-white rounded-2xl shadow-xl shadow-neutral-900/10 px-6 py-4 flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background-color: rgba(226,24,80,0.1);">
                        <i class="fa-solid fa-handshake text-xl" style="color: #e21850;"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-black text-neutral-900 block leading-none">10+</span>
                        <span class="text-xs text-neutral-400 font-normal">Estados atendidos</span>
                    </div>
                </div>
            </div>

            {{-- Conteúdo --}}
            <div class="animar-entrada atraso-2">
                <span class="text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold" style="color: #e21850;">Quem somos</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-6">
                    A <span style="color: #e21850;">Aconsult</span>
                </h2>
                <div class="flex flex-col gap-5 text-neutral-600 text-base font-normal leading-relaxed">
                    <p>
                        Somos um escritório de contabilidade comprometido em oferecer soluções contábeis e tributárias para impulsionar o crescimento e o sucesso dos negócios dos nossos clientes.
                    </p>
                    <p>
                        Especialistas em comércio exterior, simplificamos os processos para atender às necessidades específicas de cada cliente, proporcionando uma compreensão clara de suas obrigações e oportunidades.
                    </p>
                    <p>
                        Para isso, buscamos permanentemente o desenvolvimento de competências e o aprimoramento dos processos. Primamos pela satisfação dos clientes, através do atendimento consultivo, da eficiência, da celeridade nos serviços e da economicidade dos serviços prestados.
                    </p>
                    <p>
                        Nossa equipe multidisciplinar atua como parceira dos nossos clientes, orientando e agindo ativamente para otimizar as rotinas contábeis dos seus negócios.
                    </p>
                </div>

                {{-- Botão --}}
                <div class="mt-8">
                    <a href="{{ route('contato') }}"
                       class="inline-flex items-center gap-2 text-white px-8 py-3.5 rounded-full font-bold text-base transition-all duration-300 hover:shadow-xl hover:shadow-marca/25 hover:-translate-y-0.5"
                       style="background-color: #e21850;"
                       onmouseenter="this.style.backgroundColor='#9b153a'"
                       onmouseleave="this.style.backgroundColor='#e21850'">
                        Entrar em contato
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
