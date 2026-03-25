{{-- Página: News --}}
@extends('admin.layout')

@section('titulo', 'News')

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
        .admin-textarea { resize: vertical; min-height: 90px; }
        .admin-grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 768px) { .admin-grid-2 { grid-template-columns: 1fr 1fr; } }

        .admin-sugestoes-wrap { position: relative; }
        .admin-sugestoes {
            position: absolute; left: 0; right: 0; top: calc(100% + 6px); z-index: 20;
            background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            max-height: 220px; overflow-y: auto; padding: 6px;
        }
        .admin-sugestao-item {
            width: 100%; text-align: left; border: none; background: none; cursor: pointer;
            padding: 9px 10px; border-radius: 8px; color: #334155; font-size: 13px; font-weight: 600;
        }
        .admin-sugestao-item:hover { background: #f8fafc; color: #e21850; }
        .admin-sugestoes-vazio { padding: 9px 10px; color: #94a3b8; font-size: 12px; }

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

        .item-news {
            background: #fff; border-radius: 12px; border: 1px solid #e2e8f0;
            padding: 18px; margin-bottom: 14px; display: flex; gap: 14px; align-items: flex-start;
        }
        .item-thumb { width: 140px; height: 90px; border-radius: 8px; object-fit: cover; background: #f1f5f9; flex-shrink: 0; }
        .item-info { flex: 1; min-width: 0; }
        .item-titulo { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 6px; }
        .item-desc { font-size: 13px; color: #64748b; margin: 0 0 8px; }
        .item-meta { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
        .item-badge { font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; background: rgba(226,24,80,0.12); color: #e21850; }
        .item-acoes { display: flex; gap: 8px; }

        .admin-checkbox-wrap { display: flex; align-items: center; gap: 8px; }
        .admin-checkbox { width: 18px; height: 18px; accent-color: #e21850; cursor: pointer; }

        .admin-img-preview {
            width: 100%; max-width: 300px; height: 140px; border-radius: 10px;
            object-fit: cover; border: 1px solid #e2e8f0; margin-top: 8px;
        }

        @media (max-width: 767px) {
            .item-news { flex-direction: column; }
            .item-thumb { width: 100%; height: 160px; }
            .item-acoes { width: 100%; }
        }
    </style>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie notícias do blog com thumb, tag/categoria, título, mini descrição e conteúdo</p>
        <button type="button" class="admin-btn-outline" onclick="abrirNovaNoticia()">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Nova notícia
        </button>
    </div>

    <div id="formNoticia" class="admin-card" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formNoticiaTitulo">Nova notícia</h3>
            <button type="button" onclick="fecharFormNoticia()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form id="formNoticiaCadastro" action="{{ route('admin.news.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="noticiaIdInput" value="">

            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Tag/Categoria (livre)</label>
                    <div class="admin-sugestoes-wrap">
                        <input type="text" name="categoria" id="noticiaCategoria" class="admin-input" maxlength="60" placeholder="Ex: Tributario" autocomplete="off" required>
                        <div id="categoriaSugestoes" class="admin-sugestoes" style="display: none;"></div>
                    </div>
                </div>
                <div>
                    <label class="admin-label">Tempo de leitura (minutos)</label>
                    <input type="number" name="tempo_leitura" id="noticiaTempoLeitura" class="admin-input" min="1" max="120" value="5" required>
                </div>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Título</label>
                <input type="text" name="titulo" id="noticiaTituloInput" class="admin-input" maxlength="220" required>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Mini descrição (cards)</label>
                <textarea name="mini_descricao" id="noticiaMiniDescricao" class="admin-input admin-textarea" maxlength="320" required></textarea>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px;">
                <div>
                    <label class="admin-label">Data de publicação</label>
                    <input type="date" name="data_publicacao" id="noticiaDataPublicacao" class="admin-input" required>
                </div>
                <div>
                    <label class="admin-label">Thumb (foto do card) <span style="color: #94a3b8; font-weight: 400;">(JPG, PNG, WebP — máx. 10MB)</span></label>
                    <input type="file" name="thumb" id="noticiaThumb" accept="image/*" class="admin-input" onchange="previewImg(this, 'noticiaThumbPreview')">
                    <img id="noticiaThumbPreview" src="" class="admin-img-preview" style="display: none;">
                </div>
            </div>

            <div style="margin-top: 16px;">
                <div class="admin-checkbox-wrap">
                    <input type="checkbox" name="ativo" id="noticiaAtivo" class="admin-checkbox" checked>
                    <label for="noticiaAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Notícia ativa</label>
                </div>
            </div>

            <div style="margin-top: 16px;">
                <label class="admin-label">Conteúdo da notícia</label>
                <textarea name="conteudo" id="noticiaConteudo" class="admin-input" rows="14"></textarea>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar notícia
                </button>
            </div>
        </form>
    </div>

    @forelse($noticias as $noticia)
        <div class="item-news">
            <img src="{{ asset($noticia->thumb) }}" alt="{{ $noticia->titulo }}" class="item-thumb">
            <div class="item-info">
                <p class="item-titulo">{{ $noticia->titulo }}</p>
                <p class="item-desc">{{ $noticia->mini_descricao }}</p>
                <div class="item-meta">
                    <span class="item-badge">{{ $noticia->categoria }}</span>
                    <span style="font-size: 12px; color: #94a3b8;">{{ optional($noticia->data_publicacao)->format('d/m/Y') }}</span>
                    <span style="font-size: 12px; color: #94a3b8;">{{ $noticia->tempo_leitura }} min</span>
                    <span style="font-size: 12px; color: {{ $noticia->ativo ? '#166534' : '#dc2626' }};">{{ $noticia->ativo ? 'Ativa' : 'Inativa' }}</span>
                </div>
            </div>
            <div class="item-acoes">
                <button type="button" class="admin-btn-edit" onclick="editarNoticia({{ $noticia->id }})">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Editar
                </button>
                <form action="{{ route('admin.news.excluir', $noticia->id) }}" method="POST" onsubmit="return confirm('Excluir esta notícia?')">
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
            <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhuma notícia cadastrada.</p>
        </div>
    @endforelse

    <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const noticiasData = @json($noticias->keyBy('id'));
        const categoriasSalvas = Object.values(noticiasData)
            .map(item => String(item.categoria || '').trim())
            .filter(Boolean)
            .filter((categoria, indice, lista) => {
                const chave = categoria.toLocaleLowerCase('pt-BR');
                return lista.findIndex(valor => String(valor).trim().toLocaleLowerCase('pt-BR') === chave) === indice;
            })
            .sort((a, b) => a.localeCompare(b, 'pt-BR'));

        function configurarSugestoesCategoria() {
            const inputCategoria = document.getElementById('noticiaCategoria');
            const painel = document.getElementById('categoriaSugestoes');

            if (!inputCategoria || !painel) {
                return;
            }

            function escaparHtml(valor) {
                return String(valor)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function renderizarSugestoes() {
                const filtro = String(inputCategoria.value || '').trim().toLocaleLowerCase('pt-BR');
                const sugestoes = categoriasSalvas.filter((categoria) => {
                    const categoriaNormalizada = categoria.toLocaleLowerCase('pt-BR');
                    return !filtro || categoriaNormalizada.includes(filtro);
                });

                if (sugestoes.length === 0) {
                    painel.innerHTML = '<div class="admin-sugestoes-vazio">Sem tags cadastradas para este filtro.</div>';
                    painel.style.display = 'block';
                    return;
                }

                painel.innerHTML = sugestoes.map((categoria) => {
                    const categoriaEscapada = escaparHtml(categoria);
                    return '<button type="button" class="admin-sugestao-item" data-categoria="' + categoriaEscapada + '">' + categoriaEscapada + '</button>';
                }).join('');

                painel.style.display = 'block';
            }

            inputCategoria.addEventListener('focus', renderizarSugestoes);
            inputCategoria.addEventListener('input', renderizarSugestoes);

            painel.addEventListener('mousedown', (event) => {
                const botao = event.target.closest('.admin-sugestao-item');
                if (!botao) {
                    return;
                }

                event.preventDefault();
                inputCategoria.value = botao.dataset.categoria || '';
                painel.style.display = 'none';
            });

            inputCategoria.addEventListener('blur', () => {
                setTimeout(() => {
                    painel.style.display = 'none';
                }, 120);
            });
        }

        function initEditorConteudo() {
            if (window.tinymce.get('noticiaConteudo')) {
                return;
            }

            tinymce.init({
                selector: '#noticiaConteudo',
                height: 420,
                menubar: false,
                plugins: 'lists link image table code fullscreen charmap preview autoresize',
                toolbar: 'undo redo | blocks fontsize bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | preview fullscreen code',
                branding: false,
                language: 'pt_BR',
                images_upload_url: '{{ route('admin.news.upload-imagem') }}',
                automatic_uploads: true,
                images_reuse_filename: false,
                relative_urls: false,
                remove_script_host: false,
                convert_urls: false,
                images_upload_credentials: true,
                setup: function(editor) {
                    editor.on('BeforeUpload', function() {
                        editor.setProgressState(1);
                    });
                    editor.on('UploadComplete', function() {
                        editor.setProgressState(0);
                    });
                },
                images_upload_handler: async (blobInfo) => {
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    const response = await fetch('{{ route('admin.news.upload-imagem') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData,
                    });

                    if (!response.ok) {
                        throw new Error('Falha no upload da imagem.');
                    }

                    const result = await response.json();
                    if (!result.location) {
                        throw new Error('Resposta inválida do upload.');
                    }

                    return result.location;
                },
            });
        }

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

        function resetarFormNoticia() {
            document.getElementById('formNoticiaTitulo').textContent = 'Nova notícia';
            document.getElementById('noticiaIdInput').value = '';
            document.getElementById('noticiaCategoria').value = '';
            document.getElementById('noticiaTituloInput').value = '';
            document.getElementById('noticiaMiniDescricao').value = '';
            document.getElementById('noticiaTempoLeitura').value = '5';
            document.getElementById('noticiaDataPublicacao').valueAsDate = new Date();
            document.getElementById('noticiaAtivo').checked = true;
            document.getElementById('noticiaThumb').value = '';
            document.getElementById('noticiaThumbPreview').src = '';
            document.getElementById('noticiaThumbPreview').style.display = 'none';

            if (window.tinymce.get('noticiaConteudo')) {
                window.tinymce.get('noticiaConteudo').setContent('');
            } else {
                document.getElementById('noticiaConteudo').value = '';
            }
        }

        function abrirNovaNoticia() {
            initEditorConteudo();
            resetarFormNoticia();
            document.getElementById('formNoticia').style.display = 'block';
            document.getElementById('formNoticia').scrollIntoView({ behavior: 'smooth' });
        }

        function editarNoticia(id) {
            initEditorConteudo();
            resetarFormNoticia();

            const noticia = noticiasData[id];
            if (!noticia) return;

            document.getElementById('formNoticia').style.display = 'block';
            document.getElementById('formNoticiaTitulo').textContent = 'Editar notícia';
            document.getElementById('noticiaIdInput').value = noticia.id;
            document.getElementById('noticiaCategoria').value = noticia.categoria || '';
            document.getElementById('noticiaTituloInput').value = noticia.titulo || '';
            document.getElementById('noticiaMiniDescricao').value = noticia.mini_descricao || '';
            document.getElementById('noticiaTempoLeitura').value = noticia.tempo_leitura || 5;
            document.getElementById('noticiaAtivo').checked = !!noticia.ativo;

            if (noticia.data_publicacao) {
                const dataNormalizada = String(noticia.data_publicacao).slice(0, 10);
                document.getElementById('noticiaDataPublicacao').value = dataNormalizada;
            }

            const preview = document.getElementById('noticiaThumbPreview');
            if (noticia.thumb) {
                preview.src = '/' + noticia.thumb;
                preview.style.display = 'block';
            }

            if (window.tinymce.get('noticiaConteudo')) {
                window.tinymce.get('noticiaConteudo').setContent(noticia.conteudo || '');
            } else {
                document.getElementById('noticiaConteudo').value = noticia.conteudo || '';
            }

            document.getElementById('formNoticia').scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormNoticia() {
            document.getElementById('formNoticia').style.display = 'none';
        }

        function getConteudoLimpo(editor) {
            if (!editor) return '';
            const texto = editor.getContent({ format: 'text' }) || '';
            return texto.replace(/\s+/g, ' ').trim();
        }

        document.addEventListener('DOMContentLoaded', () => {
            initEditorConteudo();
            configurarSugestoesCategoria();

            const form = document.getElementById('formNoticiaCadastro');
            form.addEventListener('submit', function(event) {
                const editor = window.tinymce.get('noticiaConteudo');
                const textarea = document.getElementById('noticiaConteudo');

                if (editor) {
                    textarea.value = editor.getContent();

                    if (!getConteudoLimpo(editor)) {
                        event.preventDefault();
                        alert('Preencha o conteúdo da notícia antes de salvar.');
                        editor.focus();
                        return;
                    }
                } else if (!textarea.value.trim()) {
                    event.preventDefault();
                    alert('Preencha o conteúdo da notícia antes de salvar.');
                    textarea.focus();
                    return;
                }
            });
        });
    </script>
@endsection
