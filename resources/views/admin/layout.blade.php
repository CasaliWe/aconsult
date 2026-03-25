<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'Admin') | Aconsult</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ── Reset ────────────────────────────── */
        * { box-sizing: border-box; }

        /* ── Sidebar ─────────────────────────── */
        .admin-sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: 260px;
            background-color: #0f172a;
            z-index: 50;
            display: flex;
            flex-direction: column;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .admin-sidebar.aberta { transform: translateX(0); }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            padding: 0 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 16px 12px;
            scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }

        .sidebar-section-label {
            padding: 4px 12px 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
        }

        .sidebar-separator {
            height: 1px;
            margin: 12px;
            background-color: rgba(255,255,255,0.06);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all 0.15s ease;
            margin-bottom: 2px;
        }
        .sidebar-link:hover {
            background-color: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.85);
        }
        .sidebar-link svg {
            width: 20px; height: 20px;
            flex-shrink: 0;
            color: rgba(255,255,255,0.35);
        }
        .sidebar-link:hover svg { color: rgba(255,255,255,0.6); }

        .sidebar-link.ativo {
            background-color: #e21850;
            color: #fff;
        }
        .sidebar-link.ativo svg { color: #fff; }

        .sidebar-footer {
            flex-shrink: 0;
            padding: 12px 20px;
            border-top: 1px solid rgba(255,255,255,0.06);
            text-align: center;
        }

        /* ── Overlay mobile ──────────────────── */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 40;
            background-color: rgba(0,0,0,0.5);
        }
        .sidebar-backdrop.visivel { display: block; }

        /* ── Content area ────────────────────── */
        .admin-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f1f5f9;
        }

        .admin-topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            height: 64px;
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            padding: 0 24px;
        }

        .admin-main {
            flex: 1;
            padding: 28px 24px;
        }

        /* ── Desktop ─────────────────────────── */
        @media (min-width: 1024px) {
            .admin-sidebar {
                transform: translateX(0);
            }
            .admin-content {
                margin-left: 260px;
            }
            .admin-main {
                padding: 32px;
            }
            .topbar-hamburger { display: none; }
        }

        @media (max-width: 1023px) {
            .topbar-username { display: none; }
        }
    </style>
</head>
<body class="font-normal" style="margin: 0; background-color: #f1f5f9;">

    <!-- ── Overlay sidebar mobile ───────────────── -->
    <div id="sidebarBackdrop" class="sidebar-backdrop" onclick="fecharSidebar()"></div>

    <!-- ── Sidebar ──────────────────────────────── -->
    <aside id="sidebar" class="admin-sidebar">

        <!-- Cabeçalho -->
        <div class="sidebar-header">
            <a href="{{ route('admin.configuracoes') }}">
                <img src="{{ asset('arquivos/identidade-visual/logo-x-white.png') }}"
                     alt="Aconsult" style="height: 28px; width: auto;">
            </a>
            <button onclick="fecharSidebar()" class="lg:hidden" style="background: none; border: none; cursor: pointer; color: rgba(255,255,255,0.35); padding: 4px;">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Navegação -->
        <nav class="sidebar-nav">

            <div class="sidebar-section-label">Menu</div>

            @php
                $itensMenu = [
                    ['rota' => 'admin.configuracoes', 'nome' => 'Configurações', 'icone' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z||M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                    ['rota' => 'admin.banners', 'nome' => 'Banners', 'icone' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['rota' => 'admin.logos', 'nome' => 'Logos Empresa', 'icone' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
                    ['rota' => 'admin.solucoes', 'nome' => 'Soluções', 'icone' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['rota' => 'admin.numeros', 'nome' => 'Nossos Números', 'icone' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['rota' => 'admin.news', 'nome' => 'News', 'icone' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                    ['rota' => 'admin.reels', 'nome' => 'Reels', 'icone' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z'],
                    ['rota' => 'admin.avaliacoes', 'nome' => 'Avaliações', 'icone' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
                    ['rota' => 'admin.faq', 'nome' => 'Perguntas Frequentes', 'icone' => 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['rota' => 'admin.ebook', 'nome' => 'Ebook', 'icone' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ];

                $itensPaginas = [
                    ['rota' => 'admin.pagina-aconsult', 'nome' => 'Pág. Aconsult', 'icone' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['rota' => 'admin.pagina-solucoes', 'nome' => 'Pág. Soluções', 'icone' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                ];
            @endphp

            @foreach ($itensMenu as $item)
                @php $paths = explode('||', $item['icone']); @endphp
                <a href="{{ route($item['rota']) }}"
                   class="sidebar-link {{ request()->routeIs($item['rota']) ? 'ativo' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @foreach($paths as $path)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $path }}"/>
                        @endforeach
                    </svg>
                    <span>{{ $item['nome'] }}</span>
                </a>
            @endforeach

            <div class="sidebar-separator"></div>

            <div class="sidebar-section-label">Páginas</div>

            @foreach ($itensPaginas as $item)
                @php $paths = explode('||', $item['icone']); @endphp
                <a href="{{ route($item['rota']) }}"
                   class="sidebar-link {{ request()->routeIs($item['rota']) ? 'ativo' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @foreach($paths as $path)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $path }}"/>
                        @endforeach
                    </svg>
                    <span>{{ $item['nome'] }}</span>
                </a>
            @endforeach

        </nav>

        <!-- Rodapé sidebar -->
        <div class="sidebar-footer">
            <p style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0;">&copy; {{ date('Y') }} Aconsult</p>
        </div>
    </aside>

    <!-- ── Conteúdo ─────────────────────────────── -->
    <div class="admin-content">

        <!-- Topbar -->
        <header class="admin-topbar">
            <!-- Hamburger mobile -->
            <button onclick="abrirSidebar()" class="topbar-hamburger" style="background: none; border: none; cursor: pointer; color: #64748b; padding: 4px; margin-right: 16px;">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Título -->
            <h1 style="font-size: 17px; font-weight: 700; color: #1e293b; margin: 0; flex: 1;">@yield('titulo', 'Painel')</h1>

            <!-- Usuário + Logout -->
            <div style="display: flex; align-items: center; gap: 16px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 34px; height: 34px; border-radius: 50%; background-color: #e21850; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #fff; font-size: 13px; font-weight: 700;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <span class="topbar-username" style="font-size: 13px; font-weight: 600; color: #374151;">{{ Auth::user()->name }}</span>
                </div>

                <div style="width: 1px; height: 24px; background-color: #e2e8f0;"></div>

                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit"
                            style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; border-radius: 8px; border: none; background: none; font-size: 13px; color: #64748b; cursor: pointer; transition: all 0.15s;"
                            onmouseenter="this.style.backgroundColor='#fef2f2';this.style.color='#dc2626'"
                            onmouseleave="this.style.backgroundColor='transparent';this.style.color='#64748b'"
                            title="Sair do painel">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Sair</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Conteúdo da página -->
        <main class="admin-main">
            @yield('conteudo')
        </main>
    </div>

    <!-- Script sidebar mobile -->
    <script>
        function abrirSidebar() {
            document.getElementById('sidebar').classList.add('aberta');
            document.getElementById('sidebarBackdrop').classList.add('visivel');
            document.body.style.overflow = 'hidden';
        }
        function fecharSidebar() {
            document.getElementById('sidebar').classList.remove('aberta');
            document.getElementById('sidebarBackdrop').classList.remove('visivel');
            document.body.style.overflow = '';
        }
    </script>

</body>
</html>
