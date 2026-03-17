@extends('layouts.app')

@section('titulo', 'Trabalhe Conosco | Aconsult Contabilidade')
@section('descricao', 'Faça parte da equipe da Aconsult Contabilidade. Envie seu currículo e candidate-se para futuras oportunidades.')

@section('conteudo')
    <x-trabalhe-conosco.sessao-trabalhe-conosco />
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const formulario = document.getElementById('formulario-trabalhe-conosco');
        const btnEnviar = document.getElementById('btn-enviar-trabalhe');
        const btnTexto = document.getElementById('btn-enviar-trabalhe-texto');
        const btnIcone = document.getElementById('btn-enviar-trabalhe-icone');
        const feedback = document.getElementById('feedback-trabalhe-conosco');
        const inputWhatsapp = document.getElementById('whatsapp');
        const inputCurriculo = document.getElementById('curriculo');

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

        const exibirFeedback = (mensagem, tipo = 'erro') => {
            feedback.classList.remove('hidden');

            if (tipo === 'sucesso') {
                feedback.style.backgroundColor = 'rgba(22, 163, 74, 0.1)';
                feedback.style.color = '#16a34a';
                feedback.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> ' + mensagem;
                return;
            }

            feedback.style.backgroundColor = 'rgba(220, 38, 38, 0.1)';
            feedback.style.color = '#dc2626';
            feedback.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> ' + mensagem;
        };

        if (formulario) {
            formulario.addEventListener('submit', (e) => {
                e.preventDefault();
                feedback.classList.add('hidden');

                const arquivo = inputCurriculo?.files?.[0];

                if (!arquivo) {
                    exibirFeedback('Anexe seu currículo em PDF para continuar.');
                    return;
                }

                const limiteBytes = 5 * 1024 * 1024;
                const nomeArquivo = arquivo.name.toLowerCase();
                const tipoValido = arquivo.type === 'application/pdf' || nomeArquivo.endsWith('.pdf');

                if (!tipoValido) {
                    exibirFeedback('Formato inválido. Envie apenas arquivo PDF.');
                    return;
                }

                if (arquivo.size > limiteBytes) {
                    exibirFeedback('Arquivo maior que 5MB. Reduza o tamanho do currículo e tente novamente.');
                    return;
                }

                btnEnviar.disabled = true;
                btnEnviar.style.opacity = '0.7';
                btnEnviar.style.cursor = 'not-allowed';
                btnTexto.textContent = 'Enviando...';
                btnIcone.className = 'fa-solid fa-spinner fa-spin text-sm';

                setTimeout(() => {
                    btnTexto.textContent = 'Currículo enviado!';
                    btnIcone.className = 'fa-solid fa-check text-sm';
                    btnEnviar.style.backgroundColor = '#16a34a';
                    btnEnviar.style.opacity = '1';

                    exibirFeedback('Currículo recebido com sucesso! Nosso time de recrutamento avaliará seu perfil.', 'sucesso');
                    formulario.reset();

                    setTimeout(() => {
                        btnEnviar.disabled = false;
                        btnEnviar.style.opacity = '1';
                        btnEnviar.style.cursor = 'pointer';
                        btnEnviar.style.backgroundColor = '#e21850';
                        btnTexto.textContent = 'Enviar candidatura';
                        btnIcone.className = 'fa-solid fa-paper-plane text-sm';
                    }, 5000);
                }, 2000);
            });
        }
    });
</script>
@endpush
