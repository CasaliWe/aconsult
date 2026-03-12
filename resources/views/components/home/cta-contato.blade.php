{{-- CTA Contato - Design moderno e elegante --}}
<section class="relative py-28 md:py-36 overflow-hidden">
    {{-- Background parallax --}}
    <div class="absolute inset-0 bg-parallax"
         style="background-image: url('{{ asset('arquivos/imagens-empresa/3-mulheres-em-pe.jpg') }}');"></div>

    {{-- Overlay escuro sofisticado --}}
    <div class="absolute inset-0 bg-gradient-to-br from-neutral-950/90 via-neutral-900/85 to-neutral-950/90"></div>

    {{-- Elemento decorativo --}}
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-marca/40 to-transparent"></div>

    {{-- Conteúdo --}}
    <div class="relative z-10 max-w-4xl mx-auto px-6 md:px-10 text-center">
        <div class="animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Fale com a gente</span>

            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mt-4 mb-6">
                Qual é o seu<br>
                <span id="texto-digitacao-cta" class="text-marca cursor-digitacao inline-block min-h-[1.2em]"></span>
            </h2>

            <div class="w-16 h-1 bg-marca mx-auto mb-8 rounded-full"></div>

            <p class="text-lg md:text-xl text-white/60 font-normal max-w-2xl mx-auto mb-10 leading-relaxed">
                Escreva para nós e criaremos uma proposta personalizada para o seu negócio. Nossa equipe está pronta para impulsionar sua empresa.
            </p>

            <a href="{{ route('contato') }}"
               class="inline-flex items-center gap-3 text-white px-10 py-4 rounded-full font-bold text-lg transition-all duration-300 hover:shadow-2xl hover:shadow-marca/30 hover:-translate-y-1 group"
               style="background-color: #e21850;"
               onmouseenter="this.style.backgroundColor='#9b153a'"
               onmouseleave="this.style.backgroundColor='#e21850'">
                Entrar em contato
                <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const elementoCta = document.getElementById('texto-digitacao-cta');
        if (!elementoCta) return;

        const palavrasCta = ['desafio contábil?', 'próximo passo?', 'objetivo fiscal?'];
        let indiceCta = 0;
        let letraCta = 0;
        let apagandoCta = false;
        let pausaCta = false;

        function digitarCta() {
            const palavra = palavrasCta[indiceCta];

            if (!apagandoCta) {
                elementoCta.textContent = palavra.substring(0, letraCta + 1);
                letraCta++;
                if (letraCta === palavra.length) {
                    pausaCta = true;
                    setTimeout(() => { apagandoCta = true; pausaCta = false; digitarCta(); }, 2000);
                    return;
                }
            } else {
                elementoCta.textContent = palavra.substring(0, letraCta - 1);
                letraCta--;
                if (letraCta === 0) {
                    apagandoCta = false;
                    indiceCta = (indiceCta + 1) % palavrasCta.length;
                }
            }

            if (!pausaCta) setTimeout(digitarCta, apagandoCta ? 40 : 80);
        }

        const obsCta = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(digitarCta, 400);
                    obsCta.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        obsCta.observe(elementoCta.closest('section'));
    });
</script>