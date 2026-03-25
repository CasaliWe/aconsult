{{-- Página: Avaliações --}}
@extends('admin.layout')

@section('titulo', 'Avaliações')

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
        .admin-textarea { resize: vertical; min-height: 110px; }
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

        .item-avaliacao {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            padding: 18px; margin-bottom: 14px;
        }
        .item-topo { display: flex; justify-content: space-between; gap: 12px; align-items: flex-start; }
        .item-nome { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .item-cargo { font-size: 12px; color: #64748b; margin: 0; }
        .item-texto { font-size: 13px; color: #334155; line-height: 1.65; margin: 10px 0 0; }
        .item-meta { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; margin-top: 10px; }
        .item-badge { font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; background: rgba(226,24,80,0.12); color: #e21850; }
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
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie os depoimentos exibidos na home do site</p>
        <button type="button" class="admin-btn-outline" onclick="abrirNovaAvaliacao()">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Nova avaliação
        </button>
    </div>

    <div id="formAvaliacao" class="admin-card" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formAvaliacaoTitulo">Nova avaliação</h3>
            <button type="button" onclick="fecharFormAvaliacao()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('admin.avaliacoes.salvar') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="avaliacaoIdInput" value="">

            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Nome do cliente</label>
                    <input type="text" name="nome" id="avaliacaoNome" class="admin-input" maxlength="120" required>
                </div>
                <div>
                    <label class="admin-label">Cargo/Empresa</label>
                    <input type="text" name="cargo_empresa" id="avaliacaoCargo" class="admin-input" maxlength="160" placeholder="Ex: CEO - Empresa X">
                </div>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Depoimento</label>
                <textarea name="texto" id="avaliacaoTexto" class="admin-input admin-textarea" maxlength="3000" required></textarea>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                <div>
                    <label class="admin-label">Nota</label>
                    <select name="nota" id="avaliacaoNota" class="admin-input" required>
                        <option value="5">5 estrelas</option>
                        <option value="4">4 estrelas</option>
                        <option value="3">3 estrelas</option>
                        <option value="2">2 estrelas</option>
                        <option value="1">1 estrela</option>
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input type="number" name="ordem" id="avaliacaoOrdem" class="admin-input" min="0" max="9999" value="0" required>
                </div>
            </div>

            <div style="margin-top: 16px;">
                <div class="admin-checkbox-wrap">
                    <input type="checkbox" name="ativo" id="avaliacaoAtivo" class="admin-checkbox" checked>
                    <label for="avaliacaoAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Avaliação ativa</label>
                </div>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar avaliação
                </button>
            </div>
        </form>
    </div>

    @forelse($avaliacoes as $avaliacao)
        <div class="item-avaliacao">
            <div class="item-topo">
                <div>
                    <p class="item-nome">{{ $avaliacao->nome }}</p>
                    <p class="item-cargo">{{ $avaliacao->cargo_empresa ?: 'Sem cargo/empresa informado' }}</p>
                </div>
            </div>

            <p class="item-texto">"{{ $avaliacao->texto }}"</p>

            <div class="item-meta">
                <span class="item-badge">{{ $avaliacao->nota }} estrela(s)</span>
                <span style="font-size: 12px; color: #94a3b8;">Ordem: {{ $avaliacao->ordem }}</span>
                <span style="font-size: 12px; color: {{ $avaliacao->ativo ? '#166534' : '#dc2626' }};">{{ $avaliacao->ativo ? 'Ativa' : 'Inativa' }}</span>
            </div>

            <div class="item-acoes">
                <button type="button" class="admin-btn-edit" onclick="editarAvaliacao({{ $avaliacao->id }})">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Editar
                </button>
                <form action="{{ route('admin.avaliacoes.excluir', $avaliacao->id) }}" method="POST" onsubmit="return confirm('Excluir esta avaliação?')">
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
            <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhuma avaliação cadastrada.</p>
        </div>
    @endforelse

    <script>
        const avaliacoesData = @json($avaliacoes->keyBy('id'));

        function resetarFormAvaliacao() {
            document.getElementById('formAvaliacaoTitulo').textContent = 'Nova avaliação';
            document.getElementById('avaliacaoIdInput').value = '';
            document.getElementById('avaliacaoNome').value = '';
            document.getElementById('avaliacaoCargo').value = '';
            document.getElementById('avaliacaoTexto').value = '';
            document.getElementById('avaliacaoNota').value = '5';
            document.getElementById('avaliacaoOrdem').value = '0';
            document.getElementById('avaliacaoAtivo').checked = true;
        }

        function abrirNovaAvaliacao() {
            resetarFormAvaliacao();
            document.getElementById('formAvaliacao').style.display = 'block';
            document.getElementById('formAvaliacao').scrollIntoView({ behavior: 'smooth' });
        }

        function editarAvaliacao(id) {
            resetarFormAvaliacao();

            const avaliacao = avaliacoesData[id];
            if (!avaliacao) return;

            document.getElementById('formAvaliacao').style.display = 'block';
            document.getElementById('formAvaliacaoTitulo').textContent = 'Editar avaliação';
            document.getElementById('avaliacaoIdInput').value = avaliacao.id;
            document.getElementById('avaliacaoNome').value = avaliacao.nome || '';
            document.getElementById('avaliacaoCargo').value = avaliacao.cargo_empresa || '';
            document.getElementById('avaliacaoTexto').value = avaliacao.texto || '';
            document.getElementById('avaliacaoNota').value = avaliacao.nota || 5;
            document.getElementById('avaliacaoOrdem').value = avaliacao.ordem || 0;
            document.getElementById('avaliacaoAtivo').checked = !!avaliacao.ativo;

            document.getElementById('formAvaliacao').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormAvaliacao() {
            document.getElementById('formAvaliacao').style.display = 'none';
        }
    </script>
@endsection
