{{-- Navbar flutuante - componente global --}}
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50">
    <div id="navbar-container" class="navbar-flutuante">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="shrink-0">
                <img src="{{ asset('arquivos/identidade-visual/logo-x-colorida.png') }}"
                     alt="Aconsult Contabilidade"
                     class="h-12">
            </a>

            {{-- Links Desktop --}}
            <ul class="hidden lg:flex items-center gap-7 text-base font-normal">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-marca transition-colors duration-300">Início</a>
                </li>
                <li>
                    <a href="{{ route('aconsult') }}" class="hover:text-marca transition-colors duration-300">Aconsult</a>
                </li>
                <li class="relative group">
                    <button class="flex items-center gap-1.5 hover:text-marca transition-colors duration-300 cursor-pointer">
                        Soluções
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    {{-- Dropdown personalizado --}}
                    <div class="absolute top-full left-1/2 -translate-x-1/2 pt-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <div class="bg-white rounded-2xl shadow-2xl border border-neutral-100/80 p-2 min-w-[260px] animate-slide-down">
                            <div class="p-3 border-b border-neutral-100 mb-1">
                                <span class="text-xs font-bold text-marca uppercase tracking-wider">Nossas Soluções</span>
                            </div>
                            <a href="{{ route('solucoes', 'empresas') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-marca/5 transition-all duration-300 group/link">
                                <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-marca/10 text-marca group-hover/link:bg-marca group-hover/link:text-white transition-all duration-300">
                                    <i class="fa-solid fa-building text-sm"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold block">Soluções para Empresas</span>
                                    <span class="text-xs text-neutral-400">Tributação e contabilidade</span>
                                </div>
                            </a>
                            <a href="{{ route('solucoes', 'ecommerce') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-marca/5 transition-all duration-300 group/link">
                                <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-marca/10 text-marca group-hover/link:bg-marca group-hover/link:text-white transition-all duration-300">
                                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold block">Soluções para E-commerce</span>
                                    <span class="text-xs text-neutral-400">Lojas virtuais e marketplaces</span>
                                </div>
                            </a>
                            <a href="{{ route('solucoes', 'comex') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl hover:bg-marca/5 transition-all duration-300 group/link">
                                <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-marca/10 text-marca group-hover/link:bg-marca group-hover/link:text-white transition-all duration-300">
                                    <i class="fa-solid fa-ship text-sm"></i>
                                </span>
                                <div>
                                    <span class="text-sm font-bold block">Soluções para Comex</span>
                                    <span class="text-xs text-neutral-400">Comércio exterior e RADAR</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('news') }}" class="hover:text-marca transition-colors duration-300">News</a>
                </li>
                <li>
                    <a href="{{ route('ebook') }}" class="hover:text-marca transition-colors duration-300">Ebook</a>
                </li>
                <li>
                    <a href="{{ route('contato') }}" class="hover:text-marca transition-colors duration-300">Contato</a>
                </li>
            </ul>

            {{-- Ações Desktop --}}
            <div class="hidden lg:flex items-center gap-4">
                <a href="https://www.instagram.com/aconsultcontabilidade/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-neutral-400 hover:text-marca transition-colors duration-300"
                   aria-label="Instagram Aconsult">
                    <i class="fa-brands fa-instagram text-lg"></i>
                </a>
                <a href="https://onvio.com.br/#/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 hover:shadow-lg hover:shadow-marca/25"
                   style="background-color: #e21850;"
                   onmouseenter="this.style.backgroundColor='#9b153a'"
                   onmouseleave="this.style.backgroundColor='#e21850'">
                    Área Cliente
                </a>
            </div>

            {{-- Hamburger Mobile --}}
            <button id="btn-menu-mobile"
                    class="lg:hidden flex items-center justify-center w-10 h-10 rounded-xl text-neutral-700 hover:bg-neutral-100 transition-colors cursor-pointer"
                    aria-label="Abrir menu de navegação">
                <i class="fa-solid fa-bars text-xl" id="icone-menu-mobile"></i>
            </button>
        </div>

        {{-- Menu Mobile --}}
        <div id="menu-mobile" class="hidden lg:hidden overflow-hidden transition-all duration-500">
            <div class="mt-4 pb-4 border-t border-neutral-100 pt-4 flex flex-col gap-1">
                <a href="{{ route('home') }}" class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300">
                    Início
                </a>
                <a href="{{ route('aconsult') }}" class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300">
                    Aconsult
                </a>

                {{-- Soluções Mobile com submenu --}}
                <div>
                    <button id="btn-solucoes-mobile"
                            class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300 w-full text-left flex items-center justify-between cursor-pointer">
                        Soluções
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300" id="icone-solucoes-mobile"></i>
                    </button>
                    <div id="submenu-solucoes-mobile" class="hidden pl-4 mt-1 flex flex-col gap-0.5">
                        <a href="{{ route('solucoes', 'empresas') }}" class="py-2 px-4 rounded-xl hover:bg-marca/5 text-sm text-neutral-500 hover:text-marca transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-building text-[10px] text-marca"></i>
                            Soluções para Empresas
                        </a>
                        <a href="{{ route('solucoes', 'ecommerce') }}" class="py-2 px-4 rounded-xl hover:bg-marca/5 text-sm text-neutral-500 hover:text-marca transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-cart-shopping text-[10px] text-marca"></i>
                            Soluções para E-commerce
                        </a>
                        <a href="{{ route('solucoes', 'comex') }}" class="py-2 px-4 rounded-xl hover:bg-marca/5 text-sm text-neutral-500 hover:text-marca transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-ship text-[10px] text-marca"></i>
                            Soluções para Comex
                        </a>
                    </div>
                </div>

                <a href="{{ route('news') }}" class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300">
                    News
                </a>
                <a href="{{ route('ebook') }}" class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300">
                    Ebook
                </a>
                <a href="{{ route('contato') }}" class="py-2.5 px-4 rounded-xl hover:bg-marca/5 text-[15px] font-normal transition-all duration-300">
                    Contato
                </a>

                <div class="flex items-center gap-3 pt-3 border-t border-neutral-100 mt-3 px-4">
                    <a href="https://www.instagram.com/aconsultcontabilidade/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-10 h-10 flex items-center justify-center rounded-xl bg-neutral-100 text-neutral-500 hover:bg-marca/10 hover:text-marca transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://onvio.com.br/#/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex-1 text-white text-center py-2.5 rounded-full text-sm font-bold transition-all duration-300"
                       style="background-color: #e21850;"
                       onmouseenter="this.style.backgroundColor='#9b153a'"
                       onmouseleave="this.style.backgroundColor='#e21850'">
                        Área Cliente
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const navbarContainer = document.getElementById('navbar-container');
        const btnMenu = document.getElementById('btn-menu-mobile');
        const iconeMenu = document.getElementById('icone-menu-mobile');
        const menuMobile = document.getElementById('menu-mobile');
        const btnSolucoesMobile = document.getElementById('btn-solucoes-mobile');
        const submenuSolucoes = document.getElementById('submenu-solucoes-mobile');
        const iconeSolucoes = document.getElementById('icone-solucoes-mobile');

        /* Efeito scroll - navbar fica fixa e sólida */
        let ultimoScroll = 0;
        window.addEventListener('scroll', () => {
            const scrollAtual = window.scrollY;
            navbarContainer.classList.toggle('fixo', scrollAtual > 60);
            ultimoScroll = scrollAtual;
        }, { passive: true });

        /* Toggle menu mobile */
        btnMenu.addEventListener('click', () => {
            const aberto = !menuMobile.classList.contains('hidden');
            menuMobile.classList.toggle('hidden');
            iconeMenu.classList.toggle('fa-bars', aberto);
            iconeMenu.classList.toggle('fa-xmark', !aberto);

            /* Fundo opaco ao abrir o menu */
            if (!aberto) {
                navbarContainer.style.background = 'rgba(255, 255, 255, 1)';
            } else {
                navbarContainer.style.background = '';
            }
        });

        /* Toggle submenu soluções mobile */
        btnSolucoesMobile.addEventListener('click', () => {
            submenuSolucoes.classList.toggle('hidden');
            iconeSolucoes.classList.toggle('rotate-180');
        });
    });
</script>
