{{-- Botão flutuante do WhatsApp - componente global --}}
<a href="https://wa.me/{{ $config->whatsapp_numero ?? '554721250281' }}?text={{ urlencode($config->whatsapp_mensagem ?? 'Olá! Como podemos ajudar?') }}"
   id="whatsapp-flutuante"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Fale conosco pelo WhatsApp"
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-12 h-12 md:w-16 md:h-16 rounded-full text-white shadow-xl transition-all duration-300 animate-pulsar hover:animate-none hover:scale-110 group"
   style="background-color: #25D366; box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);">
    <i class="fa-brands fa-whatsapp text-2xl md:text-3xl group-hover:scale-110 transition-transform"></i>
</a>

<style>
    #whatsapp-flutuante {
        transition: opacity 0.35s ease, transform 0.35s ease, bottom 0.35s ease, width 0.35s ease, height 0.35s ease;
        will-change: opacity, transform, bottom;
    }

    #whatsapp-flutuante.wpp-compacto {
        bottom: 92px;
        opacity: 0.75;
        transform: scale(0.86);
    }

    #whatsapp-flutuante.wpp-oculto {
        opacity: 0;
        transform: translateY(10px) scale(0.72);
        pointer-events: none;
    }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var botao = document.getElementById('whatsapp-flutuante');
        if (!botao) {
            return;
        }

        var agendado = false;

        function atualizarEstadoBotao() {
            var topoVisivel = window.scrollY + window.innerHeight;
            var alturaTotal = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
            var distanciaFinal = Math.max(0, alturaTotal - topoVisivel);

            botao.classList.remove('wpp-compacto', 'wpp-oculto');

            if (distanciaFinal <= 120) {
                botao.classList.add('wpp-oculto');
                return;
            }

            if (distanciaFinal <= 260) {
                botao.classList.add('wpp-compacto');
            }
        }

        function aoRolarOuRedimensionar() {
            if (agendado) {
                return;
            }

            agendado = true;
            window.requestAnimationFrame(function () {
                atualizarEstadoBotao();
                agendado = false;
            });
        }

        atualizarEstadoBotao();
        window.addEventListener('scroll', aoRolarOuRedimensionar, { passive: true });
        window.addEventListener('resize', aoRolarOuRedimensionar);
    });
</script>
