<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login | Admin Aconsult</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .login-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .login-banner {
            display: none;
            position: relative;
            width: 55%;
            background-image: url('{{ asset('arquivos/imagens-empresa/toda-equipe-reduzida.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .login-banner-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(15,23,42,0.82) 0%, rgba(155,21,58,0.55) 100%);
        }

        .login-banner-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 48px;
        }

        .login-form-side {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
            background-color: #f8fafc;
        }

        .login-form-container {
            width: 100%;
            max-width: 380px;
        }

        .login-input {
            width: 100%;
            padding: 12px 16px;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            color: #1e293b;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .login-input::placeholder { color: #94a3b8; }
        .login-input:focus {
            border-color: #e21850;
            box-shadow: 0 0 0 3px rgba(226,24,80,0.08);
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            background-color: #e21850;
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        .login-btn:hover { background-color: #c91545; }
        .login-btn:active { transform: scale(0.98); }
        .login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        .login-btn:disabled:hover { background-color: #e21850; }

        .login-spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            vertical-align: middle;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (min-width: 1024px) {
            .login-banner { display: block; }
            .login-form-side { width: 45%; }
            .login-mobile-logo { display: none; }
            .login-mobile-footer { display: none; }
        }
    </style>
</head>
<body class="font-normal" style="margin: 0;">

    <div class="login-wrapper">

        <!-- ── Banner lateral ─────────────────────────── -->
        <div class="login-banner">
            <div class="login-banner-overlay"></div>
            <div class="login-banner-content">

                <!-- Logo topo -->
                <div>
                    <img src="{{ asset('arquivos/identidade-visual/logo-x-white.png') }}"
                         alt="Aconsult" style="height: 36px; width: auto;">
                </div>

                <!-- Texto central -->
                <div style="max-width: 420px;">
                    <p style="color: rgba(255,255,255,0.6); font-size: 13px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 16px;">Área Administrativa</p>
                    <h1 style="color: #fff; font-size: 40px; font-weight: 900; line-height: 1.15; margin: 0 0 20px 0;">
                        Painel<br>Administrativo
                    </h1>
                    <p style="color: rgba(255,255,255,0.7); font-size: 16px; line-height: 1.6; margin: 0;">
                        Gerencie os conteúdos do site de forma rápida e prática.
                    </p>
                </div>

                <!-- Rodapé -->
                <p style="color: rgba(255,255,255,0.35); font-size: 12px; margin: 0;">
                    &copy; {{ date('Y') }} Aconsult Contabilidade
                </p>
            </div>
        </div>

        <!-- ── Formulário ─────────────────────────────── -->
        <div class="login-form-side">
            <div class="login-form-container">

                <!-- Logo mobile -->
                <div class="login-mobile-logo" style="text-align: center; margin-bottom: 40px;">
                    <img src="{{ asset('arquivos/identidade-visual/logo-x-colorida.png') }}"
                         alt="Aconsult" style="height: 36px; width: auto; display: inline-block;">
                </div>

                <!-- Cabeçalho -->
                <div style="margin-bottom: 32px;">
                    <h2 style="font-size: 26px; font-weight: 900; color: #0f172a; margin: 0 0 8px 0;">Bem-vindo de volta</h2>
                    <p style="font-size: 14px; color: #64748b; margin: 0; line-height: 1.5;">
                        Insira suas credenciais para acessar o painel administrativo.
                    </p>
                </div>

                <!-- Erro -->
                @if ($errors->any())
                    <div style="margin-bottom: 24px; padding: 12px 16px; background-color: #fef2f2; border: 1px solid #fecaca; border-radius: 10px;">
                        <p style="color: #dc2626; font-size: 13px; margin: 0;">{{ $errors->first('login') }}</p>
                    </div>
                @endif

                <!-- Formulário -->
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div style="margin-bottom: 20px;">
                        <label for="login" style="display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px;">Login</label>
                        <input type="text"
                               id="login"
                               name="login"
                               value="{{ old('login') }}"
                               required
                               autocomplete="username"
                               placeholder="Digite seu login"
                               class="login-input">
                    </div>

                    <div style="margin-bottom: 24px;">
                        <label for="senha" style="display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px;">Senha</label>
                        <input type="password"
                               id="senha"
                               name="senha"
                               required
                               autocomplete="current-password"
                               placeholder="Digite sua senha"
                               class="login-input">
                    </div>

                    <div style="display: flex; align-items: center; margin-bottom: 28px;">
                        <input type="checkbox" id="lembrar" name="lembrar"
                               style="width: 16px; height: 16px; accent-color: #e21850; cursor: pointer; border-radius: 4px;">
                        <label for="lembrar" style="margin-left: 8px; font-size: 13px; color: #64748b; cursor: pointer;">Lembrar-me</label>
                    </div>

                    <button type="submit" class="login-btn" id="btnLogin">Entrar</button>
                </form>

                <script>
                    document.getElementById('btnLogin').closest('form').addEventListener('submit', function() {
                        var btn = document.getElementById('btnLogin');
                        btn.disabled = true;
                        btn.innerHTML = '<span class="login-spinner"></span> Entrando...';
                    });
                </script>

                <!-- Rodapé mobile -->
                <p class="login-mobile-footer" style="text-align: center; color: #94a3b8; font-size: 11px; margin-top: 48px;">
                    &copy; {{ date('Y') }} Aconsult Contabilidade
                </p>
            </div>
        </div>

    </div>

</body>
</html>
