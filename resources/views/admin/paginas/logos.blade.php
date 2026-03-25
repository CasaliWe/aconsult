{{-- Página: Logos Parceiros --}}
@extends('admin.layout')

@section('titulo', 'Logos Parceiros')

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
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 640px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } .admin-grid-3 { grid-template-columns: 1fr 1fr 1fr; } }
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
        .logo-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }
        .logo-card {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            padding: 16px; display: flex; flex-direction: column; align-items: center; text-align: center;
        }
        .logo-card-img {
            width: 100%; height: 80px; object-fit: contain; margin-bottom: 12px;
            background: #f8fafc; border-radius: 8px; padding: 8px;
        }
        .logo-card-nome { font-size: 13px; font-weight: 600; color: #1e293b; margin: 0 0 4px; }
        .logo-card-ordem { font-size: 11px; color: #94a3b8; margin: 0 0 10px; }
        .logo-card-acoes { display: flex; gap: 6px; }
        .badge-ativo { font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 20px; background-color: #f0fdf4; color: #166534; }
        .badge-inativo { font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 20px; background-color: #fef2f2; color: #dc2626; }
        .admin-img-preview {
            width: 100%; max-width: 200px; height: 80px; border-radius: 10px;
            object-fit: contain; border: 1px solid #e2e8f0; margin-top: 8px; background: #f8fafc; padding: 4px;
        }
    </style>

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Logos dos parceiros exibidos na home do site</p>
        <button type="button" class="admin-btn-outline" onclick="document.getElementById('formLogo').style.display = document.getElementById('formLogo').style.display === 'none' ? 'block' : 'none'">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Novo logo
        </button>
    </div>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    {{-- Formulário criar/editar --}}
    <div id="formLogo" class="admin-card" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formLogoTitulo">Novo Logo</h3>
            <button type="button" onclick="fecharFormLogo()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="{{ route('admin.logos.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="logoIdInput" value="">

            <div class="admin-grid admin-grid-3">
                <div>
                    <label class="admin-label">Nome do parceiro</label>
                    <input type="text" name="nome" id="logoNome" class="admin-input" placeholder="Nome da empresa" required>
                </div>
                <div>
                    <label class="admin-label">Link (opcional)</label>
                    <input type="text" name="link" id="logoLink" class="admin-input" placeholder="https://empresa.com">
                </div>
                <div>
                    <label class="admin-label">Ordem</label>
                    <input type="number" name="ordem" id="logoOrdem" class="admin-input" value="{{ ($logos->max('ordem') ?? 0) + 1 }}" min="0">
                </div>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                <div>
                    <label class="admin-label">Logo <span style="color: #94a3b8; font-weight: 400;">(JPG, PNG, WebP, SVG — máx. 2MB)</span></label>
                    <input type="file" name="imagem" id="logoImagem" accept="image/*" class="admin-input" onchange="previewImgLogo(this)">
                    <img id="logoPreview" src="" class="admin-img-preview" style="display: none;">
                </div>
                <div>
                    <div class="admin-checkbox-wrap" style="margin-top: 24px;">
                        <input type="checkbox" name="ativo" id="logoAtivo" class="admin-checkbox" checked>
                        <label for="logoAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Logo ativo</label>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar logo
                </button>
            </div>
        </form>
    </div>

    {{-- Grid de logos --}}
    @if ($logos->count())
        <div class="logo-grid">
            @foreach ($logos as $logo)
                <div class="logo-card">
                    <img src="{{ asset($logo->imagem) }}" alt="{{ $logo->nome }}" class="logo-card-img">
                    <p class="logo-card-nome">{{ $logo->nome }}</p>
                    <p class="logo-card-ordem">
                        Ordem: {{ $logo->ordem }}
                        <span class="{{ $logo->ativo ? 'badge-ativo' : 'badge-inativo' }}" style="margin-left: 6px;">{{ $logo->ativo ? 'Ativo' : 'Inativo' }}</span>
                    </p>
                    <div class="logo-card-acoes">
                        <button type="button" class="admin-btn-edit" onclick="editarLogo({{ $logo->toJson() }})">Editar</button>
                        <form action="{{ route('admin.logos.excluir', $logo->id) }}" method="POST" onsubmit="return confirm('Excluir este logo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="admin-card" style="text-align: center; padding: 40px;">
            <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhum logo cadastrado.</p>
        </div>
    @endif

    <script>
        function previewImgLogo(input) {
            var preview = document.getElementById('logoPreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function editarLogo(logo) {
            document.getElementById('formLogo').style.display = 'block';
            document.getElementById('formLogoTitulo').textContent = 'Editar Logo';
            document.getElementById('logoIdInput').value = logo.id;
            document.getElementById('logoNome').value = logo.nome || '';
            document.getElementById('logoLink').value = logo.link || '';
            document.getElementById('logoOrdem').value = logo.ordem || 0;
            document.getElementById('logoAtivo').checked = logo.ativo;

            var preview = document.getElementById('logoPreview');
            if (logo.imagem) {
                preview.src = '/' + logo.imagem;
                preview.style.display = 'block';
            }

            document.getElementById('formLogo').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormLogo() {
            document.getElementById('formLogo').style.display = 'none';
            document.getElementById('formLogoTitulo').textContent = 'Novo Logo';
            document.getElementById('logoIdInput').value = '';
            document.getElementById('logoNome').value = '';
            document.getElementById('logoLink').value = '';
            document.getElementById('logoOrdem').value = '';
            document.getElementById('logoAtivo').checked = true;
            document.getElementById('logoPreview').style.display = 'none';
            document.getElementById('logoImagem').value = '';
        }
    </script>
@endsection
