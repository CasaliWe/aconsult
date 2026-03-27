{{-- Página: Configurações --}}
@extends('admin.layout')

@section('titulo', 'Configurações')

@section('conteudo')
    <style>
        .admin-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 28px;
            margin-bottom: 24px;
        }
        .admin-card-title {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 4px;
        }
        .admin-card-desc {
            font-size: 13px;
            color: #94a3b8;
            margin: 0 0 20px;
        }
        .admin-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .admin-input {
            width: 100%;
            padding: 10px 14px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            color: #1e293b;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: inherit;
        }
        .admin-input:focus {
            border-color: #e21850;
            box-shadow: 0 0 0 3px rgba(226,24,80,0.08);
        }
        .admin-input::placeholder { color: #94a3b8; }
        .admin-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }
        @media (min-width: 640px) {
            .admin-grid-2 { grid-template-columns: 1fr 1fr; }
            .admin-grid-3 { grid-template-columns: 1fr 1fr 1fr; }
        }
        .admin-section-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(226,24,80,0.08);
            flex-shrink: 0;
        }
        .admin-section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f1f5f9;
        }
        .admin-btn-salvar {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 32px;
            background-color: #e21850;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .admin-btn-salvar:hover { background-color: #c91545; }
        .admin-alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .admin-alert-sucesso {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }
        .admin-alert-erro {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }
    </style>

    <div style="margin-bottom: 24px;">
        <p style="font-size: 13px; color: #64748b; margin: 0;">Gerencie contatos, endereço e informações da empresa</p>
    </div>

    @if (session('sucesso'))
        <div class="admin-alert admin-alert-sucesso">{{ session('sucesso') }}</div>
    @endif
    @if (session('erro'))
        <div class="admin-alert admin-alert-erro">{{ session('erro') }}</div>
    @endif

    <form action="{{ route('admin.configuracoes.salvar') }}" method="POST">
        @csrf

        {{-- Contato --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Contato</p>
                    <p class="admin-card-desc">Telefone, e-mail e WhatsApp</p>
                </div>
            </div>
            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $config->telefone) }}" class="admin-input" placeholder="(47) 2125-0281" maxlength="15">
                </div>
                <div>
                    <label class="admin-label">E-mail</label>
                    <input type="email" name="email" value="{{ old('email', $config->email) }}" class="admin-input" placeholder="contato@empresa.com">
                </div>
                <div>
                    <label class="admin-label">WhatsApp</label>
                    <input type="text" id="whatsapp_numero" name="whatsapp_numero" value="{{ old('whatsapp_numero', $config->whatsapp_numero) }}" class="admin-input" placeholder="(47) 99999-9999" maxlength="15">
                </div>
                <div>
                    <label class="admin-label">Mensagem WhatsApp</label>
                    <input type="text" name="whatsapp_mensagem" value="{{ old('whatsapp_mensagem', $config->whatsapp_mensagem) }}" class="admin-input" placeholder="Olá! Como podemos ajudar?">
                </div>
            </div>
        </div>

        {{-- Horário --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Horário</p>
                    <p class="admin-card-desc">Horário de atendimento exibido no site</p>
                </div>
            </div>
            <div>
                <label class="admin-label">Horário de atendimento</label>
                <input type="text" name="horario_atendimento" value="{{ old('horario_atendimento', $config->horario_atendimento) }}" class="admin-input" placeholder="Seg — Sex: 8h às 12h e 13h30 às 18h">
            </div>
        </div>

        {{-- Configuracoes de E-mail --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Configurações de E-mail</p>
                    <p class="admin-card-desc">E-mail do administrador que recebe os formulários de Contato e Trabalhe Conosco</p>
                </div>
            </div>
            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">E-mail administrador do site</label>
                    <input type="email" name="email_admin" value="{{ old('email_admin', $config->email_admin ?? '') }}" class="admin-input" placeholder="admin@seudominio.com.br">
                    <p style="margin: 6px 0 0; font-size: 12px; color: #64748b;">Se vazio, o sistema usa o e-mail principal de contato.</p>
                </div>
            </div>
        </div>

        {{-- Endereço --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Endereço</p>
                    <p class="admin-card-desc">Localização da empresa</p>
                </div>
            </div>
            <div class="admin-grid admin-grid-2">
                <div style="grid-column: 1 / -1;">
                    <label class="admin-label">Rua e número</label>
                    <input type="text" name="endereco_rua" value="{{ old('endereco_rua', $config->endereco_rua) }}" class="admin-input" placeholder="Rua São Cristovão, 879">
                </div>
                <div>
                    <label class="admin-label">Bairro</label>
                    <input type="text" name="endereco_bairro" value="{{ old('endereco_bairro', $config->endereco_bairro) }}" class="admin-input" placeholder="Cordeiros">
                </div>
                <div>
                    <label class="admin-label">Cidade</label>
                    <input type="text" name="endereco_cidade" value="{{ old('endereco_cidade', $config->endereco_cidade) }}" class="admin-input" placeholder="Itajaí">
                </div>
                <div>
                    <label class="admin-label">Estado</label>
                    <input type="text" name="endereco_estado" value="{{ old('endereco_estado', $config->endereco_estado) }}" class="admin-input" placeholder="SC" maxlength="2">
                </div>
                <div>
                    <label class="admin-label">CEP</label>
                    <input type="text" id="endereco_cep" name="endereco_cep" value="{{ old('endereco_cep', $config->endereco_cep) }}" class="admin-input" placeholder="88310-161" maxlength="9">
                </div>
            </div>
        </div>

        {{-- Mapa --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Mapa</p>
                    <p class="admin-card-desc">Google Maps embed e link</p>
                </div>
            </div>
            <div class="admin-grid">
                <div>
                    <label class="admin-label">Conteúdo do src do iframe (Google Maps)</label>
                    <input type="text" name="mapa_embed_url" value="{{ old('mapa_embed_url', $config->mapa_embed_url) }}" class="admin-input" placeholder="https://www.google.com/maps/embed?pb=...">
                    <p style="margin: 6px 0 0; font-size: 12px; color: #64748b;">
                        Cole apenas a URL do src. Se colar o iframe completo, o sistema extrai o src automaticamente.
                    </p>
                </div>
                <div>
                    <label class="admin-label">Link "Como chegar" (Google Maps)</label>
                    <input type="text" name="mapa_link_url" value="{{ old('mapa_link_url', $config->mapa_link_url) }}" class="admin-input" placeholder="https://www.google.com/maps/search/...">
                </div>
            </div>
        </div>

        {{-- Redes Sociais --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Redes Sociais</p>
                    <p class="admin-card-desc">Links das redes sociais</p>
                </div>
            </div>
            <div class="admin-grid admin-grid-2">
                <div>
                    <label class="admin-label">Instagram</label>
                    <input type="text" name="social_instagram" value="{{ old('social_instagram', $config->social_instagram) }}" class="admin-input" placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label class="admin-label">Facebook</label>
                    <input type="text" name="social_facebook" value="{{ old('social_facebook', $config->social_facebook) }}" class="admin-input" placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label class="admin-label">LinkedIn</label>
                    <input type="text" name="social_linkedin" value="{{ old('social_linkedin', $config->social_linkedin) }}" class="admin-input" placeholder="https://linkedin.com/...">
                </div>
                <div>
                    <label class="admin-label">YouTube</label>
                    <input type="text" name="social_youtube" value="{{ old('social_youtube', $config->social_youtube) }}" class="admin-input" placeholder="https://youtube.com/...">
                </div>
            </div>
        </div>

        {{-- Links Externos --}}
        <div class="admin-card">
            <div class="admin-section-header">
                <div class="admin-section-icon">
                    <svg width="18" height="18" fill="none" stroke="#e21850" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </div>
                <div>
                    <p class="admin-card-title">Links Externos</p>
                    <p class="admin-card-desc">Área do cliente, aplicativos</p>
                </div>
            </div>
            <div class="admin-grid admin-grid-3">
                <div>
                    <label class="admin-label">Área do Cliente</label>
                    <input type="text" name="link_area_cliente" value="{{ old('link_area_cliente', $config->link_area_cliente) }}" class="admin-input" placeholder="https://onvio.com.br/">
                </div>
                <div>
                    <label class="admin-label">App Store</label>
                    <input type="text" name="link_app_store" value="{{ old('link_app_store', $config->link_app_store) }}" class="admin-input" placeholder="https://apps.apple.com/...">
                </div>
                <div>
                    <label class="admin-label">Google Play</label>
                    <input type="text" name="link_google_play" value="{{ old('link_google_play', $config->link_google_play) }}" class="admin-input" placeholder="https://play.google.com/...">
                </div>
                <div>
                    <label class="admin-label">Google Form (Proposta Personalizada)</label>
                    <input type="text" name="link_google_form_proposta" value="{{ old('link_google_form_proposta', $config->link_google_form_proposta) }}" class="admin-input" placeholder="https://docs.google.com/forms/...">
                </div>
            </div>
        </div>

        {{-- Botão salvar --}}
        <div style="display: flex; justify-content: flex-end;">
            <button type="submit" class="admin-btn-salvar">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Salvar configurações
            </button>
        </div>
    </form>

    <script>
        function somenteDigitos(valor) {
            return (valor || '').replace(/\D+/g, '');
        }

        function maskTelefone(valor) {
            var v = somenteDigitos(valor).slice(0, 11);
            if (v.length <= 10) {
                return v.replace(/(\d{2})(\d)/, '($1) $2')
                    .replace(/(\d{4})(\d)/, '$1-$2');
            }
            return v.replace(/(\d{2})(\d)/, '($1) $2')
                .replace(/(\d{5})(\d)/, '$1-$2');
        }

        function maskCep(valor) {
            var v = somenteDigitos(valor).slice(0, 8);
            return v.replace(/(\d{5})(\d)/, '$1-$2');
        }

        function maskWhatsapp(valor) {
            var v = somenteDigitos(valor);

            if (v.startsWith('55') && (v.length === 12 || v.length === 13)) {
                v = v.slice(2);
            }

            return maskTelefone(v);
        }

        var inputTelefone = document.getElementById('telefone');
        var inputWhatsapp = document.getElementById('whatsapp_numero');
        var inputCep = document.getElementById('endereco_cep');

        if (inputTelefone) {
            inputTelefone.value = maskTelefone(inputTelefone.value);
            inputTelefone.addEventListener('input', function() {
                this.value = maskTelefone(this.value);
            });
        }

        if (inputWhatsapp) {
            inputWhatsapp.value = maskWhatsapp(inputWhatsapp.value);
            inputWhatsapp.addEventListener('input', function() {
                this.value = maskWhatsapp(this.value);
            });
        }

        if (inputCep) {
            inputCep.value = maskCep(inputCep.value);
            inputCep.addEventListener('input', function() {
                this.value = maskCep(this.value);
            });
        }
    </script>
@endsection
