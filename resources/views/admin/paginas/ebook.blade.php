{{-- Página: Ebook --}}
@extends('admin.layout')

@section('titulo', 'Ebook')

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
        .admin-modal-backdrop { position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(2px); display: none; align-items: center; justify-content: center; padding: 16px; z-index: 1200; }
        .admin-modal-card { background: #fff; width: min(1100px, 100%); max-height: 90vh; border-radius: 14px; border: 1px solid #e2e8f0; padding: 18px; overflow: auto; }
        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th, .admin-table td { border-bottom: 1px solid #e2e8f0; text-align: left; font-size: 12px; padding: 9px 8px; color: #334155; vertical-align: top; }
        .admin-table th { font-weight: 700; color: #0f172a; background: #f8fafc; position: sticky; top: 0; z-index: 1; }
    </style>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:16px; flex-wrap:wrap;">
        <p style="font-size:13px; color:#64748b; margin:0;">Gerencie os cards da página de ebook.</p>
        <div style="display:flex; gap:8px; flex-wrap:wrap;">
            <button class="admin-btn admin-btn-secondary" type="button" onclick="abrirModalLeadsEbook()">Ver contatos que baixaram</button>
            <button class="admin-btn admin-btn-primary" type="button" onclick="abrirFormEbook()">Novo card de ebook</button>
        </div>
    </div>

    <div class="admin-card">
        <h3 style="margin:0 0 12px; font-size:16px; color:#1e293b;">Notificação de leads por e-mail</h3>
        <p style="margin:0 0 12px; font-size:13px; color:#64748b;">Cada novo download de ebook envia um e-mail com os dados captados para este endereço.</p>
        <form method="POST" action="{{ route('admin.ebook.configuracoes.salvar') }}" class="admin-grid admin-grid-2" style="align-items:end;">
            @csrf
            <div>
                <label class="admin-label">E-mail para receber notificações</label>
                <input class="admin-input" type="email" name="email_notificacao_ebook" maxlength="180" required value="{{ old('email_notificacao_ebook', $configuracao->email_notificacao_ebook ?? $configuracao->email ?? '') }}">
            </div>
            <div>
                <button class="admin-btn admin-btn-primary" type="submit">Salvar e-mail de notificação</button>
            </div>
        </form>
    </div>

    <div id="formEbook" class="admin-card" style="display:none;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <h3 id="tituloFormEbook" style="margin:0; font-size:16px; color:#1e293b;">Novo card de ebook</h3>
            <button type="button" class="admin-btn admin-btn-secondary" onclick="fecharFormEbook()">Fechar</button>
        </div>
        <form method="POST" action="{{ route('admin.ebook.cards.salvar') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="ebookIdInput" value="">

            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Categoria</label>
                    <input class="admin-input" type="text" name="categoria" id="ebookCategoria" maxlength="100" required>
                </div>
                <div>
                    <label class="admin-label">Titulo do card</label>
                    <input class="admin-input" type="text" name="titulo" id="ebookTitulo" maxlength="200" required>
                </div>
            </div>

            <div style="margin-top:14px;">
                <label class="admin-label">Descricao</label>
                <textarea class="admin-input admin-textarea" name="descricao" id="ebookDescricao" maxlength="1200" required></textarea>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top:14px;">
                <div>
                    <label class="admin-label">Titulo da capa</label>
                    <input class="admin-input" type="text" name="capa_titulo" id="ebookCapaTitulo" maxlength="120" required>
                </div>
                <div>
                    <label class="admin-label">Subtitulo da capa</label>
                    <input class="admin-input" type="text" name="capa_subtitulo" id="ebookCapaSubtitulo" maxlength="120">
                </div>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top:14px;">
                <div>
                    <label class="admin-label">Icone</label>
                    <select class="admin-input" name="icone_classe" id="ebookIcone" required>
                        @foreach ($icones as $classe => $nome)
                            <option value="{{ $classe }}">{{ $nome }} ({{ $classe }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input class="admin-input" type="number" name="ordem" id="ebookOrdem" min="0" max="9999" value="0" required>
                </div>
            </div>

            <div style="margin-top:14px;">
                <label class="admin-label">Arquivo do ebook (PDF, ZIP, DOC, DOCX, PPT, PPTX, XLS, XLSX)</label>
                <input class="admin-input" type="file" name="arquivo_ebook" id="ebookArquivo" accept=".pdf,.zip,.doc,.docx,.ppt,.pptx,.xls,.xlsx">
                <p id="ebookArquivoAtual" style="margin:8px 0 0; font-size:12px; color:#64748b;">Ao criar um novo card, o arquivo e obrigatorio.</p>
            </div>

            <div style="margin-top:14px; display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="ativo" id="ebookAtivo" checked>
                <label for="ebookAtivo" style="font-size:13px; color:#334155;">Card ativo</label>
            </div>

            <div style="margin-top:16px;"><button class="admin-btn admin-btn-primary" type="submit">Salvar card</button></div>
        </form>
    </div>

    <div class="admin-card">
        <h3 style="margin:0 0 12px; font-size:16px; color:#1e293b;">Cards cadastrados</h3>
        @forelse ($ebookCards as $card)
            <div class="item-box">
                <div class="badge"><i class="{{ $card->icone_classe ?: 'fa-solid fa-book-open' }}"></i> {{ $card->categoria }}</div>
                <p style="margin:8px 0 0; font-weight:700; color:#1e293b;">{{ $card->titulo }}</p>
                <p style="margin:6px 0 0; font-size:13px; color:#475569;">{{ $card->descricao }}</p>
                <p style="margin:8px 0 0; font-size:12px; color:#64748b;">Capa: {{ $card->capa_titulo }} {{ $card->capa_subtitulo ? '(' . $card->capa_subtitulo . ')' : '' }} | Ordem: {{ $card->ordem }} | {{ $card->ativo ? 'Ativo' : 'Inativo' }}</p>
                <p style="margin:6px 0 0; font-size:12px; color:#64748b;">Arquivo: {{ $card->arquivo_ebook ? $card->arquivo_ebook : 'Nao informado' }} | Leads: {{ $card->downloads_count ?? 0 }}</p>
                <div class="item-actions">
                    <button class="admin-btn admin-btn-secondary" type="button" onclick="editarEbookCard({{ $card->id }})">Editar</button>
                    <form method="POST" action="{{ route('admin.ebook.cards.excluir', $card->id) }}" onsubmit="return confirm('Excluir card de ebook?')">
                        @csrf
                        @method('DELETE')
                        <button class="admin-btn admin-btn-danger" type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="margin:0; font-size:13px; color:#94a3b8;">Nenhum card de ebook cadastrado.</p>
        @endforelse
    </div>

    <div id="modalLeadsEbook" class="admin-modal-backdrop" onclick="if(event.target === this) fecharModalLeadsEbook()">
        <div class="admin-modal-card">
            <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-bottom:12px;">
                <h3 style="margin:0; font-size:16px; color:#0f172a;">Contatos que baixaram ebooks</h3>
                <button type="button" class="admin-btn admin-btn-secondary" onclick="fecharModalLeadsEbook()">Fechar</button>
            </div>

            @if ($ebookDownloads->isEmpty())
                <p style="margin:0; font-size:13px; color:#64748b;">Nenhum contato captado ate o momento.</p>
            @else
                <div style="overflow:auto; border:1px solid #e2e8f0; border-radius:10px;">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th style="min-width:150px;">Data</th>
                                <th style="min-width:180px;">Ebook</th>
                                <th style="min-width:160px;">Nome</th>
                                <th style="min-width:190px;">E-mail</th>
                                <th style="min-width:140px;">WhatsApp</th>
                                <th style="min-width:140px;">IP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ebookDownloads as $lead)
                                <tr>
                                    <td>{{ $lead->created_at ? $lead->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td>{{ $lead->ebookCard->titulo ?? 'Ebook removido' }}</td>
                                    <td>{{ $lead->nome }}</td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->whatsapp ?: '-' }}</td>
                                    <td>{{ $lead->ip ?: '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script>
        const ebookCardsData = @json($ebookCards->keyBy('id'));

        function abrirFormEbook() {
            if (!document.getElementById('ebookIdInput').value) {
                document.getElementById('tituloFormEbook').textContent = 'Novo card de ebook';
                document.getElementById('ebookArquivoAtual').textContent = 'Ao criar um novo card, o arquivo e obrigatorio.';
            }
            document.getElementById('formEbook').style.display = 'block';
            document.getElementById('formEbook').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormEbook() {
            document.getElementById('formEbook').style.display = 'none';
            document.getElementById('tituloFormEbook').textContent = 'Novo card de ebook';
            document.getElementById('ebookIdInput').value = '';
            document.getElementById('ebookCategoria').value = '';
            document.getElementById('ebookTitulo').value = '';
            document.getElementById('ebookDescricao').value = '';
            document.getElementById('ebookCapaTitulo').value = '';
            document.getElementById('ebookCapaSubtitulo').value = '';
            document.getElementById('ebookIcone').selectedIndex = 0;
            document.getElementById('ebookOrdem').value = 0;
            document.getElementById('ebookAtivo').checked = true;
            document.getElementById('ebookArquivo').value = '';
            document.getElementById('ebookArquivoAtual').textContent = 'Ao criar um novo card, o arquivo e obrigatorio.';
        }

        function editarEbookCard(id) {
            const card = ebookCardsData[id];
            if (!card) return;

            document.getElementById('tituloFormEbook').textContent = 'Editar card de ebook';
            document.getElementById('ebookIdInput').value = card.id;
            document.getElementById('ebookCategoria').value = card.categoria || '';
            document.getElementById('ebookTitulo').value = card.titulo || '';
            document.getElementById('ebookDescricao').value = card.descricao || '';
            document.getElementById('ebookCapaTitulo').value = card.capa_titulo || '';
            document.getElementById('ebookCapaSubtitulo').value = card.capa_subtitulo || '';
            document.getElementById('ebookIcone').value = card.icone_classe || '';
            document.getElementById('ebookOrdem').value = card.ordem || 0;
            document.getElementById('ebookAtivo').checked = !!card.ativo;
            document.getElementById('ebookArquivo').value = '';

            const arquivoAtual = document.getElementById('ebookArquivoAtual');
            if (card.arquivo_ebook) {
                arquivoAtual.textContent = 'Arquivo atual: ' + card.arquivo_ebook + ' | Envie outro arquivo para substituir.';
            } else {
                arquivoAtual.textContent = 'Nenhum arquivo enviado ainda. Este card nao permitira download ate ter arquivo.';
            }

            abrirFormEbook();
        }

        function abrirModalLeadsEbook() {
            document.getElementById('modalLeadsEbook').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function fecharModalLeadsEbook() {
            document.getElementById('modalLeadsEbook').style.display = 'none';
            document.body.style.overflow = '';
        }
    </script>
@endsection
