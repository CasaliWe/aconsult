@extends('layouts.app')

@section('titulo', 'Contato | Aconsult Contabilidade')
@section('descricao', 'Entre em contato com a Aconsult Contabilidade. Estamos prontos para transformar a gestão do seu negócio com inteligência tributária e contábil.')

@section('conteudo')
    <x-contato.sessao-contato />
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const formulario = document.getElementById('formulario-contato');
        const btnEnviar = document.getElementById('btn-enviar');
        const btnTexto = document.getElementById('btn-enviar-texto');
        const btnIcone = document.getElementById('btn-enviar-icone');
        const feedback = document.getElementById('feedback-contato');
        const inputWhatsapp = document.getElementById('whatsapp');

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

                /* Estado loading */
                btnEnviar.disabled = true;
                btnEnviar.style.opacity = '0.7';
                btnEnviar.style.cursor = 'not-allowed';
                btnTexto.textContent = 'Enviando...';
                btnIcone.className = 'fa-solid fa-spinner fa-spin text-sm';
                feedback.classList.add('hidden');

                /* Simula envio (substituir por fetch real futuramente) */
                setTimeout(() => {
                    /* Estado sucesso */
                    btnTexto.textContent = 'Mensagem enviada!';
                    btnIcone.className = 'fa-solid fa-check text-sm';
                    btnEnviar.style.backgroundColor = '#16a34a';
                    btnEnviar.style.opacity = '1';

                    feedback.classList.remove('hidden');
                    feedback.style.backgroundColor = 'rgba(22, 163, 74, 0.1)';
                    feedback.style.color = '#16a34a';
                    feedback.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> Contato recebido com sucesso! Nossa equipe entrará em contato em breve.';

                    formulario.reset();

                    /* Restaura botão após 5s */
                    setTimeout(() => {
                        btnEnviar.disabled = false;
                        btnEnviar.style.opacity = '1';
                        btnEnviar.style.cursor = 'pointer';
                        btnEnviar.style.backgroundColor = '#e21850';
                        btnTexto.textContent = 'Enviar mensagem';
                        btnIcone.className = 'fa-solid fa-paper-plane text-sm';
                    }, 5000);
                }, 2000);
            });
        }
    });
</script>
@endpush
