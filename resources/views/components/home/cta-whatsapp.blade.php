{{-- CTA WhatsApp - Moderno e elegante --}}
<section class="relative py-20 md:py-24 overflow-hidden">
    {{-- Imagem de fundo sutil --}}
    <div class="absolute inset-0">
        <img src="{{ asset('arquivos/imagens-empresa/toda-equipe.jpg') }}" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-br from-neutral-950/93 via-neutral-900/90 to-neutral-950/93"></div>

    {{-- Elemento decorativo --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(226, 24, 80, 0.15), transparent 70%);"></div>
    <div class="absolute bottom-0 right-1/4 w-72 h-72 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(155, 21, 58, 0.1), transparent 70%);"></div>

    {{-- Linhas decorativas --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/30 to-transparent"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="text-center md:text-left animar-entrada">
                <span class="text-marca text-sm font-bold uppercase tracking-widest">Vamos conversar</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-tight mt-3 mb-4">
                    Pronto para transformar<br>
                    <span class="text-white/70">a gestão do seu negócio?</span>
                </h2>
                <p class="text-white/50 font-normal text-base max-w-lg">
                    Fale com um de nossos especialistas e descubra como a Aconsult pode impulsionar a sua empresa.
                </p>
            </div>
            <a href="https://wa.me/{{ $config->whatsapp_numero ?? '554721250281' }}?text={{ urlencode($config->whatsapp_mensagem ?? 'Olá! Como podemos ajudar?') }}"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-3 text-white px-10 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 shrink-0 group animar-entrada atraso-2"
               style="background-color: #25D366; box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);"
               onmouseenter="this.style.backgroundColor='#1da851'"
               onmouseleave="this.style.backgroundColor='#25D366'">
                <i class="fa-brands fa-whatsapp text-2xl group-hover:scale-110 transition-transform"></i>
                Chamar no WhatsApp
            </a>
        </div>
    </div>
</section>