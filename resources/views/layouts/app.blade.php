<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Aconsult Contabilidade">

    <!-- SEO -->
    <title>@yield('titulo', 'Aconsult Contabilidade | Escritório de Contabilidade em Itajaí-SC')</title>
    <meta name="description" content="@yield('descricao', 'Aconsult Contabilidade: escritório de contabilidade em Itajaí-SC. Assessoria contábil, fiscal, tributária, comércio exterior e inteligência tributária para impulsionar negócios por todo o Brasil.')">
    <meta name="keywords" content="@yield('palavras_chave', 'contabilidade, escritório contábil, Itajaí, Santa Catarina, assessoria fiscal, comércio exterior, BPO fiscal, gestão tributária, contabilidade inteligente, departamento pessoal, RADAR, benefícios fiscais')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('titulo', 'Aconsult Contabilidade | Escritório de Contabilidade em Itajaí-SC')">
    <meta property="og:description" content="@yield('descricao', 'Contabilidade e inteligência tributária para impulsionar negócios por todo o Brasil.')">
    <meta property="og:image" content="{{ asset('arquivos/identidade-visual/thumb.png') }}">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="Aconsult Contabilidade">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('titulo', 'Aconsult Contabilidade')">
    <meta name="twitter:description" content="@yield('descricao', 'Contabilidade e inteligência tributária para impulsionar negócios por todo o Brasil.')">
    <meta name="twitter:image" content="{{ asset('arquivos/identidade-visual/thumb.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('arquivos/identidade-visual/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('arquivos/identidade-visual/favicon.png') }}">

    <!-- Fonte inline para evitar FOUT -->
    <style>
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/Coolvetica Rg.woff2') format('woff2');
            font-style: normal;
            font-weight: 400;
            font-display: swap;
        }
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/Coolvetica Rg It.woff2') format('woff2');
            font-style: italic;
            font-weight: 400;
            font-display: swap;
        }
        @font-face {
            font-family: 'Coolvetica';
            src: url('/fonts/Coolvetica Rg.woff2') format('woff2');
            font-style: normal;
            font-weight: 700 900;
            font-display: swap;
        }
        body { font-family: 'Coolvetica', ui-sans-serif, system-ui, sans-serif; }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-white text-neutral-900 text-base">
    <x-navbar />

    <main>
        @yield('conteudo')
    </main>

    <x-footer />
    <x-whatsapp-flutuante />

    @stack('scripts')
</body>
</html>
