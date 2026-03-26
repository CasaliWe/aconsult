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
        .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px; }
        .item-card { border: 1px solid #e2e8f0; border-radius: 10px; background: #fff; padding: 14px; }
        .item-card h4 { margin: 0 0 6px; font-size: 14px; font-weight: 700; color: #1e293b; }
        .item-card p { margin: 0; font-size: 12px; color: #64748b; }
    </style>

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Edite apenas o conteúdo principal da página de cada solução (Empresas, E-commerce e Comex). O restante da página permanece igual.</p>
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
        <form id="formPaginaSolucoes" action="{{ route('admin.pagina-solucoes.salvar') }}" method="POST">
            @csrf

            <div style="margin-bottom: 16px;">
                <label class="admin-label">Qual solução deseja editar?</label>
                <select id="tipoSolucao" name="tipo" class="admin-input" required>
                    @foreach ($tiposSolucoes as $slug => $nome)
                        <option value="{{ $slug }}">{{ $nome }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 10px;">
                <label class="admin-label">Conteúdo principal (editor completo)</label>
                <textarea id="conteudoSolucao" name="conteudo_html"></textarea>
            </div>

            <p style="margin: 0 0 18px; font-size: 12px; color: #94a3b8;">Voce pode alterar texto, tamanho de fonte, alinhamento, listas, links, tabelas e cores.</p>

            <button type="submit" class="admin-btn-salvar">Salvar conteúdo da solução</button>
        </form>
    </div>

    <div class="cards-grid">
        @foreach ($tiposSolucoes as $slug => $nome)
            <div class="item-card">
                <h4>{{ $nome }}</h4>
                <p>URL pública: /solucoes/{{ $slug }}</p>
                <p style="margin-top: 5px;">Ultima atualizacao: {{ optional($conteudosSolucoes[$slug] ?? null)?->updated_at?->format('d/m/Y H:i') ?? 'Sem edicao' }}</p>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const conteudosSolucoes = @json($conteudosSolucoes->map(fn($item) => $item->conteudo_html));

        function conteudoPorTipo(tipo) {
            return conteudosSolucoes[tipo] || '';
        }

        function setConteudoEditor(tipo) {
            const editor = window.tinymce.get('conteudoSolucao');
            if (!editor) {
                return;
            }

            editor.setContent(conteudoPorTipo(tipo));
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
                setup: function(editor) {
                    editor.on('init', function() {
                        const tipoInicial = document.getElementById('tipoSolucao').value;
                        setConteudoEditor(tipoInicial);
                    });
                },
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const seletorTipo = document.getElementById('tipoSolucao');
            const tipoOld = '{{ old('tipo') }}';

            if (tipoOld) {
                seletorTipo.value = tipoOld;
            }

            initEditorSolucoes();

            seletorTipo.addEventListener('change', function() {
                setConteudoEditor(this.value);
            });

            @if (old('conteudo_html'))
                setTimeout(function() {
                    const editor = window.tinymce.get('conteudoSolucao');
                    if (editor) {
                        editor.setContent(@json(old('conteudo_html')));
                    }
                }, 250);
            @endif
        });
    </script>
@endsection
