{{-- Página: Pág. Soluções --}}
@extends('admin.layout')

@section('titulo', 'Pág. Soluções')

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
        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 20px; }
        .admin-alert-sucesso { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .admin-alert-erro { background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .admin-btn-salvar {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px;
            background-color: #e21850; color: #fff; font-weight: 700; font-size: 14px;
            border: none; border-radius: 10px; cursor: pointer; transition: background-color 0.2s;
        }
        .admin-btn-salvar:hover { background-color: #c91545; }
        .admin-btn-outline {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px;
            background: #fff; color: #e21850; font-weight: 700; font-size: 14px;
            border: 1.5px solid #e21850; border-radius: 10px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-outline:hover { background: #e21850; color: #fff; }
        .admin-btn-danger {
            display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px;
            background: #fff; color: #dc2626; font-weight: 700; font-size: 12px;
            border: 1px solid #fecaca; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-danger:hover { background: #dc2626; color: #fff; border-color: #dc2626; }
        .admin-grid { display: grid; gap: 14px; }
        .admin-grid-2 { grid-template-columns: 1fr 1fr; }
        @media (max-width: 920px) { .admin-grid-2 { grid-template-columns: 1fr; } }
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px; }
        .item-card { border: 1px solid #e2e8f0; border-radius: 10px; background: #fff; padding: 14px; }
        .item-card h4 { margin: 0 0 6px; font-size: 14px; font-weight: 700; color: #1e293b; }
        .item-card p { margin: 0; font-size: 12px; color: #64748b; }
        .item-card .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            border-radius: 999px;
            padding: 4px 10px;
            margin-top: 8px;
        }
        .tag-ativo { background: #ecfdf3; color: #166534; }
        .tag-inativo { background: #fef2f2; color: #b91c1c; }
    </style>

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Cadastre quantas soluções quiser para aparecer no menu do site, com ícone, mini descrição, dados do banner e conteúdo principal.</p>
        <button type="button" class="admin-btn-outline" onclick="prepararNovaSolucao()">Nova solução</button>
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
        <form id="formPaginaSolucoes" action="{{ route('admin.pagina-solucoes.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="solucaoId" value="{{ old('id') }}">

            <div class="admin-grid admin-grid-2" style="margin-bottom: 16px;">
                <div>
                    <label class="admin-label">Slug da URL (ex: industrias-distribuidores)</label>
                    <input type="text" id="tipoSolucao" name="tipo" value="{{ old('tipo') }}" class="admin-input" required placeholder="somente letras minusculas, numeros e -">
                </div>
                <div>
                    <label class="admin-label">Título no dropdown/menu</label>
                    <input type="text" id="nomeMenuSolucao" name="nome_menu" value="{{ old('nome_menu') }}" class="admin-input" required placeholder="Soluções para Empresas">
                </div>
                <div>
                    <label class="admin-label">Mini descrição no dropdown</label>
                    <input type="text" id="miniDescricaoSolucao" name="mini_descricao" value="{{ old('mini_descricao') }}" class="admin-input" required placeholder="Tributação e contabilidade">
                </div>
                <div>
                    <label class="admin-label">Ícone (dropdown/menu)</label>
                    <select id="iconeSolucao" name="icone_classe" class="admin-input" required>
                        @foreach ($icones as $classe => $nome)
                            <option value="{{ $classe }}" @selected(old('icone_classe') === $classe)>{{ $nome }} ({{ $classe }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="admin-label">Breadcrumb</label>
                    <input type="text" id="breadcrumbSolucao" name="breadcrumb" value="{{ old('breadcrumb') }}" class="admin-input" placeholder="Empresas">
                </div>
                <div>
                    <label class="admin-label">Ordem no menu</label>
                    <input type="number" id="ordemSolucao" name="ordem" value="{{ old('ordem', ($solucoesPagina->max('ordem') ?? 0) + 1) }}" class="admin-input" min="0" required>
                </div>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-bottom: 16px;">
                <div>
                    <label class="admin-label">Banner - Super título</label>
                    <input type="text" id="bannerSuperTitulo" name="banner_super_titulo" value="{{ old('banner_super_titulo') }}" class="admin-input" placeholder="Empresas">
                </div>
                <div>
                    <label class="admin-label">Banner - Título (aceita HTML)</label>
                    <input type="text" id="bannerTitulo" name="banner_titulo" value="{{ old('banner_titulo') }}" class="admin-input" placeholder="Soluções para <span style='color:#e21850;'>empresas</span>">
                </div>
                <div>
                    <label class="admin-label">Banner - Mini descrição</label>
                    <input type="text" id="bannerDescricao" name="banner_descricao" value="{{ old('banner_descricao') }}" class="admin-input" placeholder="Texto exibido acima da imagem">
                </div>
                <div>
                    <label class="admin-label">Banner - Imagem (opcional)</label>
                    <input type="file" id="bannerImagem" name="banner_imagem" class="admin-input" accept="image/*">
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:flex;align-items:center;gap:8px;font-size:13px;color:#374151;font-weight:600;">
                    <input type="checkbox" id="ativoSolucao" name="ativo" value="1" style="accent-color:#e21850;" @checked(old('ativo', true))>
                    Solução ativa no menu e no site
                </label>
            </div>

            <div style="margin-bottom: 10px;">
                <label class="admin-label">Conteúdo principal (editor completo)</label>
                <textarea id="conteudoSolucao" name="conteudo_html">{{ old('conteudo_html') }}</textarea>
            </div>

            <p style="margin: 0 0 18px; font-size: 12px; color: #94a3b8;">Voce pode alterar texto, tamanho de fonte, alinhamento, listas, links, tabelas e cores.</p>

            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <button type="submit" class="admin-btn-salvar" id="btnSalvarSolucao">Salvar solução</button>
                <button type="button" class="admin-btn-outline" onclick="prepararNovaSolucao()">Limpar formulário</button>
            </div>
        </form>
    </div>

    <div class="cards-grid">
        @foreach ($solucoesPagina as $item)
            <div class="item-card">
                <h4>{{ $item->nome_menu ?: 'Sem título' }}</h4>
                <p>URL pública: /solucoes/{{ $item->tipo }}</p>
                <p style="margin-top: 5px;">Mini descrição: {{ $item->mini_descricao ?: 'Sem descrição' }}</p>
                <p style="margin-top: 5px;">Ultima atualizacao: {{ $item->updated_at?->format('d/m/Y H:i') ?? 'Sem edicao' }}</p>
                <span class="tag {{ $item->ativo ? 'tag-ativo' : 'tag-inativo' }}">{{ $item->ativo ? 'Ativo' : 'Inativo' }}</span>

                <div style="display:flex; gap:8px; margin-top:12px;">
                    <button type="button" class="admin-btn-outline" style="padding:8px 12px;font-size:12px;" onclick='editarSolucao(@json($item))'>Editar</button>
                    <form method="POST" action="{{ route('admin.pagina-solucoes.excluir', $item->id) }}" onsubmit="return confirm('Excluir esta solução?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="admin-btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        function setConteudoEditor(conteudo) {
            const editor = window.tinymce.get('conteudoSolucao');
            if (!editor) {
                return;
            }

            editor.setContent(conteudo || '');
        }

        function initEditorSolucoes() {
            if (window.tinymce.get('conteudoSolucao')) {
                return;
            }

            tinymce.init({
                selector: '#conteudoSolucao',
                height: 480,
                menubar: false,
                plugins: 'lists link table code fullscreen charmap preview autoresize',
                toolbar: 'undo redo | blocks fontsize bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table | preview fullscreen code',
                branding: false,
                language: 'pt_BR',
            });
        }

        function prepararNovaSolucao() {
            document.getElementById('solucaoId').value = '';
            document.getElementById('tipoSolucao').value = '';
            document.getElementById('nomeMenuSolucao').value = '';
            document.getElementById('miniDescricaoSolucao').value = '';
            document.getElementById('breadcrumbSolucao').value = '';
            document.getElementById('bannerSuperTitulo').value = '';
            document.getElementById('bannerTitulo').value = '';
            document.getElementById('bannerDescricao').value = '';
            document.getElementById('bannerImagem').value = '';
            document.getElementById('ativoSolucao').checked = true;
            document.getElementById('ordemSolucao').value = '{{ ($solucoesPagina->max('ordem') ?? 0) + 1 }}';
            document.getElementById('btnSalvarSolucao').textContent = 'Salvar solução';
            setConteudoEditor('');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function editarSolucao(item) {
            document.getElementById('solucaoId').value = item.id || '';
            document.getElementById('tipoSolucao').value = item.tipo || '';
            document.getElementById('nomeMenuSolucao').value = item.nome_menu || '';
            document.getElementById('miniDescricaoSolucao').value = item.mini_descricao || '';
            document.getElementById('breadcrumbSolucao').value = item.breadcrumb || '';
            document.getElementById('bannerSuperTitulo').value = item.banner_super_titulo || '';
            document.getElementById('bannerTitulo').value = item.banner_titulo || '';
            document.getElementById('bannerDescricao').value = item.banner_descricao || '';
            document.getElementById('ordemSolucao').value = item.ordem || 0;
            document.getElementById('ativoSolucao').checked = !!item.ativo;
            document.getElementById('btnSalvarSolucao').textContent = 'Atualizar solução';
            setConteudoEditor(item.conteudo_html || '');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initEditorSolucoes();

            @if (old('conteudo_html'))
                setTimeout(function() {
                    setConteudoEditor(@json(old('conteudo_html')));
                }, 250);
            @endif
        });
    </script>
@endsection
