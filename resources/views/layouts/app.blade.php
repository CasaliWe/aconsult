<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo', 'Aconsult')</title>

        <style>
            @font-face {
                font-family: 'Coolvetica';
                src: url('/fonts/Coolvetica Rg Cond.woff2') format('woff2');
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
                src: url('/fonts/Coolvetica Hv Comp.woff2') format('woff2');
                font-style: normal;
                font-weight: 700 900;
                font-display: swap;
            }

            body {
                font-family: 'Coolvetica', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                    'Segoe UI Symbol', 'Noto Color Emoji';
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-white text-neutral-900">
        <x-navbar />

        <main class="mx-auto max-w-5xl px-4 py-10">
            @yield('conteudo')
        </main>
    </body>
</html>
