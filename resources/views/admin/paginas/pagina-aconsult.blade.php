{{-- Página: Pág. Aconsult --}}
@extends('admin.layout')

@section('titulo', 'Pág. Aconsult')

@section('conteudo')
    <style>
        .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 28px; margin-bottom: 24px; }
        .admin-card-titulo { font-size: 18px; font-weight: 700; color: #1e293b; margin: 0 0 16px; }
        .admin-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .admin-input {
            width: 100%; padding: 10px 14px; background: #f8fafc; border: 1.5px solid #e2e8f0;
            border-radius: 10px; font-size: 14px; color: #1e293b; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s; font-family: inherit;
        }
        .admin-input:focus { border-color: #e21850; box-shadow: 0 0 0 3px rgba(226,24,80,0.08); }
        .admin-textarea { resize: vertical; min-height: 140px; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 768px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } .admin-grid-3 { grid-template-columns: 1fr 1fr 1fr; } }
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
            display: inline-flex; align-items: center; gap: 6px; padding: 6px 12px;
            background: none; color: #dc2626; font-weight: 600; font-size: 12px;
            border: 1.5px solid #fecaca; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-danger:hover { background-color: #dc2626; color: #fff; border-color: #dc2626; }
        .admin-btn-edit {
            display: inline-flex; align-items: center; gap: 4px; padding: 6px 12px;
            background: #f1f5f9; color: #475569; font-weight: 600; font-size: 12px;
            border: none; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-edit:hover { background-color: #e2e8f0; }
        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 20px; }
        .admin-alert-sucesso { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .admin-alert-erro { background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .admin-checkbox-wrap { display: flex; align-items: center; gap: 8px; }
        .admin-checkbox { width: 18px; height: 18px; accent-color: #e21850; cursor: pointer; }
        .admin-imagem-preview { width: 140px; aspect-ratio: 4/3; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0; }
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(230px, 1fr)); gap: 14px; }
        .card-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px; }
        .card-item-titulo { margin: 0 0 6px; font-size: 14px; font-weight: 700; color: #1e293b; }
        .card-item-texto { margin: 0 0 10px; font-size: 12px; color: #64748b; line-height: 1.45; }
        .card-item-meta { margin: 0 0 10px; font-size: 11px; color: #94a3b8; }
        .card-item-acoes { display: flex; gap: 6px; }
        .secao-titulo { margin: 22px 0 14px; font-size: 16px; font-weight: 700; color: #1e293b; }
    </style>

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie os conteúdos da página Aconsult: Quem Somos, Valores, Diferenciais e Missão.</p>
        <button type="button" class="admin-btn-outline" onclick="abrirFormCard()">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Novo card
        </button>
    </div>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif
    @if ($errors->any())
        <div class="admin-alert admin-alert-erro">{{ $errors->first() }}</div>
    @endif

    <div class="admin-card">
        <h3 class="admin-card-titulo">Seção Quem Somos</h3>
        <form action="{{ route('admin.pagina-aconsult.sobre.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-grid admin-grid-2" style="align-items: start;">
                <div>
                    <label class="admin-label">Imagem</label>
                    <input type="file" name="imagem" accept="image/*" class="admin-input" onchange="previewImagemSobre(this)">
                    <img id="sobrePreview" src="{{ !empty($sobre?->imagem) ? asset($sobre->imagem) : '' }}" class="admin-imagem-preview" style="margin-top: 8px; {{ !empty($sobre?->imagem) ? '' : 'display:none;' }}">
                </div>
                <div>
                    <label class="admin-label">Número de estados atendidos</label>
                    <input type="number" name="estados_atendidos" class="admin-input" min="0" max="999" value="{{ old('estados_atendidos', $sobre?->estados_atendidos ?? 10) }}" required>
                </div>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Texto da seção (sem título)</label>
                <textarea name="texto" class="admin-input admin-textarea" required>{{ old('texto', $sobre?->texto ?? '') }}</textarea>
                <p style="margin: 8px 0 0; font-size: 12px; color: #94a3b8;">Cada parágrafo pode ser separado por uma linha em branco.</p>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="admin-btn-salvar">Salvar Quem Somos</button>
            </div>
        </form>
    </div>

    <div id="formCard" class="admin-card" style="display: none;">
        <h3 class="admin-card-titulo" id="formCardTitulo">Novo Card</h3>
        <form action="{{ route('admin.pagina-aconsult.cards.salvar') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="cardIdInput" value="">

            <div class="admin-grid admin-grid-3">
                <div>
                    <label class="admin-label">Seção</label>
                    <select name="tipo" id="cardTipo" class="admin-input" required>
                        <option value="valor">Valores</option>
                        <option value="diferencial">Diferenciais</option>
                        <option value="missao">Missão</option>
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ícone</label>
                    <select name="icone_classe" id="cardIcone" class="admin-input" required>
                        @foreach ($iconesAconsult as $classe => $nome)
                            <option value="{{ $classe }}">{{ $nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input type="number" name="ordem" id="cardOrdem" class="admin-input" min="0" value="1" required>
                </div>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                <div>
                    <label class="admin-label">Título</label>
                    <input type="text" name="titulo" id="cardTitulo" class="admin-input" maxlength="160" required>
                </div>
                <div>
                    <div class="admin-checkbox-wrap" style="margin-top: 30px;">
                        <input type="checkbox" name="ativo" id="cardAtivo" class="admin-checkbox" checked>
                        <label for="cardAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Card ativo</label>
                    </div>
                </div>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Texto</label>
                <textarea name="texto" id="cardTexto" class="admin-input admin-textarea" maxlength="1500" required></textarea>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 10px;">
                <button type="submit" class="admin-btn-salvar">Salvar card</button>
                <button type="button" class="admin-btn-outline" onclick="fecharFormCard()">Cancelar</button>
            </div>
        </form>
    </div>

    @php
        $grupos = [
            'Valores' => $valores,
            'Diferenciais' => $diferenciais,
            'Missão' => $missoes,
        ];
    @endphp

    @foreach ($grupos as $nomeGrupo => $cards)
        <h4 class="secao-titulo">{{ $nomeGrupo }}</h4>
        @if ($cards->count())
            <div class="cards-grid">
                @foreach ($cards as $card)
                    <div class="card-item">
                        <p class="card-item-titulo">{{ $card->titulo }}</p>
                        <p class="card-item-texto">{{ \Illuminate\Support\Str::limit($card->texto, 140) }}</p>
                        <p class="card-item-meta">Ícone: {{ $card->icone_classe }} | Ordem: {{ $card->ordem }} | {{ $card->ativo ? 'Ativo' : 'Inativo' }}</p>
                        <div class="card-item-acoes">
                            <button type="button" class="admin-btn-edit" onclick='editarCard(@json($card))'>Editar</button>
                            <form action="{{ route('admin.pagina-aconsult.cards.excluir', $card->id) }}" method="POST" onsubmit="return confirm('Excluir este card?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="admin-card" style="padding: 20px;">
                <p style="margin: 0; color: #94a3b8; font-size: 13px;">Nenhum card cadastrado nesta seção.</p>
            </div>
        @endif
    @endforeach

    <script>
        function previewImagemSobre(input) {
            const preview = document.getElementById('sobrePreview');
            if (!input.files || !input.files[0]) {
                preview.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }

        function abrirFormCard() {
            const form = document.getElementById('formCard');
            form.style.display = 'block';
            document.getElementById('formCardTitulo').textContent = 'Novo Card';
            document.getElementById('cardIdInput').value = '';
            document.getElementById('cardTipo').value = 'valor';
            document.getElementById('cardIcone').selectedIndex = 0;
            document.getElementById('cardOrdem').value = '1';
            document.getElementById('cardTitulo').value = '';
            document.getElementById('cardTexto').value = '';
            document.getElementById('cardAtivo').checked = true;
            form.scrollIntoView({ behavior: 'smooth' });
        }

        function editarCard(card) {
            const form = document.getElementById('formCard');
            form.style.display = 'block';
            document.getElementById('formCardTitulo').textContent = 'Editar Card';
            document.getElementById('cardIdInput').value = card.id;
            document.getElementById('cardTipo').value = card.tipo || 'valor';
            document.getElementById('cardIcone').value = card.icone_classe || '';
            document.getElementById('cardOrdem').value = card.ordem || 0;
            document.getElementById('cardTitulo').value = card.titulo || '';
            document.getElementById('cardTexto').value = card.texto || '';
            document.getElementById('cardAtivo').checked = Boolean(card.ativo);
            form.scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormCard() {
            document.getElementById('formCard').style.display = 'none';
        }

        @if ($errors->any() || session('erro'))
            document.getElementById('formCard').style.display = 'block';
        @endif
    </script>
@endsection
