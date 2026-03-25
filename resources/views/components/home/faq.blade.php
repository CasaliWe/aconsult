@props([
    'faqItens' => collect(),
])

@php
    $faqExibicao = $faqItens;

    if ($faqExibicao->isEmpty()) {
        $faqExibicao = collect([
            (object) [
                'pergunta' => 'Quais servicos contabeis a Aconsult oferece?',
                'resposta' => 'A Aconsult oferece servicos contabeis completos, incluindo BPO fiscal e financeiro, gestao de departamento pessoal, assessoria tributaria e suporte para comercio exterior.',
            ],
            (object) [
                'pergunta' => 'A Aconsult atende empresas de todo o Brasil?',
                'resposta' => 'Sim. Mesmo com sede em Itajai, atendemos clientes em varios estados com uma operacao digital e atendimento proximo.',
            ],
            (object) [
                'pergunta' => 'Como posso entrar em contato com a Aconsult?',
                'resposta' => 'Voce pode chamar no WhatsApp, enviar e-mail para contato@aconsultcontabilidade.com.br ou falar conosco pelas redes sociais.',
            ],
        ]);
    }
@endphp

{{-- Seção FAQ - Perguntas Frequentes --}}
<section class="py-20 md:py-28 bg-neutral-50 relative overflow-hidden">
    {{-- Decoração --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-marca/3 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 md:px-10">
        {{-- Cabeçalho --}}
        <div class="text-center mb-14 animar-entrada">
            <span class="text-marca text-sm font-bold uppercase tracking-widest">Dúvidas</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-neutral-900 mt-3 mb-4">
                Perguntas <span class="text-marca">frequentes</span>
            </h2>
            <p class="text-neutral-500 text-base font-normal max-w-lg mx-auto">
                Tire suas dúvidas sobre nossos serviços e processos contábeis.
            </p>
        </div>

        {{-- Accordion --}}
        <div class="flex flex-col gap-4" id="faq-container">
            @foreach ($faqExibicao as $indice => $faq)
                <div class="faq-item bg-white rounded-2xl border border-neutral-100 overflow-hidden transition-all duration-300 hover:border-marca/20 animar-entrada">
                    <button class="faq-btn w-full px-6 md:px-8 py-5 flex items-center justify-between gap-4 text-left cursor-pointer group">
                        <span class="text-base md:text-lg font-black text-neutral-900 group-hover:text-marca transition-colors">
                            {{ $faq->pergunta }}
                        </span>
                        <span class="faq-icone w-10 h-10 flex items-center justify-center rounded-xl bg-marca/10 text-marca shrink-0 transition-all duration-300">
                            <i class="fa-solid fa-plus text-sm transition-transform duration-300"></i>
                        </span>
                    </button>
                    <div class="faq-resposta hidden px-6 md:px-8 pb-6">
                        <p class="text-neutral-500 text-base font-normal leading-relaxed">
                            {{ $faq->resposta }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const faqBtns = document.querySelectorAll('.faq-btn');

        faqBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const resposta = item.querySelector('.faq-resposta');
                const icone = item.querySelector('.faq-icone i');
                const aberto = !resposta.classList.contains('hidden');

                /* Fecha todos os outros */
                document.querySelectorAll('.faq-item').forEach(outroItem => {
                    if (outroItem !== item) {
                        outroItem.querySelector('.faq-resposta').classList.add('hidden');
                        outroItem.querySelector('.faq-icone i').classList.remove('rotate-45');
                        outroItem.classList.remove('border-marca/30', 'shadow-lg', 'shadow-marca/5');
                        outroItem.classList.add('border-neutral-100');
                    }
                });

                /* Toggle o clicado */
                if (aberto) {
                    resposta.classList.add('hidden');
                    icone.classList.remove('rotate-45');
                    item.classList.remove('border-marca/30', 'shadow-lg', 'shadow-marca/5');
                    item.classList.add('border-neutral-100');
                } else {
                    resposta.classList.remove('hidden');
                    icone.classList.add('rotate-45');
                    item.classList.add('border-marca/30', 'shadow-lg', 'shadow-marca/5');
                    item.classList.remove('border-neutral-100');
                }
            });
        });
    });
</script>
