{{-- Página: Soluções --}}
@extends('admin.layout')

@section('titulo', 'Soluções')

@section('conteudo')
    <style>
        .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 24px; margin-bottom: 20px; }
        .admin-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .admin-input { width: 100%; padding: 10px 12px; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc; font-size: 14px; color: #1e293b; }
        .admin-textarea { min-height: 92px; resize: vertical; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 14px; }
        @media (min-width: 768px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } }
        .admin-btn { border: none; border-radius: 10px; padding: 10px 16px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .admin-btn-primary { background: #e21850; color: #fff; }
        .admin-btn-secondary { background: #f1f5f9; color: #475569; }
        .admin-btn-danger { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 16px; }
        .admin-alert-sucesso { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
        .admin-alert-erro { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        .item-box { border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px; margin-bottom: 10px; }
        .item-actions { display: flex; gap: 8px; margin-top: 10px; flex-wrap: wrap; }
        .badge { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 999px; background: rgba(226,24,80,0.12); color: #e21850; }
    </style>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:16px; flex-wrap:wrap;">
        <p style="font-size:13px; color:#64748b; margin:0;">Gerencie as categorias e cards da seção de soluções da home.</p>
        <div style="display:flex; gap:8px;">
            <button class="admin-btn admin-btn-secondary" type="button" onclick="abrirFormCategoria()">Nova categoria</button>
            <button class="admin-btn admin-btn-primary" type="button" onclick="abrirFormCard()">Novo card</button>
        </div>
    </div>

    <div id="formCategoria" class="admin-card" style="display:none;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <h3 id="tituloFormCategoria" style="margin:0; font-size:16px; color:#1e293b;">Nova categoria</h3>
            <button type="button" class="admin-btn admin-btn-secondary" onclick="fecharFormCategoria()">Fechar</button>
        </div>
        <form method="POST" action="{{ route('admin.solucoes.categorias.salvar') }}">
            @csrf
            <input type="hidden" name="id" id="categoriaIdInput" value="">
            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Nome</label>
                    <input class="admin-input" type="text" name="nome" id="categoriaNome" maxlength="120" required>
                </div>
                <div>
                    <label class="admin-label">Slug (opcional)</label>
                    <input class="admin-input" type="text" name="slug" id="categoriaSlug" maxlength="120">
                </div>
            </div>
            <div class="admin-grid admin-grid-2" style="margin-top:14px;">
                <div>
                    <label class="admin-label">Icone da categoria</label>
                    <select class="admin-input" name="icone_classe" id="categoriaIcone" required>
                        @foreach ($icones as $classe => $nome)
                            <option value="{{ $classe }}">{{ $nome }} ({{ $classe }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input class="admin-input" type="number" name="ordem" id="categoriaOrdem" min="0" max="9999" value="0" required>
                </div>
            </div>
            <div style="margin-top:14px; display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="ativo" id="categoriaAtivo" checked>
                <label for="categoriaAtivo" style="font-size:13px; color:#334155;">Categoria ativa</label>
            </div>
            <div style="margin-top:16px;"><button class="admin-btn admin-btn-primary" type="submit">Salvar categoria</button></div>
        </form>
    </div>

    <div id="formCard" class="admin-card" style="display:none;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <h3 id="tituloFormCard" style="margin:0; font-size:16px; color:#1e293b;">Novo card</h3>
            <button type="button" class="admin-btn admin-btn-secondary" onclick="fecharFormCard()">Fechar</button>
        </div>
        <form method="POST" action="{{ route('admin.solucoes.cards.salvar') }}">
            @csrf
            <input type="hidden" name="id" id="cardIdInput" value="">
            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Categoria</label>
                    <select class="admin-input" name="solucao_categoria_id" id="cardCategoria" required>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Titulo</label>
                    <input class="admin-input" type="text" name="titulo" id="cardTitulo" maxlength="160" required>
                </div>
            </div>
            <div style="margin-top:14px;">
                <label class="admin-label">Descricao</label>
                <textarea class="admin-input admin-textarea" name="descricao" id="cardDescricao" maxlength="1200" required></textarea>
            </div>
            <div class="admin-grid admin-grid-2" style="margin-top:14px;">
                <div>
                    <label class="admin-label">Icone do card</label>
                    <select class="admin-input" name="icone_classe" id="cardIcone" required>
                        @foreach ($icones as $classe => $nome)
                            <option value="{{ $classe }}">{{ $nome }} ({{ $classe }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input class="admin-input" type="number" name="ordem" id="cardOrdem" min="0" max="9999" value="0" required>
                </div>
            </div>
            <div style="margin-top:14px; display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="ativo" id="cardAtivo" checked>
                <label for="cardAtivo" style="font-size:13px; color:#334155;">Card ativo</label>
            </div>
            <div style="margin-top:16px;"><button class="admin-btn admin-btn-primary" type="submit">Salvar card</button></div>
        </form>
    </div>

    <div class="admin-card">
        <h3 style="margin:0 0 12px; font-size:16px; color:#1e293b;">Categorias e cards cadastrados</h3>
        @forelse ($categorias as $categoria)
            <div class="item-box">
                <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:10px; flex-wrap:wrap;">
                    <div>
                        <div class="badge"><i class="{{ $categoria->icone_classe ?: 'fa-solid fa-layer-group' }}"></i> {{ $categoria->nome }}</div>
                        <p style="margin:8px 0 0; font-size:12px; color:#64748b;">Slug: {{ $categoria->slug ?: '-' }} | Ordem: {{ $categoria->ordem }} | {{ $categoria->ativo ? 'Ativa' : 'Inativa' }}</p>
                    </div>
                    <div class="item-actions" style="margin-top:0;">
                        <button class="admin-btn admin-btn-secondary" type="button" onclick="editarCategoria({{ $categoria->id }})">Editar categoria</button>
                        <form method="POST" action="{{ route('admin.solucoes.categorias.excluir', $categoria->id) }}" onsubmit="return confirm('Excluir categoria e seus cards?')">
                            @csrf
                            @method('DELETE')
                            <button class="admin-btn admin-btn-danger" type="submit">Excluir categoria</button>
                        </form>
                    </div>
                </div>

                <div style="margin-top:12px; border-top:1px solid #e2e8f0; padding-top:12px;">
                    @forelse ($categoria->cards as $card)
                        <div class="item-box" style="background:#f8fafc; margin-bottom:8px;">
                            <p style="margin:0; font-weight:700; color:#1e293b;">{{ $card->titulo }}</p>
                            <p style="margin:6px 0 0; font-size:13px; color:#475569;">{{ $card->descricao }}</p>
                            <p style="margin:8px 0 0; font-size:12px; color:#64748b;">Icone: {{ $card->icone_classe }} | Ordem: {{ $card->ordem }} | {{ $card->ativo ? 'Ativo' : 'Inativo' }}</p>
                            <div class="item-actions">
                                <button class="admin-btn admin-btn-secondary" type="button" onclick="editarCard({{ $card->id }})">Editar card</button>
                                <form method="POST" action="{{ route('admin.solucoes.cards.excluir', $card->id) }}" onsubmit="return confirm('Excluir card?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="admin-btn admin-btn-danger" type="submit">Excluir card</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p style="font-size:13px; color:#94a3b8; margin:0;">Sem cards nessa categoria.</p>
                    @endforelse
                </div>
            </div>
        @empty
            <p style="margin:0; font-size:13px; color:#94a3b8;">Nenhuma categoria cadastrada.</p>
        @endforelse
    </div>

    <script>
        const categoriasData = @json($categorias->keyBy('id'));
        const cardsData = @json($categorias->flatMap(function ($categoria) {
            return $categoria->cards;
        })->keyBy('id'));

        function abrirFormCategoria() {
            document.getElementById('formCategoria').style.display = 'block';
            document.getElementById('formCategoria').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormCategoria() {
            document.getElementById('formCategoria').style.display = 'none';
        }

        function abrirFormCard() {
            document.getElementById('formCard').style.display = 'block';
            document.getElementById('formCard').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormCard() {
            document.getElementById('formCard').style.display = 'none';
        }

        function editarCategoria(id) {
            const categoria = categoriasData[id];
            if (!categoria) return;

            document.getElementById('tituloFormCategoria').textContent = 'Editar categoria';
            document.getElementById('categoriaIdInput').value = categoria.id;
            document.getElementById('categoriaNome').value = categoria.nome || '';
            document.getElementById('categoriaSlug').value = categoria.slug || '';
            document.getElementById('categoriaIcone').value = categoria.icone_classe || '';
            document.getElementById('categoriaOrdem').value = categoria.ordem || 0;
            document.getElementById('categoriaAtivo').checked = !!categoria.ativo;

            abrirFormCategoria();
        }

        function editarCard(id) {
            const card = cardsData[id];
            if (!card) return;

            document.getElementById('tituloFormCard').textContent = 'Editar card';
            document.getElementById('cardIdInput').value = card.id;
            document.getElementById('cardCategoria').value = card.solucao_categoria_id || '';
            document.getElementById('cardTitulo').value = card.titulo || '';
            document.getElementById('cardDescricao').value = card.descricao || '';
            document.getElementById('cardIcone').value = card.icone_classe || '';
            document.getElementById('cardOrdem').value = card.ordem || 0;
            document.getElementById('cardAtivo').checked = !!card.ativo;

            abrirFormCard();
        }
    </script>
@endsection
