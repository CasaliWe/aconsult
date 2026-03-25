{{-- Página: Perguntas Frequentes --}}
@extends('admin.layout')

@section('titulo', 'Perguntas Frequentes')

@section('conteudo')
    <style>
        .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 28px; margin-bottom: 24px; }
        .admin-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .admin-input {
            width: 100%; padding: 10px 14px; background: #f8fafc; border: 1.5px solid #e2e8f0;
            border-radius: 10px; font-size: 14px; color: #1e293b; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s; font-family: inherit;
        }
        .admin-input:focus { border-color: #e21850; box-shadow: 0 0 0 3px rgba(226,24,80,0.08); }
        .admin-textarea { resize: vertical; min-height: 130px; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 768px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } }

        .admin-btn-salvar {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px;
            background-color: #e21850; color: #fff; font-weight: 700; font-size: 14px;
            border: none; border-radius: 10px; cursor: pointer; transition: background-color 0.2s;
        }
        .admin-btn-salvar:hover { background-color: #c91545; }

        .admin-btn-outline {
            display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px;
            background: none; color: #e21850; font-weight: 600; font-size: 14px;
            border: 1.5px solid #e21850; border-radius: 10px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-outline:hover { background-color: #e21850; color: #fff; }

        .admin-btn-danger {
            display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px;
            background: none; color: #dc2626; font-weight: 600; font-size: 13px;
            border: 1.5px solid #fecaca; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-danger:hover { background-color: #dc2626; color: #fff; border-color: #dc2626; }

        .admin-btn-edit {
            display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px;
            background: #f1f5f9; color: #475569; font-weight: 600; font-size: 13px;
            border: none; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-edit:hover { background-color: #e2e8f0; }

        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 20px; }
        .admin-alert-sucesso { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .admin-alert-erro { background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }

        .item-faq {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            padding: 18px; margin-bottom: 14px;
        }
        .item-pergunta { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 8px; }
        .item-resposta { font-size: 13px; color: #334155; line-height: 1.65; margin: 0; }
        .item-meta { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; margin-top: 12px; }
        .item-acoes { display: flex; gap: 8px; margin-top: 12px; }

        .admin-checkbox-wrap { display: flex; align-items: center; gap: 8px; }
        .admin-checkbox { width: 18px; height: 18px; accent-color: #e21850; cursor: pointer; }
    </style>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie as perguntas e respostas exibidas na home do site</p>
        <button type="button" class="admin-btn-outline" onclick="abrirNovoFaq()">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Nova pergunta
        </button>
    </div>

    <div id="formFaq" class="admin-card" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formFaqTitulo">Nova pergunta</h3>
            <button type="button" onclick="fecharFormFaq()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('admin.faq.salvar') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="faqIdInput" value="">

            <div>
                <label class="admin-label">Pergunta</label>
                <input type="text" name="pergunta" id="faqPergunta" class="admin-input" maxlength="220" required>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Resposta</label>
                <textarea name="resposta" id="faqResposta" class="admin-input admin-textarea" maxlength="5000" required></textarea>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                <div>
                    <label class="admin-label">Ordem</label>
                    <input type="number" name="ordem" id="faqOrdem" class="admin-input" min="0" max="9999" value="0" required>
                </div>
                <div>
                    <label class="admin-label">Status</label>
                    <div class="admin-checkbox-wrap" style="margin-top: 12px;">
                        <input type="checkbox" name="ativo" id="faqAtivo" class="admin-checkbox" checked>
                        <label for="faqAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Pergunta ativa</label>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar pergunta
                </button>
            </div>
        </form>
    </div>

    @forelse($faqItens as $faq)
        <div class="item-faq">
            <p class="item-pergunta">{{ $faq->pergunta }}</p>
            <p class="item-resposta">{{ $faq->resposta }}</p>

            <div class="item-meta">
                <span style="font-size: 12px; color: #94a3b8;">Ordem: {{ $faq->ordem }}</span>
                <span style="font-size: 12px; color: {{ $faq->ativo ? '#166534' : '#dc2626' }};">{{ $faq->ativo ? 'Ativa' : 'Inativa' }}</span>
            </div>

            <div class="item-acoes">
                <button type="button" class="admin-btn-edit" onclick="editarFaq({{ $faq->id }})">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Editar
                </button>
                <form action="{{ route('admin.faq.excluir', $faq->id) }}" method="POST" onsubmit="return confirm('Excluir esta pergunta?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="admin-card" style="text-align: center; padding: 40px;">
            <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhum item de FAQ cadastrado.</p>
        </div>
    @endforelse

    <script>
        const faqData = @json($faqItens->keyBy('id'));

        function resetarFormFaq() {
            document.getElementById('formFaqTitulo').textContent = 'Nova pergunta';
            document.getElementById('faqIdInput').value = '';
            document.getElementById('faqPergunta').value = '';
            document.getElementById('faqResposta').value = '';
            document.getElementById('faqOrdem').value = '0';
            document.getElementById('faqAtivo').checked = true;
        }

        function abrirNovoFaq() {
            resetarFormFaq();
            document.getElementById('formFaq').style.display = 'block';
            document.getElementById('formFaq').scrollIntoView({ behavior: 'smooth' });
        }

        function editarFaq(id) {
            resetarFormFaq();

            const faq = faqData[id];
            if (!faq) return;

            document.getElementById('formFaq').style.display = 'block';
            document.getElementById('formFaqTitulo').textContent = 'Editar pergunta';
            document.getElementById('faqIdInput').value = faq.id;
            document.getElementById('faqPergunta').value = faq.pergunta || '';
            document.getElementById('faqResposta').value = faq.resposta || '';
            document.getElementById('faqOrdem').value = faq.ordem || 0;
            document.getElementById('faqAtivo').checked = !!faq.ativo;

            document.getElementById('formFaq').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormFaq() {
            document.getElementById('formFaq').style.display = 'none';
        }
    </script>
@endsection
