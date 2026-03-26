{{-- Página: Reels --}}
@extends('admin.layout')

@section('titulo', 'Reels')

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

        .admin-capa-preview {
            width: 140px; border-radius: 10px; border: 1px solid #e2e8f0;
            aspect-ratio: 9 / 16; object-fit: cover; display: none;
        }

        .reel-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 16px; }
        .reel-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 14px; }
        .reel-thumb {
            width: 100%; border-radius: 10px; border: 1px solid #e2e8f0;
            aspect-ratio: 9 / 16; object-fit: cover; background: #f8fafc;
        }
        .reel-meta { font-size: 12px; color: #64748b; margin: 8px 0 10px; }
        .reel-acoes { display: flex; gap: 8px; }
        .reel-status-ok { color: #166534; font-weight: 600; }
        .reel-status-erro { color: #dc2626; font-weight: 600; }
    </style>

    <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie os reels da home com capa + vídeo. O vídeo deve ser sempre vertical.</p>
        <button type="button" class="admin-btn-outline" onclick="abrirNovoReel()">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Novo reel
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

    <div id="formReel" class="admin-card" style="display: none;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;" id="formReelTitulo">Novo Reel</h3>
            <button type="button" onclick="fecharFormReel()" style="background: none; border: none; cursor: pointer; color: #94a3b8; padding: 4px;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form action="{{ route('admin.reels.salvar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="reelIdInput" value="">
            <input type="hidden" name="video_largura" id="reelVideoLargura" value="">
            <input type="hidden" name="video_altura" id="reelVideoAltura" value="">

            <div class="admin-grid admin-grid-3">
                <div>
                    <label class="admin-label">Ordem</label>
                    <input type="number" name="ordem" id="reelOrdem" class="admin-input" value="{{ ($reels->max('ordem') ?? 0) + 1 }}" min="0" required>
                </div>
                <div>
                    <div class="admin-checkbox-wrap" style="margin-top: 30px;">
                        <input type="checkbox" name="ativo" id="reelAtivo" class="admin-checkbox" checked>
                        <label for="reelAtivo" style="font-size: 14px; color: #374151; cursor: pointer;">Reel ativo</label>
                    </div>
                </div>
            </div>

            <div class="admin-grid admin-grid-2" style="margin-top: 16px; align-items: start;">
                <div>
                    <label class="admin-label">Capa do reel <span style="color: #94a3b8; font-weight: 400;">(JPG, PNG, WebP)</span></label>
                    <input type="file" name="capa" id="reelCapa" accept="image/*" class="admin-input" onchange="previewCapaReel(this)">
                    <img id="reelCapaPreview" src="" class="admin-capa-preview" style="margin-top: 8px;">
                </div>

                <div>
                    <label class="admin-label">Vídeo do reel <span style="color: #94a3b8; font-weight: 400;">(aceita todos os tipos de vídeo)</span></label>
                    <input type="file" name="video" id="reelVideo" accept="video/*" class="admin-input" onchange="validarVideoVertical(this)" required>
                    <p id="reelVideoStatus" class="reel-meta" style="margin-top: 8px;">Selecione um vídeo vertical para liberar o envio.</p>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit" class="admin-btn-salvar">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Salvar reel
                </button>
            </div>
        </form>
    </div>

    @if ($reels->count())
        <div class="reel-grid">
            @foreach ($reels as $reel)
                <div class="reel-card">
                    <img src="{{ asset($reel->capa) }}" alt="Capa do reel {{ $reel->id }}" class="reel-thumb">
                    <p class="reel-meta">Ordem: {{ $reel->ordem }} | {{ $reel->ativo ? 'Ativo' : 'Inativo' }}</p>
                    <div class="reel-acoes">
                        <button type="button" class="admin-btn-edit" onclick='editarReel(@json($reel))'>Editar</button>
                        <form action="{{ route('admin.reels.excluir', $reel->id) }}" method="POST" onsubmit="return confirm('Excluir este reel?')">
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
            <p style="font-size: 14px; color: #94a3b8; margin: 0;">Nenhum reel cadastrado.</p>
        </div>
    @endif

    <script>
        function abrirNovoReel() {
            const form = document.getElementById('formReel');
            form.style.display = 'block';
            document.getElementById('formReelTitulo').textContent = 'Novo Reel';
            document.getElementById('reelIdInput').value = '';
            document.getElementById('reelVideo').required = true;
            document.getElementById('reelCapa').required = true;
            limparStatusVideo();
            form.scrollIntoView({ behavior: 'smooth' });
        }

        function editarReel(reel) {
            const form = document.getElementById('formReel');
            form.style.display = 'block';
            document.getElementById('formReelTitulo').textContent = 'Editar Reel';
            document.getElementById('reelIdInput').value = reel.id;
            document.getElementById('reelOrdem').value = reel.ordem || 0;
            document.getElementById('reelAtivo').checked = Boolean(reel.ativo);
            document.getElementById('reelVideo').required = false;
            document.getElementById('reelCapa').required = false;

            const preview = document.getElementById('reelCapaPreview');
            if (reel.capa) {
                preview.src = '/' + reel.capa;
                preview.style.display = 'block';
            }

            limparStatusVideo('Mantenha em branco para continuar com o vídeo atual.');
            form.scrollIntoView({ behavior: 'smooth' });
        }

        function fecharFormReel() {
            document.getElementById('formReel').style.display = 'none';
            document.getElementById('formReelTitulo').textContent = 'Novo Reel';
            document.getElementById('reelIdInput').value = '';
            document.getElementById('reelOrdem').value = {{ ($reels->max('ordem') ?? 0) + 1 }};
            document.getElementById('reelAtivo').checked = true;
            document.getElementById('reelCapa').value = '';
            document.getElementById('reelVideo').value = '';
            document.getElementById('reelVideo').required = true;
            document.getElementById('reelCapa').required = true;
            document.getElementById('reelCapaPreview').style.display = 'none';
            document.getElementById('reelVideoLargura').value = '';
            document.getElementById('reelVideoAltura').value = '';
            limparStatusVideo();
        }

        function previewCapaReel(input) {
            const preview = document.getElementById('reelCapaPreview');
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

        function limparStatusVideo(texto) {
            const status = document.getElementById('reelVideoStatus');
            status.className = 'reel-meta';
            status.textContent = texto || 'Selecione um vídeo vertical para liberar o envio.';
        }

        function validarVideoVertical(input) {
            const arquivo = input.files && input.files[0] ? input.files[0] : null;
            const status = document.getElementById('reelVideoStatus');
            const campoLargura = document.getElementById('reelVideoLargura');
            const campoAltura = document.getElementById('reelVideoAltura');

            campoLargura.value = '';
            campoAltura.value = '';

            if (!arquivo) {
                limparStatusVideo();
                return;
            }

            const video = document.createElement('video');
            video.preload = 'metadata';

            video.onloadedmetadata = function() {
                window.URL.revokeObjectURL(video.src);

                const largura = Number(video.videoWidth || 0);
                const altura = Number(video.videoHeight || 0);

                if (!largura || !altura) {
                    input.value = '';
                    status.className = 'reel-meta reel-status-erro';
                    status.textContent = 'Nao foi possivel validar as dimensoes do video. Tente outro arquivo.';
                    return;
                }

                if (largura >= altura) {
                    input.value = '';
                    status.className = 'reel-meta reel-status-erro';
                    status.textContent = 'Video horizontal bloqueado. Envie um video vertical (altura maior que largura).';
                    alert('Video horizontal nao e permitido. Envie um arquivo vertical.');
                    return;
                }

                campoLargura.value = String(largura);
                campoAltura.value = String(altura);
                status.className = 'reel-meta reel-status-ok';
                status.textContent = 'Video validado: ' + largura + 'x' + altura + ' (vertical).';
            };

            video.onerror = function() {
                input.value = '';
                status.className = 'reel-meta reel-status-erro';
                status.textContent = 'Falha ao ler o arquivo de video. Tente outro formato.';
            };

            video.src = URL.createObjectURL(arquivo);
        }

        @if ($errors->any() || session('erro'))
            document.getElementById('formReel').style.display = 'block';
        @endif
    </script>
@endsection
