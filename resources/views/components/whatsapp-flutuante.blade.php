{{-- Botão flutuante do WhatsApp - componente global --}}
<a href="https://wa.me/{{ $config->whatsapp_numero ?? '554721250281' }}?text={{ urlencode($config->whatsapp_mensagem ?? 'Olá! Como podemos ajudar?') }}"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Fale conosco pelo WhatsApp"
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-12 h-12 md:w-16 md:h-16 rounded-full text-white shadow-xl transition-all duration-300 animate-pulsar hover:animate-none hover:scale-110 group"
   style="background-color: #25D366; box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);">
    <i class="fa-brands fa-whatsapp text-2xl md:text-3xl group-hover:scale-110 transition-transform"></i>
</a>
