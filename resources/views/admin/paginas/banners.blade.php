{{-- Página: Banners --}}
@extends('admin.layout')

@section('titulo', 'Banners')

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
        .admin-input::placeholder { color: #94a3b8; }
        .admin-textarea { resize: vertical; min-height: 60px; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 640px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } }
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
            display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px;
            background: none; color: #dc2626; font-weight: 600; font-size: 13px;
            border: 1.5px solid #fecaca; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-danger:hover { background-color: #dc2626; color: #fff; border-color: #dc2626; }
        .admin-alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; margin-bottom: 20px; }
        .admin-alert-sucesso { background-color: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; }
        .admin-alert-erro { background-color: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .banner-item {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            padding: 20px; margin-bottom: 16px; display: flex; gap: 16px; align-items: flex-start;
        }
        .banner-thumb {
            width: 160px; height: 90px; border-radius: 8px; object-fit: cover; flex-shrink: 0;
            background-color: #f1f5f9;
        }
        .banner-info { flex: 1; min-width: 0; }
        .banner-titulo { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .banner-desc { font-size: 13px; color: #64748b; margin: 0 0 8px; }
        .banner-meta { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; }
        .banner-badge {
            font-size: 11px; font-weight: 600; padding: 2px 10px; border-radius: 20px;
        }
        .badge-ativo { background-color: #f0fdf4; color: #166534; }
        .badge-inativo { background-color: #fef2f2; color: #dc2626; }
        .banner-acoes { display: flex; gap: 8px; flex-shrink: 0; align-items: flex-start; }
        .admin-btn-edit {
            display: inline-flex; align-items: center; gap: 4px; padding: 8px 14px;
            background: #f1f5f9; color: #475569; font-weight: 600; font-size: 13px;
            border: none; border-radius: 8px; cursor: pointer; transition: all 0.2s;
        }
        .admin-btn-edit:hover { background-color: #e2e8f0; }
        .admin-img-preview {
            width: 100%; max-width: 300px; height: 120px; border-radius: 10px;
            object-fit: cover; border: 1px solid #e2e8f0; margin-top: 8px;
        }
        .admin-checkbox-wrap {
            display: flex; align-items: center; gap: 8px;
        }
        .admin-checkbox {
            width: 18px; height: 18px; accent-color: #e21850; cursor: pointer;
        }
        @media (max-width: 639px) {
            .banner-item { flex-direction: column; }
            .banner-thumb { width: 100%; height: 140px; }
        }

        /* Tabs */
        .admin-tabs { display: flex; gap: 4px; border-bottom: 2px solid #e2e8f0; margin-bottom: 24px; }
        .admin-tab {
            padding: 12px 24px; font-size: 14px; font-weight: 600; color: #64748b;
            border: none; background: none; cursor: pointer; border-bottom: 3px solid transparent;
            margin-bottom: -2px; transition: all 0.2s;
        }
        .admin-tab:hover { color: #1e293b; }
        .admin-tab.ativa { color: #e21850; border-bottom-color: #e21850; }
        .admin-tab-painel { display: none; }
        .admin-tab-painel.ativo { display: block; }

        /* Page banners grid */
        .pagina-banner-card {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            overflow: hidden; transition: box-shadow 0.2s;
        }
        .pagina-banner-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.06); }
        .pagina-banner-img {
            width: 100%; height: 120px; object-fit: cover; background-color: #f1f5f9;
        }
        .pagina-banner-body { padding: 16px; }
        .pagina-banner-nome { font-size: 14px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .pagina-banner-sub { font-size: 12px; color: #94a3b8; margin: 0; }
        .pagina-banners-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px;
        }
    </style>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    {{-- Tabs --}}
    <div class="admin-tabs">
        <button class="admin-tab ativa" data-tab="home" onclick="trocarTab('home')">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:inline; vertical-align: -2px; margin-right: 6px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            Slider da Home
        </button>
        <button class="admin-tab" data-tab="paginas" onclick="trocarTab('paginas')">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:inline; vertical-align: -2px; margin-right: 6px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            Banners das Páginas
        </button>
    </div>

    {{-- ═══ TAB 1: Slider da Home ═══ --}}
    <div id="tab-home" class="admin-tab-painel ativo">
        <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
            <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie os slides do banner principal da home</p>
            <button type="button" class="admin-btn-outline" onclick="abrirNovoBanner()">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Novo banner
            </button>
        </div>

        {{-- Formulário criar/editar --}}
        <div id="formBanner" class="admin-card" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formBannerTitulo">Novo Banner</h3>
                <button type="button" onclick="fecharFormBanner()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <form action="{{ route('admin.banners.salvar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="bannerIdInput" value="">

                <div class="admin-grid admin-grid-2">
                    <div>
                        <label class="admin-label">Super título</label>
                        <input type="text" name="super_titulo" id="bannerSuperTitulo" class="admin-input" placeholder="Ex: Aconsult Contabilidade">
                    </div>
                    <div>
                        <label class="admin-label">Ordem</label>
                        <input type="number" name="ordem" id="bannerOrdem" class="admin-input" value="{{ ($banners->max('ordem') ?? 0) + 1 }}" min="0">
                    </div>
                </div>

                <div style="margin-top: 16px;">
                    <label class="admin-label">Título (aceita HTML)</label>
                    <input type="text" name="titulo" id="bannerTituloInput" class="admin-input" placeholder='Ex: Soluções para<br><span class="text-marca">sua empresa</span>' required>
                    <p id="avisoDigitacaoPrimeiro" style="margin: 6px 0 0; font-size: 12px; color: #64748b; display: none;">
                        No 1o banner, use <strong>[[digitacao:palavra 1|palavra 2|palavra 3]]</strong> para definir as palavras com efeito de digitação.
                    </p>
                </div>

                <div style="margin-top: 16px;">
                    <label class="admin-label">Descrição</label>
                    <textarea name="descricao" id="bannerDescricao" class="admin-input admin-textarea" placeholder="Texto descritivo do banner"></textarea>
                </div>

                <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                    <div>
                        <label class="admin-label">Imagem <span style="color: #94a3b8; font-weight: 400;">(JPG, PNG, WebP — máx. 5MB)</span></label>
                        <input type="file" name="imagem" id="bannerImagem" accept="image/*" class="admin-input" onchange="previewImg(this, 'bannerPreview')">
                        <img id="bannerPreview" src="" class="admin-img-preview" style="display: none;">
                    </div>
                    <div>
                        <div class="admin-checkbox-wrap" style="margin-top: 24px;">
                            <input type="checkbox" name="ativo" id="bannerAtivo" class="admin-checkbox" checked>
                            <label for="bannerAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Banner ativo</label>
                        </div>
                    </div>
                </div>

                <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                    <div>
                        <label class="admin-label">Texto botão primário</label>
                        <input type="text" name="botao_primario_texto" id="bannerBtnPrimTxt" class="admin-input" placeholder="Saiba mais">
                    </div>
                    <div>
                        <label class="admin-label">Link botão primário</label>
                        <input type="text" name="botao_primario_link" id="bannerBtnPrimLink" class="admin-input" placeholder="/solucoes/empresas ou whatsapp">
                    </div>
                    <div>
                        <label class="admin-label">Texto botão secundário</label>
                        <input type="text" name="botao_secundario_texto" id="bannerBtnSecTxt" class="admin-input" placeholder="Fale conosco (opcional)">
                    </div>
                    <div>
                        <label class="admin-label">Link botão secundário</label>
                        <input type="text" name="botao_secundario_link" id="bannerBtnSecLink" class="admin-input" placeholder="contato (opcional)">
                    </div>
                </div>

                <div style="margin-top: 20px; display: flex; gap: 12px;">
                    <button type="submit" class="admin-btn-salvar">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Salvar banner
                    </button>
                </div>
            </form>
        </div>

        {{-- Lista de banners da home --}}
        @forelse ($banners as $banner)
            <div class="banner-item">
                <img src="{{ asset($banner->imagem) }}" alt="" class="banner-thumb">
                <div class="banner-info">
                    <p class="banner-titulo">{{ strip_tags($banner->titulo) }}</p>
                    <p class="banner-desc">{{ $banner->super_titulo }} — Ordem: {{ $banner->ordem }}</p>
                    <div class="banner-meta">
                        <span class="banner-badge {{ $banner->ativo ? 'badge-ativo' : 'badge-inativo' }}">
                            {{ $banner->ativo ? 'Ativo' : 'Inativo' }}
                        </span>
                        @if ($banner->botao_primario_texto)
                            <span style="font-size: 12px; color: #94a3b8;">{{ $banner->botao_primario_texto }}</span>
                        @endif
                    </div>
                </div>
                <div class="banner-acoes">
                    <button type="button" class="admin-btn-edit" onclick="editarBanner({{ $banner->toJson() }})">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Editar
                    </button>
                    <form action="{{ route('admin.banners.excluir', $banner->id) }}" method="POST" onsubmit="return confirm('Excluir este banner?')">
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
                <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhum banner cadastrado.</p>
            </div>
        @endforelse
    </div>

    {{-- ═══ TAB 2: Banners das Páginas ═══ --}}
    <div id="tab-paginas" class="admin-tab-painel">
        <p style="font-size: 13px; color: #64748b; margin: 0 0 20px;">Imagem de fundo, título e descrição dos banners de cada página do site</p>

        {{-- Modal de edição inline --}}
        <div id="formBannerPagina" class="admin-card" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formPaginaTitulo">Editar Banner</h3>
                <button type="button" onclick="fecharFormPagina()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <form action="{{ route('admin.banners.pagina.salvar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="paginaIdInput" value="">

                <div class="admin-grid admin-grid-2">
                    <div>
                        <label class="admin-label">Super título</label>
                        <input type="text" name="super_titulo" id="paginaSuperTitulo" class="admin-input" placeholder="Ex: Sobre nós">
                    </div>
                    <div>
                        <label class="admin-label">Imagem <span style="color: #94a3b8; font-weight: 400;">(JPG, PNG, WebP — máx. 5MB)</span></label>
                        <input type="file" name="imagem" id="paginaImagem" accept="image/*" class="admin-input" onchange="previewImg(this, 'paginaPreview')">
                    </div>
                </div>

                <div style="margin-top: 16px;">
                    <label class="admin-label">Título (aceita HTML para realces)</label>
                    <input type="text" name="titulo" id="paginaTituloInput" class="admin-input" placeholder='Ex: Conheça a <span style="color: #e21850;">Aconsult</span>' required>
                </div>

                <div style="margin-top: 16px;">
                    <label class="admin-label">Descrição</label>
                    <textarea name="descricao" id="paginaDescricao" class="admin-input admin-textarea" placeholder="Texto descritivo"></textarea>
                </div>

                <img id="paginaPreview" src="" class="admin-img-preview" style="display: none;">

                <div style="margin-top: 20px; display: flex; gap: 12px;">
                    <button type="submit" class="admin-btn-salvar">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Salvar alterações
                    </button>
                </div>
            </form>
        </div>

        {{-- Grid de cards das páginas --}}
        <div class="pagina-banners-grid">
            @foreach ($bannersPaginas as $bp)
                <div class="pagina-banner-card">
                    <img src="{{ asset($bp->imagem) }}" alt="{{ $bp->nome_exibicao }}" class="pagina-banner-img">
                    <div class="pagina-banner-body">
                        <p class="pagina-banner-nome">{{ $bp->nome_exibicao }}</p>
                        <p class="pagina-banner-sub">{{ $bp->super_titulo }}</p>
                        <div style="margin-top: 12px;">
                            <button type="button" class="admin-btn-edit" onclick="editarPagina({{ $bp->toJson() }})" style="width: 100%; justify-content: center;">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        /* ─── Tabs ─── */
        function trocarTab(tab) {
            document.querySelectorAll('.admin-tab').forEach(t => t.classList.remove('ativa'));
            document.querySelectorAll('.admin-tab-painel').forEach(p => p.classList.remove('ativo'));
            document.querySelector('[data-tab="' + tab + '"]').classList.add('ativa');
            document.getElementById('tab-' + tab).classList.add('ativo');
        }

        /* ─── Preview de imagem ─── */
        function previewImg(input, previewId) {
            var preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        /* ─── Banners Home ─── */
        function resetarFormBanner() {
            document.getElementById('formBannerTitulo').textContent = 'Novo Banner';
            document.getElementById('bannerIdInput').value = '';
            document.getElementById('bannerSuperTitulo').value = '';
            document.getElementById('bannerTituloInput').value = '';
            document.getElementById('bannerDescricao').value = '';
            document.getElementById('bannerOrdem').value = '{{ ($banners->max('ordem') ?? 0) + 1 }}';
            document.getElementById('bannerAtivo').checked = true;
            document.getElementById('bannerBtnPrimTxt').value = '';
            document.getElementById('bannerBtnPrimLink').value = '';
            document.getElementById('bannerBtnSecTxt').value = '';
            document.getElementById('bannerBtnSecLink').value = '';
            document.getElementById('bannerPreview').style.display = 'none';
            document.getElementById('bannerPreview').src = '';
            document.getElementById('bannerImagem').value = '';
            atualizarAvisoDigitacao();
        }

        function atualizarAvisoDigitacao() {
            var ordem = parseInt(document.getElementById('bannerOrdem').value || '0', 10);
            var aviso = document.getElementById('avisoDigitacaoPrimeiro');

            if (!aviso) {
                return;
            }

            aviso.style.display = ordem === 1 ? 'block' : 'none';
        }

        function abrirNovoBanner() {
            resetarFormBanner();
            document.getElementById('formBanner').style.display = 'block';
            document.getElementById('formBanner').scrollIntoView({ behavior: 'smooth' });
        }

        function editarBanner(banner) {
            resetarFormBanner();
            document.getElementById('formBanner').style.display = 'block';
            document.getElementById('formBannerTitulo').textContent = 'Editar Banner';
            document.getElementById('bannerIdInput').value = banner.id;
            document.getElementById('bannerSuperTitulo').value = banner.super_titulo || '';
            document.getElementById('bannerTituloInput').value = banner.titulo || '';
            document.getElementById('bannerDescricao').value = banner.descricao || '';
            document.getElementById('bannerOrdem').value = banner.ordem || 0;
            document.getElementById('bannerAtivo').checked = banner.ativo;
            document.getElementById('bannerBtnPrimTxt').value = banner.botao_primario_texto || '';
            document.getElementById('bannerBtnPrimLink').value = banner.botao_primario_link || '';
            document.getElementById('bannerBtnSecTxt').value = banner.botao_secundario_texto || '';
            document.getElementById('bannerBtnSecLink').value = banner.botao_secundario_link || '';
            atualizarAvisoDigitacao();

            var preview = document.getElementById('bannerPreview');
            if (banner.imagem) {
                preview.src = '/' + banner.imagem;
                preview.style.display = 'block';
            }
            document.getElementById('formBanner').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormBanner() {
            document.getElementById('formBanner').style.display = 'none';
            resetarFormBanner();
        }

        document.getElementById('bannerOrdem').addEventListener('input', atualizarAvisoDigitacao);

        /* ─── Banners das Páginas ─── */
        function resetarFormPagina() {
            document.getElementById('formPaginaTitulo').textContent = 'Editar Banner';
            document.getElementById('paginaIdInput').value = '';
            document.getElementById('paginaSuperTitulo').value = '';
            document.getElementById('paginaTituloInput').value = '';
            document.getElementById('paginaDescricao').value = '';
            document.getElementById('paginaPreview').style.display = 'none';
            document.getElementById('paginaPreview').src = '';
            document.getElementById('paginaImagem').value = '';
        }

        function editarPagina(bp) {
            resetarFormPagina();
            document.getElementById('formBannerPagina').style.display = 'block';
            document.getElementById('formPaginaTitulo').textContent = 'Editar: ' + bp.nome_exibicao;
            document.getElementById('paginaIdInput').value = bp.id;
            document.getElementById('paginaSuperTitulo').value = bp.super_titulo || '';
            document.getElementById('paginaTituloInput').value = bp.titulo || '';
            document.getElementById('paginaDescricao').value = bp.descricao || '';

            var preview = document.getElementById('paginaPreview');
            if (bp.imagem) {
                preview.src = '/' + bp.imagem;
                preview.style.display = 'block';
            }
            document.getElementById('formBannerPagina').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormPagina() {
            document.getElementById('formBannerPagina').style.display = 'none';
            resetarFormPagina();
        }
    </script>
@endsection
